<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Airdrop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('user/Airdrop_model', 'airdrop');
	}

	public function index()
	{
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);

            $this->data['title'] = 'Request withdraw';
            $this->data['currency'] = $this->airdrop->currency();
            $this->data['airdrop_details'] = $this->airdrop->airdrop_details();
            $this->data['airdrop_gained'] = $this->airdrop->airdrop_gained();
            $this->data['pep_telegram_value'] = $this->airdrop->pep_telegram_value();
            $this->data['pep_tribetv_value'] = $this->airdrop->pep_tribetv_value();
            $this->data['peptribe_value'] = $this->airdrop->peptribe_value();
            $this->data['marketxr_value'] = $this->airdrop->marketxr_value();
            $this->data['email_value'] = $this->airdrop->email_value();
            $this->data['sms_value'] = $this->airdrop->sms_value();
            $this->data['chatonx_value'] = $this->airdrop->chatonx_value();
            $this->data['facebook_value'] = $this->airdrop->facebook_value();
            $this->data['pep_whatsapp_value'] = $this->airdrop->pep_whatsapp_value();
            $this->data['num_peptribe'] = $this->airdrop->num_peptribe();
            $this->data['get_peptribe'] = $this->airdrop->get_peptribe();
            $this->data['num_peptribe_telegram'] = $this->airdrop->num_peptribe_telegram();
            $this->data['get_peptribe_telegram'] = $this->airdrop->get_peptribe_telegram();
            $this->data['num_peptribe_whatsapp'] = $this->airdrop->num_peptribe_whatsapp();
            $this->data['get_peptribe_whatsapp'] = $this->airdrop->get_peptribe_whatsapp();
            $this->data['num_peptribe_tv'] = $this->airdrop->num_peptribe_tv();
            $this->data['get_peptribe_tv'] = $this->airdrop->get_peptribe_tv();
            $this->data['num_peptribe_facebook'] = $this->airdrop->num_peptribe_facebook();
            $this->data['get_peptribe_facebook'] = $this->airdrop->get_peptribe_facebook();
            $this->data['num_peptribe_marketxr'] = $this->airdrop->num_peptribe_marketxr();
            $this->data['get_peptribe_marketxr'] = $this->airdrop->get_peptribe_marketxr();
            $this->data['num_email'] = $this->airdrop->num_email();
            $this->data['get_email'] = $this->airdrop->get_email();
            $this->data['num_sms'] = $this->airdrop->num_sms();
            $this->data['get_sms'] = $this->airdrop->get_sms();
            $this->data['num_chatonx'] = $this->airdrop->num_chatonx();
            $this->data['get_chatonx'] = $this->airdrop->get_chatonx();

            $this->data['ico'] = $this->airdrop->ico();
            $this->load->view('user/header');
            $this->load->view('user/airdrop_view', $this->data);
            $this->load->view('user/footer');

        } else {
            redirect(site_url().'/auth/login');
        }
    }
	
	public function insert_airdrop()
	{
        if (isset($this->session->userdata['user_id'])) {

            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


        }
        $airs_id = $this->input->post('id');
        $airdrop_id = $this->airdrop->airdrop($airs_id);
        foreach($airdrop_id as $drop_type)
        {
            $airdrop_amount = $drop_type['amount'];
            $airdrop_currency = $drop_type['currency'];
            $airdrop_type = $drop_type['type'];

        }
        $status = '0';
        $type = 'fund wallet';
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);

		$user_payment = array(
			'type' 		=> $airs_id,
            'currency' 		=> $airdrop_currency,
            'amount' 		=> $airdrop_amount,
            'details' 		=> $this->input->post('details'),
            'status' 		=> $status,
            'user_id' 		=> $user_id,
            'created' 		=> $deig
		);		

		$cust_id = $this->airdrop->insert_airdrop($user_payment);

        $this->session->set_flashdata('flash_message', 'Successful');
        redirect(site_url('frontend/airdrop'));
	}

    public function update_airdrop()
    {

        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {
            redirect(site_url('frontend/dashboard/'));

        }
        $airs_id = $this->input->post('id');
        $airdrop_id = $this->airdrop->airdrop($airs_id);
        foreach($airdrop_id as $drop_type)
        {
            $airdrop_amount = $drop_type['amount'];
            $airdrop_currency = $drop_type['currency'];
            $airdrop_type = $drop_type['id'];

        }
        $dropper_type = $this->airdrop->get_row($airs_id);
        foreach($dropper_type as $types)
        {
            $unq = $types['id'];
        }
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);
        $data = array(
          'details' => $this->input->post('details'),
            'updated' => $deig,
        );
        $this->airdrop->update($data,$unq);
        $this->session->set_flashdata('flash_message', 'Successful');
        redirect(site_url('frontend/airdrop/'));

    }



}