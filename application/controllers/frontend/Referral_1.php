<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referral_1 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/referral_1_model','referral');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('user/header');
        $this->load->view('user/referral_1_view');
        $this->load->view('user/footer2');
    }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->referral->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $referral) { $this->db->from('users');
            $this->db->where('id',$referral->descendant);
            $query = $this->db->get();

            $result = $query->result_array();
            foreach($result as $user_details)
            {
                $firstname = $user_details['first_name'];
                $lastname = $user_details['last_name'];
            }

            $no++;
            $row = array();
            $row[] = $referral->id;
            $row[] = $firstname;
            $row[] = $lastname;

            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsFiltered" => $this->referral->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



}
