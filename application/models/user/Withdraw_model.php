<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_payment($data)
	{
		$this->db->insert('withdraw', $data);

		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;		
	}
    public function retrieve_user()
    {
        if (isset($this->session->userdata['user_id'])) {

            $userid = ($this->session->userdata['user_id']);
        }
        $query = $this->db->query("SELECT * FROM users WHERE id = '$userid'");
        $result = $query->result_array();
        return $result; //return as object array
    }
    public function retrieve_kyc()
    {
        if (isset($this->session->userdata['user_id'])) {

            $userid = ($this->session->userdata['user_id']);
        }
        $query = $this->db->query("SELECT * FROM kyc WHERE user_id = '$userid'");
        $result = $query->result_array();
        return $result; //return as object array
    }

    public function total_credit_pep()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'credit' )", NULL, FALSE);
        $this->db->where("(currency = 'PEP' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }
    public function total_debit_pep()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'debit' )", NULL, FALSE);
        $this->db->where("(currency = 'PEP' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }

    public function total_credit_xpep()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'credit' )", NULL, FALSE);
        $this->db->where("(currency = 'XPEP' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }
    public function total_debit_xpep()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'debit' )", NULL, FALSE);
        $this->db->where("(currency = 'XPEP' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }

    public function total_credit_waves()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'credit' )", NULL, FALSE);
        $this->db->where("(currency = 'Waves' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }
    public function total_debit_waves()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'debit' )", NULL, FALSE);
        $this->db->where("(currency = 'Waves' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }

    public function total_credit_ethereum()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'credit' )", NULL, FALSE);
        $this->db->where("(currency = 'ETH' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }
    public function total_debit_ethereum()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('wallet');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $this->db->where("(type = 'debit' )", NULL, FALSE);
        $this->db->where("(currency = 'ETH' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }
}