<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('user/Withdraw_model', 'payer');
	}

	public function index()
	{
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);

            $this->data['title'] = 'Request withdraw';
            $this->data['retrieve_user'] = $this->payer->retrieve_user(); //get referral data

            $this->load->view('user/header');
            $this->load->view('user/withdraw_view', $this->data);
            $this->load->view('user/footer');

        } else {
            redirect(site_url().'/auth/login');
        }
    }
	
	public function save_request()
	{
        if (isset($this->session->userdata['user_id'])) {

            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


        }else {
            redirect(site_url().'/auth/login');
        }

        $data['total_credit_pep'] = $this->payer->total_credit_pep(); //get referral data
        $data['total_debit_pep'] = $this->payer->total_debit_pep(); //get referral data
        $data['total_credit_xpep'] = $this->payer->total_credit_xpep(); //get referral data
        $data['total_debit_xpep'] = $this->payer->total_debit_xpep(); //get referral data
        $data['total_credit_waves'] = $this->payer->total_credit_waves(); //get referral data
        $data['total_debit_waves'] = $this->payer->total_debit_waves(); //get referral data
        $data['total_credit_ethereum'] = $this->payer->total_credit_ethereum(); //get referral data
        $data['total_debit_ethereum'] = $this->payer->total_debit_ethereum(); //get referral data

        $retrieve_user = $this->payer->retrieve_user(); //get referral data
        $retrieve_kyc = $this->payer->retrieve_kyc(); //get referral data
        foreach($retrieve_kyc as $kyc):
            $id_card = $kyc['idCard'];
            $picture = $kyc['picture'];
            $status = $kyc['status'];
            $updated = $kyc['updated'];
            $address = $kyc['address'];
        endforeach;

        if($status == '0')
        {
            $this->session->set_flashdata('flash_message', 'Your KYC hasn\'t been approve, kindly update');
            redirect(site_url('frontend/withdraw'));
        }
        elseif($status == '1')
        {
            $pep_balance = $data['total_credit_pep'] - $data['total_debit_pep'];
            $xpep_balance = $data['total_credit_xpep'] - $data['total_debit_xpep'];
            $waves_balance = $data['total_credit_waves'] - $data['total_debit_waves'];
            $ethereum_balance = $data['total_credit_ethereum'] - $data['total_debit_ethereum'];

            $amount = $this->input->post('amount');
            $currency_from = $this->input->post('currency1');
            $currency_to = $this->input->post('currency2');

            $charge = $amount * 0.01;
            $currency_charge = $amount + $charge;

            if($currency_from == 'PEP')
            {
                if($currency_charge > $pep_balance)
                {
                    $this->session->set_flashdata('flash_message', 'Insufficient funds to complete transaction');
                    redirect(site_url('frontend/withdraw'));
                }
                else
                {
                    $status = '0';
                    $type = 'fund wallet';
                    date_default_timezone_set("Africa/Lagos");
                    //echo "The time is " . date("h:i:sa");
                    $new_da = date("Y-m-d h:i:sa");
                    // $dayLight = TRUE;
                    $new_me = strtotime($new_da);

                    $deig = date('Y-m-d h:i', $new_me);

                    $user_withdraw = array(
                        'currency_from' 		=> $this->input->post('currency1'),
                        'currency_to' 		=> $this->input->post('currency2'),
                        'amount' 		=> $this->input->post('amount'),
                        'comment' 		=> $this->input->post('comment'),
                        'status' 		=> $status,
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );

                    $cust_id = $this->payer->insert_payment($user_withdraw);

                    $this->session->set_flashdata('flash_message', 'Successful, we shall approve with 48 hours');
                    redirect(site_url('frontend/withdraw_history'));
                }

            }
            elseif($currency_from == 'XPEP')
            {
                if($currency_charge > $xpep_balance)
                {
                    $this->session->set_flashdata('flash_message', 'Insufficient funds to complete transaction');
                    redirect(site_url('frontend/dashboard/xpep'));
                }
                else
                {
                    $status = '0';
                    $type = 'fund wallet';
                    date_default_timezone_set("Africa/Lagos");
                    //echo "The time is " . date("h:i:sa");
                    $new_da = date("Y-m-d h:i:sa");
                    // $dayLight = TRUE;
                    $new_me = strtotime($new_da);

                    $deig = date('Y-m-d h:i', $new_me);

                    $user_withdraw = array(
                        'currency_from' 		=> $this->input->post('currency1'),
                        'currency_to' 		=> $this->input->post('currency2'),
                        'amount' 		=> $this->input->post('amount'),
                        'comment' 		=> $this->input->post('comment'),
                        'status' 		=> $status,
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );

                    $cust_id = $this->payer->insert_payment($user_withdraw);

                    $this->session->set_flashdata('flash_message', 'Successful, we shall approve with 48 hours');
                    redirect(site_url('frontend/withdraw_history'));
                }

            }
            elseif($currency_from == 'Waves')
            {
                if($currency_charge > $waves_balance)
                {
                    $this->session->set_flashdata('flash_message', 'Insufficient funds to complete transaction');
                    redirect(site_url('frontend/dashboard/waves'));
                }
                else
                {
                    $status = '0';
                    $type = 'fund wallet';
                    date_default_timezone_set("Africa/Lagos");
                    //echo "The time is " . date("h:i:sa");
                    $new_da = date("Y-m-d h:i:sa");
                    // $dayLight = TRUE;
                    $new_me = strtotime($new_da);

                    $deig = date('Y-m-d h:i', $new_me);

                    $user_withdraw = array(
                        'currency_from' 		=> $this->input->post('currency1'),
                        'currency_to' 		=> $this->input->post('currency1'),
                        'amount' 		=> $this->input->post('amount'),
                        'comment' 		=> $this->input->post('comment'),
                        'status' 		=> $status,
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );

                    $cust_id = $this->payer->insert_payment($user_withdraw);

                    $this->session->set_flashdata('flash_message', 'Successful, we shall approve with 48 hours');
                    redirect(site_url('frontend/withdraw_history'));
                }

            }
            elseif($currency_from == 'ETH')
            {
                if($currency_charge > $ethereum_balance)
                {
                    $this->session->set_flashdata('flash_message', 'Insufficient funds to complete transaction');
                    redirect(site_url('frontend/dashboard/ethereum'));
                }
                else
                {
                    $status = '0';
                    $type = 'fund wallet';
                    date_default_timezone_set("Africa/Lagos");
                    //echo "The time is " . date("h:i:sa");
                    $new_da = date("Y-m-d h:i:sa");
                    // $dayLight = TRUE;
                    $new_me = strtotime($new_da);

                    $deig = date('Y-m-d h:i', $new_me);

                    $user_withdraw = array(
                        'currency_from' 		=> $this->input->post('currency1'),
                        'currency_to' 		=> $this->input->post('currency1'),
                        'amount' 		=> $this->input->post('amount'),
                        'comment' 		=> $this->input->post('comment'),
                        'status' 		=> $status,
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );

                    $cust_id = $this->payer->insert_payment($user_withdraw);

                    $this->session->set_flashdata('flash_message', 'Successful, we shall approve with 48 hours');
                    redirect(site_url('frontend/withdraw_history'));
                }

            }
            else{
                $this->session->set_flashdata('flash_message', 'Currency not found');
                redirect(site_url('frontend/dashboard'));
            }


        }

	}



}