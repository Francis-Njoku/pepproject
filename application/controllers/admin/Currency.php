<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
		$this->load->model('admin/Currency_model','person');
	}

	public function index()
	{
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
		$this->load->helper('url');
        $this->load->view('user/header2');
        $this->load->view('admin/currency_view');
        $this->load->view('user/footer2');
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
            $row[] = $person->id;
            $row[] = $person->currency;
            $row[] = $person->abbrevation;
			$row[] = $person->value;
			$row[] = $person->created;
            $row[] = $person->updated;
            if($person->status == 0)
            {
                $row[] = 'Inactive';
            }
            elseif($person->status == 1)
            {
                $row[] = 'Active';
            }


            //add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
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

        if($this->person->isDuplicate2($this->input->post('currency'))){
            $this->session->set_flashdata('flash_message', 'Currency already exist');
            redirect(site_url().'/admin/currency');
        }
        if($this->person->isDuplicate3($this->input->post('abbrevation'))){
            $this->session->set_flashdata('flash_message', 'Abbreviation already exist');
            redirect(site_url().'/admin/currency');
        }


        $data = array(
            'currency' => $this->input->post('currency'),
            'abbrevation' => $this->input->post('abbrevation'),
            'value' => $this->input->post('value'),
            'status' => $this->input->post('status'),
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





        $deig = date('Y-m-d h:i', $new_me);
        $data = array(

            'value' => $this->input->post('value'),
            'status' => $this->input->post('status'),
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

		if($this->input->post('currency') == '')
		{
			$data['inputerror'][] = 'currency';
			$data['error_string'][] = 'name of currency is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('abbrevation') == '')
		{
			$data['inputerror'][] = 'abbrevation';
			$data['error_string'][] = 'Abbreviation is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('value') == '')
		{
			$data['inputerror'][] = 'value';
			$data['error_string'][] = 'Value is required';
			$data['status'] = FALSE;
		}
        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status is required';
            $data['status'] = FALSE;
        }

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
