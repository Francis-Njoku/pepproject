<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trade extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language','string'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('user/Trade_model', 'payer');
	}

	public function index()
	{
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);

            $this->data['title'] = 'Request withdraw';

            $this->data['trade'] = $this->payer->trade();

            $this->data['total_credit_pep'] = $this->payer->total_credit_pep();
            $this->data['total_debit_pep'] = $this->payer->total_debit_pep();
            $this->data['total_credit_xpep'] = $this->payer->total_credit_xpep();
            $this->data['total_debit_xpep'] = $this->payer->total_debit_xpep();

            $this->load->view('user/header');
            $this->load->view('user/trade_view', $this->data);
            $this->load->view('user/footer4');

        } else {
            redirect(site_url().'/auth/login');
        }
    }
	
	public function exchange()
	{
        if (isset($this->session->userdata['user_id'])) {

            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);

            # Get details from model

            $total_credit_pep = $this->payer->total_credit_pep();
            $total_debit_pep = $this->payer->total_debit_pep();
            $total_credit_xpep = $this->payer->total_credit_xpep();
            $total_debit_xpep = $this->payer->total_debit_xpep();

            # End Get details from model

            # Calculate balance on user account

            $pep_balance = $total_credit_pep - $total_debit_pep;
            $xpep_balance = $total_credit_xpep - $total_debit_xpep;

            # Calculate balance on user account


            # Calculate balance on user account
            $type =  $this->input->post('currency');
            # Calculate balance on user account

            $type =  $this->input->post('type');
            $total_fee =  $this->input->post('total_fee');
            if($type == 'buy_pep')
            {
                if($total_fee > $xpep_balance)
                {
                    $this->session->set_flashdata('flash_message', 'Insufficient funds');
                    redirect(site_url('frontend/trade'));
                }
                else{
                    $status = '0';
                    date_default_timezone_set("Africa/Lagos");
                    //echo "The time is " . date("h:i:sa");
                    $new_da = date("Y-m-d h:i:sa");
                    // $dayLight = TRUE;
                    $new_me = strtotime($new_da);
                    $deig = date('Y-m-d h:i', $new_me);

                    $user_payment = array(
                        'type' 		=> $type,
                        'transactionId' 		=> '156300'.random_string('numeric',9),
                        'amount' 		=> $this->input->post('total_fee'),
                        'rate' 		=> $this->input->post('price'),
                        'status' 		=> $status,
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );

                    $cust_id = $this->payer->insert_payment($user_payment);

                    $this->session->set_flashdata('flash_message', 'Successful');
                    redirect(site_url('frontend/trade'));
                }
            }


        }
        else
        {
            redirect(site_url('login'));
        }

	}

}