<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transfer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('user/Transfer_model', 'transfer');
	}

	public function index()
	{
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);

            $this->data['title'] = 'Request withdraw';
            $this->data['currency'] = $this->transfer->currency();
            $this->data['ico'] = $this->transfer->ico();
            $this->load->view('user/header');
            $this->load->view('user/transfer_view', $this->data);
            $this->load->view('user/footer');

        } else {
            redirect(site_url().'/auth/login');
        }
    }
	
	public function transfer()
	{
        if (isset($this->session->userdata['user_id'])) {

            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);

            $user_d = $this->transfer->user_details($user_id);
            foreach($user_d as $user_de)
            {
                $first_name = $user_de['first_name'];
                $last_name = $user_de['last_name'];
                $u_pep = $user_de['pep_wallet_address'];
                $u_xpep = $user_de['xpep_wallet_address'];

            }
            $admin_d = $this->transfer->admin_details($user_id);
            foreach($admin_d as $admin_de)
            {
                $a_first_name = $admin_de['first_name'];
                $a_last_name = $admin_de['last_name'];
                $a_pep = $admin_de['pep_wallet_address'];
                $a_xpep = $admin_de['xpep_wallet_address'];
            }
        }
        else{
            redirect(site_url('login'));
        }
        $status = '0';
        $type = 'fund wallet';
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);

        $credit_pep = $this->transfer->total_credit_pep();
        $debit_pep = $this->transfer->total_debit_pep();
        $credit_xpep = $this->transfer->total_credit_xpep();
        $debit_xpep = $this->transfer->total_debit_xpep();

        $pep = $credit_pep - $debit_pep;
        $xpep = $credit_xpep - $debit_xpep;


        $currency = $this->input->post('currency');
        $amount = $this->input->post('amount');
        $address = $this->input->post('address');
        $currency_type = $this->input->post('type');

        $percent = 0.01 * $amount;
        $percent_amount = $percent + $amount;

        if($currency == 'PEP')
        {
            if($currency_type == 'xcoinlive' || $currency_type == 'gopepcash')
            {
                if($pep < $percent_amount)
                {
                    $this->session->set_flashdata('flash_message', 'You don\'t have sufficient amount on your PEP wallet to transfer');
                    redirect(site_url('frontend/transfer'));
                }
                else
                {
                    $user_transfer = array(
                        'currency' 		=> $this->input->post('currency'),
                        'amount' 		=> $this->input->post('amount'),
                        'type'	=> $currency_type,
                        'status' 		=> 0,
                        'details' 		=> $this->input->post('address'),
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );
                    $cust_id3 = $this->transfer->insert_transfer($user_transfer);

                    $this->session->set_flashdata('flash_message', 'Successful');
                    redirect(site_url('frontend/transfer'));
                }
            }
            elseif($currency_type == 'pepproject')
            {
                $find_pep = $this->transfer->find_pep($address);
                if($find_pep == 0)
                {
                    $this->session->set_flashdata('flash_message', 'Wallet address not found');
                    redirect(site_url('frontend/transfer'));
                }
                elseif($find_pep == 1)
                {
                    if($pep < $percent_amount)
                    {
                        $this->session->set_flashdata('flash_message', 'You don\'t have sufficient amount on your PEP wallet to transfer');
                        redirect(site_url('frontend/transfer'));
                    }
                    else
                    {
                        $pep_user = $this->transfer->find_pep_details($address);
                        foreach($pep_user as $pep_details)
                        {
                            $pep_user_id = $pep_details['id'];

                        }
                        $user_transfer_credit = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $this->input->post('amount'),
                            'walletId' 		=> $this->input->post('address'),
                            'type'	=> 'credit',
                            'status' 		=> 1,
                            'description' 		=> 'Received from '.ucfirst($first_name).' '.ucfirst($last_name),
                            'user_id' 		=> $pep_user_id,
                            'created' 		=> $deig
                        );
                        $user_admin_credit = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $percent,
                            'walletId' 		=> $a_pep,
                            'type'	=> 'credit',
                            'status' 		=> 1,
                            'description' 		=> 'Received from '.ucfirst($first_name).' '.ucfirst($last_name).' for transfer charges',
                            'user_id' 		=> '40',
                            'created' 		=> $deig
                        );
                        $user_transfer_debit = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $this->input->post('amount'),
                            'walletId' 		=> $u_pep,
                            'type'	=> 'debit',
                            'status' 		=> 1,
                            'description' 		=> 'Debit for transfer to '.$address,
                            'user_id' 		=> $user_id,
                            'created' 		=> $deig
                        );
                        $user_transfer_charge = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $percent,
                            'walletId' 		=> $u_pep,
                            'type'	=> 'debit',
                            'status' 		=> 1,
                            'description' 		=> 'Transfer charges for '.$address,
                            'user_id' 		=> $user_id,
                            'created' 		=> $deig
                        );


                        $cust_id = $this->transfer->insert_payment($user_transfer_credit);
                        $cust_id1 = $this->transfer->insert_payment($user_admin_credit);
                        $cust_id2 = $this->transfer->insert_payment($user_transfer_debit);
                        $cust_id3 = $this->transfer->insert_payment($user_transfer_charge);

                        $this->session->set_flashdata('flash_message', 'Successful');
                        redirect(site_url('frontend/transfer'));

                    }
                }
                else{
                    $this->session->set_flashdata('flash_message', 'An error occurred, kindly contact support');
                    redirect(site_url('frontend/transfer'));
                }
            }
            else{
                $this->session->set_flashdata('flash_message', 'Kindly select an option');
                redirect(site_url('frontend/transfer'));
            }


        }
        elseif($currency == 'XPEP')
        {
            if($currency_type == 'xcoinlive' || $currency_type == 'gopepcash')
            {
                if($xpep < $percent_amount)
                {
                    $this->session->set_flashdata('flash_message', 'You don\'t have sufficient amount on your PEP wallet to transfer');
                    redirect(site_url('frontend/transfer'));
                }
                else
                {
                    $user_transfer = array(
                        'currency' 		=> $this->input->post('currency'),
                        'amount' 		=> $this->input->post('amount'),
                        'type'	=> $currency_type,
                        'status' 		=> 0,
                        'details' 		=> $this->input->post('address'),
                        'user_id' 		=> $user_id,
                        'created' 		=> $deig
                    );
                    $cust_id3 = $this->transfer->insert_transfer($user_transfer);

                    $this->session->set_flashdata('flash_message', 'Successful');
                    redirect(site_url('frontend/transfer'));
                }
            }
            elseif($currency_type == 'pepproject')
            {
                $find_xpep = $this->transfer->find_xpep($address);
                if($find_xpep == 0)
                {
                    $this->session->set_flashdata('flash_message', 'Wallet address not found');
                    redirect(site_url('frontend/transfer'));
                }
                elseif($find_xpep == 1)
                {
                    if($xpep < $percent_amount)
                    {
                        $this->session->set_flashdata('flash_message', 'You don\'t have sufficient amount on your PEP wallet to transfer');
                        redirect(site_url('frontend/transfer'));
                    }
                    else
                    {
                        $xpep_user = $this->transfer->find_xpep_details($address);
                        foreach($xpep_user as $xpep_details)
                        {
                            $xpep_user_id = $xpep_details['id'];

                        }
                        $user_transfer_credit = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $this->input->post('amount'),
                            'walletId' 		=> $this->input->post('address'),
                            'type'	=> 'credit',
                            'status' 		=> 1,
                            'description' 		=> 'Received from '.ucfirst($first_name).' '.ucfirst($last_name),
                            'user_id' 		=> $xpep_user_id,
                            'created' 		=> $deig
                        );
                        $user_admin_credit = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $percent,
                            'walletId' 		=> $a_pep,
                            'type'	=> 'credit',
                            'status' 		=> 1,
                            'description' 		=> 'Received from '.ucfirst($first_name).' '.ucfirst($last_name).' for transfer charges',
                            'user_id' 		=> '40',
                            'created' 		=> $deig
                        );
                        $user_transfer_debit = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $this->input->post('amount'),
                            'walletId' 		=> $u_pep,
                            'type'	=> 'debit',
                            'status' 		=> 1,
                            'description' 		=> 'Debit for transfer to '.$address,
                            'user_id' 		=> $user_id,
                            'created' 		=> $deig
                        );
                        $user_transfer_charge = array(
                            'currency' 		=> $this->input->post('currency'),
                            'amount' 		=> $percent,
                            'walletId' 		=> $u_pep,
                            'type'	=> 'debit',
                            'status' 		=> 1,
                            'description' 		=> 'Transfer charges for '.$address,
                            'user_id' 		=> $user_id,
                            'created' 		=> $deig
                        );


                        $cust_id = $this->transfer->insert_payment($user_transfer_credit);
                        $cust_id1 = $this->transfer->insert_payment($user_admin_credit);
                        $cust_id2 = $this->transfer->insert_payment($user_transfer_debit);
                        $cust_id3 = $this->transfer->insert_payment($user_transfer_charge);

                        $this->session->set_flashdata('flash_message', 'Successful');
                        redirect(site_url('frontend/transfer'));

                    }
                }
                else{
                    $this->session->set_flashdata('flash_message', 'An error occurred, kindly contact support');
                    redirect(site_url('frontend/transfer'));
                }
            }
            else{
                $this->session->set_flashdata('flash_message', 'Kindly select an option');
                redirect(site_url('frontend/transfer'));
            }

        }
        elseif($currency != 'XPEP' || $currency != 'PEP')
        {

                $this->session->set_flashdata('flash_message', 'Currency not accepted');
                redirect(site_url('frontend/transfer'));

        }


	}



}