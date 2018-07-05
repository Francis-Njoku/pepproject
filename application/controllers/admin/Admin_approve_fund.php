<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_approve_fund extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_approve_fund_model', 'transaction');
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function index($offset = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        //how many blogs will be shown in a page
        $limit = 10;
        $result = $this->transaction->get_blogs4($limit, $offset);
        // $data['blog_list'] = $result['rows'];
        //$data['num_results'] = $result['num_rows'];
        $data['blog_list'] = $this->transaction->get_blogs4($limit, $offset);
        $data['num_results'] = $this->transaction->result4();

        // load pagination library
        $config = array();
        $config['base_url'] = site_url().'/admin/admin_approve_fund/index';
        $config['total_rows'] = $data['num_results'];
        $config['per_page'] = $limit;
        //which uri segment indicates pagination number
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        //max links on a page will be shown
        $config['num_links'] = 5;
        //various pagination configuration
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_tag_open'] = '&nbsp;<span style="color:black; border-color: black; border-style: groove; border-width: thin; text-decoration:none; padding:7px 10px 7px 10px;">';
        $config['first_tag_close'] = '</span>';
        $config['first_link'] = '';
        $config['last_tag_open'] = '&nbsp;<span style="color:black; border-color: black; border-style: groove; border-width: thin; text-decoration:none; padding:7px 10px 7px 10px;">';
        $config['last_tag_close'] = '</span>';
        $config['last_link'] = '';
        $config['prev_tag_open'] = '&nbsp;<span class="prev">';
        $config['prev_tag_close'] = '</span>';
        $config['prev_link'] = 'Previous &nbsp;';
        $config['next_tag_open'] = '&nbsp;<span class="next">';
        $config['next_tag_close'] = '</span>';
        $config['next_link'] = '&nbsp; Next';
        $config['cur_tag_open'] = '&nbsp;<span style="color:black; border-color: black; border-style: groove; border-width: thin; text-decoration:none; padding:7px 10px 7px 10px;">';
        $config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('user/header2');
        $this->load->view('admin/admin_approve_fund_view', $data);
        $this->load->view('user/footer');
    }

    public function preview($id)//this know only one parameter will be come to this
    {
        if ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            $data['details'] = $this->transaction->get_details($id);//passing the clock id to get details of your product
            $this->load->view('admin/header');

            $this->load->view('admin/admin_trader_history_details', $data);
            $this->load->view('admin/footer');

        }
        else{
            redirect(show_404());
        }

    }



    public function credit()
    {
        $id = $this->input->post('id');
        $get_details = $this->transaction->accept($id);

        foreach($get_details as $details)
        {
            $cr_user_id = $details['user_id'];
            $amount = $details['amount'];
            $currency_from = $details['currency_from'];
            $currency_to = $details['currency_to'];
            $referrence = $details['referrence'];
            $ico = $details['ico'];
            $date = $details['date'];
            $status = $details['status'];
        }

        $get_currency = $this->transaction->currency($currency_from);

        foreach($get_currency as $c_details)
        {
            $currency_name = $c_details['currency'];
            $currency_value = $c_details['value'];
        }

        $get_ico = $this->transaction->ico($ico);

        foreach($get_ico as $ico_details)
        {
            $ico_rate = $ico_details['rate'];
            $ico_current_amount = $ico_details['current_amount'];
        }



        $get_user_details = $this->transaction->get_details($cr_user_id);

        foreach($get_user_details as $user_details)
        {
            $pep_address = $user_details['pep_wallet_address'];

        }

        # calculate amount in PEP
        $pep_amount = $currency_value / $ico_rate;
        $pep_credit = $pep_amount * $amount;

        $new_ico_amount = $ico_current_amount + $pep_credit;


        if (isset($this->session->userdata['user_id'])) {
            $user_id_2 = ($this->session->userdata['user_id']);

            if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
            {
                // redirect them to the home page because they must be an administrator to view this
                redirect(show_404());
            }
            else
            {
                if($status == 1)
                {
                    $this->session->set_flashdata('flash_message', 'User already credited');
                    redirect(site_url().'/admin/admin_approve_fund/index');
                }
                $description = 'Funded wallet with reference '.$referrence;
                $wallet = array(
                    'user_id' => $cr_user_id,
                    'currency' => $currency_to,
                    'walletId' => $pep_address,
                    'type' => 'credit',
                    'description' => $description,
                    'amount' => $amount,
                    'status' => '1',
                    'created' => date('Y-m-d h:i'),
                );

                $updata = array(
                    'current_amount' => $new_ico_amount
                );
                $insert_wallet = $this->transaction->insert_wallet($wallet);

                $update_status_fund_wallet = $this->transaction->update_status_fund_wallet($id);
                $update_ico = $this->transaction->update_ico($ico, $updata);

                $this->session->set_flashdata('flash_message', 'Successful');
                redirect(site_url('/admin/admin_approve_fund'));
            }
        }
        else
        {
            redirect(site_url().'/');
        }


    }
    public function cancel()
    {
        $id = $this->input->post('id');
        $get_details = $this->transaction->accept($id);

        foreach($get_details as $details)
        {
            $cr_user_id = $details['user_id'];
            $amount = $details['amount'];
            $currency_from = $details['currency_from'];
            $currency_to = $details['currency_to'];
            $referrence = $details['referrence'];
            $ico = $details['ico'];
            $date = $details['date'];
            $status = $details['status'];
        }


        if (isset($this->session->userdata['user_id'])) {
            $user_id_2 = ($this->session->userdata['user_id']);

            if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
            {
                // redirect them to the home page because they must be an administrator to view this
                redirect(show_404());
            }
            else
            {
                if($status == 1)
                {
                    $this->session->set_flashdata('flash_message', 'User has already been credited');
                    redirect(site_url('/admin/admin_approve_fund'));
                }
                elseif($status == 2)
                {
                    $this->session->set_flashdata('flash_message', 'Payment has already been cancelled');
                    redirect(site_url('/admin/admin_approve_fund'));
                }

                $update_status_trade = $this->transaction->update_status_fund_wallet2($id);
                $this->session->set_flashdata('flash_message', 'Successful');
                redirect(site_url('/admin/admin_approve_fund'));
            }
        }
        else
        {
            redirect(site_url().'/');
        }


    }

}