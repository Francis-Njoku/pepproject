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
        $this->load->model('admin/Kyc_model','person');	}

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
            if($person->status == 1)
                $row[] = '
                <form name="status_update" method="post" action="'.site_url("/admin/kyc/disapprove").'">
                <input type="hidden" name="id" value="'.$person->id.'">
                 <input type="submit" value="Disapprove" class="btn btn-danger">
                </form>
                ';
            elseif($person->status == 0)
                $row[] = '
                <form name="status_update" method="post" action="'.site_url("/admin/kyc/approve").'">
                <input type="hidden" name="id" value="'.$person->id.'">
                 <input type="submit" value="Approve" class="btn btn-primary">
                </form>
                ';

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

    public function approve()
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);
        $data = array(
            'updated' => $deig,
            'status' => '1'
        );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        $this->session->set_flashdata('flash_message', 'successful');
        redirect(site_url().'/admin/kyc');
    }
    public function disapprove()
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);
        $data = array(
            'updated' => $deig,
            'status' => '0'
        );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        $this->session->set_flashdata('flash_message', 'successful');
        redirect(site_url().'/admin/kyc');
    }


	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		echo json_encode($data);
	}


	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
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

    private function _do_upload2()
    {
        $config['upload_path']          = 'upload_2/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp for unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo_2')) //upload and validate
        {
            $data['inputerror'][] = 'photo_2';
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

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Property name is required';
			$data['status'] = FALSE;
		}



		if($this->input->post('price') == '')
		{
			$data['inputerror'][] = 'price';
			$data['error_string'][] = 'Price of product is required';
			$data['status'] = FALSE;
		}


		if($this->input->post('product_description') == '')
		{
			$data['inputerror'][] = 'product_description';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('product_highlight') == '')
		{
			$data['inputerror'][] = 'product_highlight';
			$data['error_string'][] = 'Highlight is required';
			$data['status'] = FALSE;
		}

        if($this->input->post('product_category1') == '')
        {
            $data['inputerror'][] = 'product_category1';
            $data['error_string'][] = 'Category is required';
            $data['status'] = FALSE;
        }


        if($this->input->post('product_country') == '')
        {
            $data['inputerror'][] = 'product_country';
            $data['error_string'][] = 'Country is required';
            $data['status'] = FALSE;
        }


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
