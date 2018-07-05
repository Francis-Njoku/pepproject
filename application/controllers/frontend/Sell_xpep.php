<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sell_xpep extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('user/Sell_xpep_model', 'payer');
	}

	public function index()
	{
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);

            $this->data['title'] = 'Request withdraw';
            $this->data['retrieve_user'] = $this->payer->retrieve_user(); //get referral data

            $this->load->view('user/header');
            $this->load->view('user/sell_xpep_view', $this->data);
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
        foreach($retrieve_user as $details):
            $waves_address = $details['waves_address'];
            $ethereum_address = $details['ethereum_address'];
            $bitcoin_address = $details['bitcoin_address'];
            $bitcash_address = $details['bitcash_address'];
            $steem_address = $details['waves_address'];
            $litcoin_address = $details['waves_address'];

        endforeach;

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
            redirect(site_url('frontend/sell_xpep'));
        }

        elseif($status == '1')
        {
            $pep_balance = $data['total_credit_pep'] - $data['total_debit_pep'];
            $xpep_balance = $data['total_credit_xpep'] - $data['total_debit_xpep'];

            $amount = $this->input->post('amount');
            $currency_from = $this->input->post('currency2');
            $currency_to = $this->input->post('currency1');

            $charge = $amount * 0.01;
            $currency_charge = $amount + $charge;

            if($currency_to == 'BTC' && $bitcoin_address == '')
            {
                $this->session->set_flashdata('flash_message', 'You don\'t have a Bitcoin wallet address, <a href="'.site_url('frontend/user_details').'">kindly update here</a>');
                redirect(site_url('frontend/sell_xpep'));
            }
            elseif($currency_to == 'BCH' && $bitcash_address == '')
            {
                $this->session->set_flashdata('flash_message', 'You don\'t have a Bitcash wallet address, <a href="'.site_url('frontend/user_details').'">kindly update here</a>');
                redirect(site_url('frontend/sell_xpep'));
            }
            elseif($currency_to == 'LTC' && $litcoin_address == '')
            {
                $this->session->set_flashdata('flash_message', 'You don\'t have a Litcoin wallet address, <a href="'.site_url('frontend/user_details').'">kindly update here</a>');
                redirect(site_url('frontend/sell_xpep'));
            }
            elseif($currency_to == 'ETH' && $ethereum_address == '')
            {
                $this->session->set_flashdata('flash_message', 'You don\'t have an Ethereum wallet address, <a href="'.site_url('frontend/user_details').'">kindly update here</a>');
                redirect(site_url('frontend/sell_xpep'));
            }
            elseif($currency_to == 'STEEM' && $steem_address == '')
            {
                $this->session->set_flashdata('flash_message', 'You don\'t have a STEEM wallet address, <a href="'.site_url('frontend/user_details').'">kindly update here</a>');
                redirect(site_url('frontend/sell_xpep'));
            }
            elseif($currency_to == 'WAVES' && $waves_address == '')
            {
                $this->session->set_flashdata('flash_message', 'You don\'t have a WAVES wallet address, <a href="'.site_url('frontend/user_details').'">kindly update here</a>');
                redirect(site_url('frontend/sell_xpep'));
            }

            if($currency_from == 'PEP')
            {
                if($currency_charge > $pep_balance)
                {
                    $this->session->set_flashdata('flash_message', 'Insufficient funds to complete transaction');
                    redirect(site_url('frontend/sell_xpep'));
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

                    $user_sell = array(
                        'currency' 		=> $this->input->post('currency1'),
                        'type' 		=> $this->input->post('currency2'),
                        'amount' 		=> $this->input->post('amount'),
                        'status' 		=> $status,
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );

                    $cust_id = $this->payer->insert_payment($user_sell);

                    $this->session->set_flashdata('flash_message', 'Successful, we shall approve with 48 hours');
                    redirect(site_url('frontend/sell_xpep'));
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

                    $user_sell = array(
                        'currency' 		=> $this->input->post('currency1'),
                        'type' 		=> $this->input->post('currency2'),
                        'amount' 		=> $this->input->post('amount'),
                        'status' 		=> $status,
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );

                    $cust_id = $this->payer->insert_payment($user_sell);


                    $this->session->set_flashdata('flash_message', 'Successful, we shall approve with 48 hours');
                    redirect(site_url('frontend/sell_xpep'));
                }

            }
            else{
                $this->session->set_flashdata('flash_message', 'Currency not found');
                redirect(site_url('frontend/dashboard'));
            }


        }

	}



}