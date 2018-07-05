<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airdrop_approval extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('admin/Airdrop_approval_model','airdrop');	}

	public function index()
	{
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
		$this->load->helper('url');
        $this->load->view('user/header2');
        $this->load->view('admin/airdrop_approval_view');
        $this->load->view('user/footer2');
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->airdrop->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $airdrop) {
            $this->db->from('users');
            $this->db->where('id',$airdrop->user_id);
            $query = $this->db->get();

            $result = $query->result_array();
            foreach($result as $user_details)
            {
                $firstname = $user_details['first_name'];
                $lastname = $user_details['last_name'];

            }

            $this->db->from('airdrop_amount');
            $this->db->where('id',$airdrop->type);
            $query = $this->db->get();

            $result = $query->result_array();
            foreach($result as $user_details)
            {
                $type = $user_details['type'];

            }
			$no++;
			$row = array();
            $row[] = $airdrop->id;
            $row[] = $firstname;
            $row[] = $lastname;
            $row[] = $type;
            $row[] = $airdrop->currency;
            $row[] = $airdrop->amount;
            $row[] = $airdrop->details;
            $row[] = $airdrop->created;
            $row[] = $airdrop->updated;
            if($airdrop->status == 1)
                $row[] = 'Approved';
            elseif($airdrop->status == 0)
                $row[] = 'Pending';

			//add html for action
            if($airdrop->status == 1)
                $row[] = '
                <form name="status_update" method="post" action="#">
                 <input type="submit" value="Done" class="btn btn-danger">
                </form>
                ';
            elseif($airdrop->status == 0)
                $row[] = '
                <form name="status_update" method="post" action="'.site_url("/admin/airdrop_approval/credit").'">
                <input type="hidden" name="id" value="'.$airdrop->id.'">
                 <input type="submit" value="Credit" class="btn btn-primary">
                </form>
                ';

            $data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->airdrop->count_all(),
						"recordsFiltered" => $this->airdrop->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

    public function credit()
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);
        $id = $this->input->post('id');

        $get_airdrop = $this->airdrop->get_airdrop($id);
        foreach($get_airdrop as $airdrop_details)
        {
            $user_id = $airdrop_details['user_id'];
            $type = $airdrop_details['type'];
            $currency = $airdrop_details['currency'];
            $amount = $airdrop_details['amount'];
            $details = $airdrop_details['details'];
        }

        $get_airdrop_det = $this->airdrop->get_airdrop_details($type);
        foreach($get_airdrop_det as $airdrop_details)
        {
            $type_details = $airdrop_details['type'];
        }

        $get_bonus = $this->airdrop->get_airdrop_bonus($id);
        foreach($get_bonus as $airdrop_details)
        {
            $total = $airdrop_details['total'];
            $balance = $airdrop_details['balance'];
        }

        $new_balance = $amount + $balance;

        $get_user = $this->airdrop->get_user_details($user_id);

        foreach($get_user as $user_details)
        {
            $pep_address = $user_details['pep_wallet_address'];

        }
        $description = 'Amount gotten from airdrop for '.$type_details;



        $data_airdrop = array(
            'updated' => $deig,
            'status' => '1'
        );

        $airdrop_balance = array(
            'date_updated' => $deig,
            'balance' => $new_balance
        );
        $insert_wallet = array(
            'created' => $deig,
            'type' => 'credit',
            'currency' => $currency,
            'walletId' => $pep_address,
            'amount' => $amount,
            'status' => '1',
            'user_id' => $user_id,
            'description' => $description
        );
        $this->airdrop->update_airdrop(array('id' => '1'), $airdrop_balance);
        $this->airdrop->update(array('id' => $this->input->post('id')), $data_airdrop);
        $this->airdrop->insert_wallet($insert_wallet);
        $this->session->set_flashdata('flash_message', 'successful');
        redirect(site_url().'/admin/airdrop_approval');
    }

	public function ajax_edit($id)
	{
		$data = $this->airdrop->get_by_id($id);
		echo json_encode($data);
	}



}
