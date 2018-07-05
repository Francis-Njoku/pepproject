<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fund_xpep extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('user/Fund_wallet_model', 'payer');
	}

	public function index()
	{
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);

            $this->data['title'] = 'Request withdraw';
            $this->data['currency_naira'] = $this->payer->currency_naira();
            $this->data['currency_steem'] = $this->payer->currency_steem();
            $this->data['currency_waves'] = $this->payer->currency_waves();
            $this->data['currency_litcoin'] = $this->payer->currency_litcoin();
            $this->data['currency_ethereum'] = $this->payer->currency_ethereum();
            $this->data['currency_bitcash'] = $this->payer->currency_bitcash();
            $this->data['currency_bitcoin'] = $this->payer->currency_bitcoin();

            $this->data['currency'] = $this->payer->currency();
            $this->data['ico'] = $this->payer->ico();
            $this->load->view('user/header');
            $this->load->view('user/fund_xpep_view', $this->data);
            $this->load->view('user/footer3');

        } else {
            redirect(site_url().'/auth/login');
        }
    }
	
	public function save_order()
	{
        if (isset($this->session->userdata['user_id'])) {

            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


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
            'currency_from' 		=> $this->input->post('currency'),
            'currency_to' 		=> 'XPEP',
            'amount' 		=> $this->input->post('value_in_xpep'),
            'deposit' 		=> $this->input->post('amount'),
            'referrence'	=> $this->input->post('address'),
            'status' 		=> $status,
            'user_id' 		=> $user_id,
            'date' 		=> $deig
		);		

		$cust_id = $this->payer->insert_payment($user_payment);

        $this->session->set_flashdata('flash_message', 'Successful');
        redirect(site_url('frontend/fund_xpep'));
	}



}