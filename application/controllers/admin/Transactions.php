<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('admin/Transactions_model','transaction');	}

	public function index()
	{
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
		$this->load->helper('url');
        $this->load->view('user/header2');
        $this->load->view('admin/transactions_view');
        $this->load->view('user/footer2');
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->transaction->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $transaction) {
            $this->db->from('users');
            $this->db->where('id',$transaction->user_id);
            $query = $this->db->get();

            $result = $query->result_array();
            foreach($result as $user_details)
            {
                $firstname = $user_details['first_name'];
                $lastname = $user_details['last_name'];
            }

			$no++;
			$row = array();
            $row[] = $transaction->id;
            $row[] = $firstname;
            $row[] = $lastname;
            $row[] = $transaction->type;
            $row[] = $transaction->currency;
            $row[] = $transaction->amount;
            $row[] = $transaction->walletId;
            $row[] = $transaction->description;
            $row[] = $transaction->created;
            $row[] = $transaction->updated;
            $data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->transaction->count_all(),
						"recordsFiltered" => $this->transaction->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}


	public function ajax_edit($id)
	{
		$data = $this->transaction->get_by_id($id);
		echo json_encode($data);
	}



}
