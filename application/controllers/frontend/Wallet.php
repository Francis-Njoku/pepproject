<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/wallet_model','transaction');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('user/header');
        $this->load->view('user/wallet_view');
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
            $row[] = $transaction->id;
            $row[] = $transaction->type;
            $row[] = $transaction->currency;
            $row[] = $transaction->walletId;
            $row[] = $transaction->amount;
            $row[] = $transaction->description;
            $row[] = $transaction->created;
            if($transaction->status == 0)
            {
                $row[] = 'pending';
            }elseif($transaction->status == 1){
                $row[] = 'successful';
            }
            elseif($transaction->status == 2){
                $row[] = 'cancelled';
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
