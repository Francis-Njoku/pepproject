<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw_history extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/Withdraw_history_model','transaction');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('user/header');
        $this->load->view('user/withdraw_history_view');
        $this->load->view('user/footer2');
    }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->transaction->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $transaction) {
            $no++;
            $row = array();
            $row[] = $transaction->request_id;
            $row[] = $transaction->currency;
            $row[] = $transaction->amount;
            $row[] = $transaction->wallet_address;
            $row[] = $transaction->date_request;
            $row[] = $transaction->date;
            $row[] = $transaction->comment;
            if($transaction->status == 0)
            {
                $row[] = 'pending';
            }elseif($transaction->status == 1){
                $row[] = 'paid';
            }
            elseif($transaction->status == 2){
                $row[] = 'pending approval';
            }

            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsFiltered" => $this->transaction->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



}
