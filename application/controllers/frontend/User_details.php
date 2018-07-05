<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_details extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/user_details_model','person');
        $this->load->library('form_validation', 'email');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

    }

	public function index()
	{
        $data['view_data'] = $this->person->view_data();
        $data['view_kyc'] = $this->person->edit_kyc();
        $data['pep_credit'] = $this->person->total_credit_pep();
        $data['pep_debit'] = $this->person->total_debit_pep();
        $data['xpep_credit'] = $this->person->total_credit_xpep();
        $data['xpep_debit'] = $this->person->total_debit_xpep();
        $data['user_closure'] = $this->person->get_user_closure();
        $data['closure_details'] = $this->person->get_closure_details();


        $this->load->helper('url');
        $this->load->view('user/header');
        $this->load->view('user/user_details_view', $data);
        $this->load->view('user/footer');
	}

    public function index2()
    {
        $data['edit_data'] = $this->person->edit_data();
        $this->load->helper('url');
        $this->load->view('user/header2');
        $this->load->view('user/user_index2', $data);
        $this->load->view('user/footer');
    }


    public function update()
    {
        if($this->person->isDuplicate($this->input->post('phone'))){
            $this->session->set_flashdata('flash_message', 'User phone number already exists');
            redirect(site_url().'/frontend/user_details');
        }
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {
            redirect(site_url('frontend/dashboard/'));

        }
        $id = $user_id;
        $datta = array(

        );

        $phone_number = $this->input->post("phone");


        $data=array( 'phone' => $phone_number);
        $this->person->db_update($data,$id);
    redirect(site_url('frontend/user_details/'));

    }
    public function update_wallet()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {
            redirect(site_url('frontend/dashboard/'));

        }
        $id = $user_id;
        $datta = array(

        );

        $wallet_details = $this->input->post("details");
        $wallet_name = $this->input->post("id");


        $data=array( $wallet_name  => $wallet_details);
        $this->person->db_update($data,$id);
        redirect(site_url('frontend/user_details/'));

    }



    public function update_image()
    {

        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists($this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink($this->input->post('remove_photo'));
            $data['picture'] = '';
        }

        if(!empty($_FILES['picture']['name']))
        {
            $upload = $this->_do_upload();

            // Get server time
            date_default_timezone_set("Africa/Lagos");
            //echo "The time is " . date("h:i:sa");
            $new_da = date("Y-m-d h:i:sa");
            // $dayLight = TRUE;
            $new_me = strtotime($new_da);

            $deig = date('Y-m-d h:i', $new_me);


            //delete file

            $data = array(
                'picture' => 'images/profile/'.$upload,

            );

            $this->person->db_update2($data);
        }


        $this->session->set_flashdata('flash_message', 'Successful! ');

        redirect(site_url('frontend/user_details/'));

    }

    public function update_id_card()
    {

        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists($this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink($this->input->post('remove_photo'));
            $data['id_card'] = '';
        }

        if(!empty($_FILES['id_card']['name']))
        {
            $upload = $this->_do_upload2();

            // Get server time
            date_default_timezone_set("Africa/Lagos");
            //echo "The time is " . date("h:i:sa");
            $new_da = date("Y-m-d h:i:sa");
            // $dayLight = TRUE;
            $new_me = strtotime($new_da);

            $deig = date('Y-m-d h:i', $new_me);

            $data['updated'] = $deig;
            $data['status'] = '0';




            //delete file
            /*$person = $this->person->edit_data;
            if(file_exists($person->id_card) && $person->id_card)
                unlink($person->id_card);*/
            $data['idCard'] = 'images/id_card/'.$upload;
        }

        $this->person->db_update2($data);
        redirect(site_url('frontend/user_details/'));

    }

    public function update_address()
    {

        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists($this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink($this->input->post('remove_photo'));
            $data['id_card'] = '';
        }

        if(!empty($_FILES['address']['name']))
        {
            $upload = $this->_do_upload3();

            // Get server time
            date_default_timezone_set("Africa/Lagos");
            //echo "The time is " . date("h:i:sa");
            $new_da = date("Y-m-d h:i:sa");
            // $dayLight = TRUE;
            $new_me = strtotime($new_da);
            $deig = date('Y-m-d h:i', $new_me);
            $data['updated'] = $deig;
            $data['status'] = '0';
            //delete file
            /*$person = $this->person->edit_data;
            if(file_exists($person->id_card) && $person->id_card)
                unlink($person->id_card);*/
            $data['address'] = 'images/address/'.$upload;
        }

        $this->person->db_update2($data);
        redirect(site_url('frontend/user_details/'));

    }

	private function _do_upload()
	{
		$config['upload_path']          = 'images/profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 900; //set max size allowed in Kilobyte
        $config['file_name']            = md5(uniqid(mt_rand())); //just milisecond timestamp for unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('picture')) //upload and validate
        {
            $data['inputerror'][] = 'picture';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

    private function _do_upload2()
    {
        $config['upload_path']          = 'images/id_card/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 900; //set max size allowed in Kilobyte
        $config['file_name']            = md5(uniqid(mt_rand())); //just milisecond timestamp for unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('id_card')) //upload and validate
        {
            $data['inputerror'][] = 'id_card';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload3()
    {
        $config['upload_path']          = 'images/address/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 900; //set max size allowed in Kilobyte
        $config['file_name']            = md5(uniqid(mt_rand())); //just milisecond timestamp for unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('address')) //upload and validate
        {
            $data['inputerror'][] = 'address';
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

		if($this->input->post('first_name') == '')
		{
			$data['inputerror'][] = 'first_name';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

        if($this->input->post('last_name') == '')
        {
            $data['inputerror'][] = 'last_name';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('phone') == '')
        {
            $data['inputerror'][] = 'phone_number';
            $data['error_string'][] = 'phone number is required';
            $data['status'] = FALSE;
        }


        if($this->input->post('bank_name') == '')
        {
            $data['inputerror'][] = 'bank_name';
            $data['error_string'][] = 'Bank name is required';
            $data['status'] = FALSE;
        }

		if($this->input->post('account_name') == '')
		{
			$data['inputerror'][] = 'account_name';
			$data['error_string'][] = 'Account name is required';
			$data['status'] = FALSE;
		}


		if($this->input->post('account_number') == '')
		{
			$data['inputerror'][] = 'account_number';
			$data['error_string'][] = 'Account number is required';
			$data['status'] = FALSE;
		}
        if($this->input->post('user_address') == '')
        {
            $data['inputerror'][] = 'user_address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('user_state') == '')
        {
            $data['inputerror'][] = 'user_state';
            $data['error_string'][] = 'State is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('user_country') == '')
        {
            $data['inputerror'][] = 'user_country';
            $data['error_string'][] = 'Country is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('user_city') == '')
        {
            $data['inputerror'][] = 'user_city';
            $data['error_string'][] = 'LGA is required';
            $data['status'] = FALSE;
        }


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
