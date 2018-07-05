<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kyc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
		$this->load->model('admin/Kyc_model','person');
	}

	public function index()
	{
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
		$this->load->helper('url');
        $this->load->view('user/header2');
        $this->load->view('admin/kyc_view');
        $this->load->view('user/footer2');
	}

	public function ajax_list()
	{
		$this->load->helper('url');



		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
            $this->db->from('users');
            $this->db->where('id',$person->user_id);
            $query = $this->db->get();

            $result = $query->result_array();
            foreach($result as $user_details)
            {
                $firstname = $user_details['first_name'];
                $lastname = $user_details['last_name'];

            }
			$no++;
			$row = array();


            $row[] = $person->id;
            $row[] = $firstname;
            $row[] = $lastname;
            if($person->picture)
                $row[] = '<a href="'.base_url($person->picture).'" target="_blank"><img src="'.base_url($person->picture).'" class="img-responsive" /></a>';
            else
                $row[] = '(No picture)';
            if($person->idCard)
                $row[] = '<a href="'.base_url($person->idCard).'" target="_blank"><img src="'.base_url($person->idCard).'" class="img-responsive" /></a>';
            else
                $row[] = '(No ID card)';
            if($person->address)
                $row[] = '<a href="'.base_url($person->address).'" target="_blank"><img src="'.base_url($person->address).'" class="img-responsive" /></a>';
            else
                $row[] = '(No Address)';
			$row[] = $person->updated;
            if($person->status == 1)
                $row[] = 'Approved';
            elseif($person->status == 0)
                $row[] = 'Pending';


            //add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i>Approve</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);

        if($this->person->isDuplicate2($this->input->post('rate'))){
            $this->session->set_flashdata('flash_message', 'Rate already exist');
            redirect(site_url().'/admin/ico');
        }


        $data = array(
            'rate' => $this->input->post('rate'),
            'maximum_amount' => $this->input->post('maximum_amount'),
            'percent_bonus' => $this->input->post('percent_bonus'),
            'created' => $deig,
        );

        $insert = $this->person->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
        $this->_validate();
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $check_status = $this->input->post('stat');

        if($check_status == 1)
        {
            if($this->person->isDuplicate($this->input->post('stat'))){
                $this->session->set_flashdata('flash_message', 'An ICO plan is already active, kindly deactivate active plan to use this');
                redirect(site_url().'/admin/ico');
            }
        }

        if($this->person->isDuplicate2($this->input->post('rate'))){
            $this->session->set_flashdata('flash_message', 'Rate already exist');
            redirect(site_url().'/admin/ico');
        }


        $deig = date('Y-m-d h:i', $new_me);
        $data = array(
            'rate' => $this->input->post('rate'),
            'maximum_amount' => $this->input->post('maximum_amount'),
            'percent_bonus' => $this->input->post('percent_bonus'),
            'status' => $this->input->post('stat'),
            'updated' => $deig,
        );


		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$person = $this->person->get_by_id($id);
		if(file_exists('images/products/'.$person->photo) && $person->photo)
			unlink('images/products/'.$person->photo);

		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'images/products/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2000; //set max size allowed in Kilobyte
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp for unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('rate') == '')
		{
			$data['inputerror'][] = 'rate';
			$data['error_string'][] = 'Rate name is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('maximum_amount') == '')
		{
			$data['inputerror'][] = 'maximum_amount';
			$data['error_string'][] = 'Amount is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('percent_bonus') == '')
		{
			$data['inputerror'][] = 'percent_bonus';
			$data['error_string'][] = 'Percent is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
