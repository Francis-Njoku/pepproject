<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transfer_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_payment($data)
	{
		$this->db->insert('wallet', $data);

		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;		
	}
    public function insert_transfer($data)
    {
        $this->db->insert('transfer', $data);

        $id = $this->db->insert_id();

        return (isset($id)) ? $id : FALSE;
    }
    public function user_details($id)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function admin_details($id)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id','40');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function currency()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(status = '1' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function ico()
    {

        $this->db->select('*');
        $this->db->from('ico');
        $this->db->where('status','1');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function find_pep($address)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('pep_wallet_address',$address);
        $query = $this->db->get();
        $rs = $query->num_rows();
        return $rs;

    }
    public function find_pep_details($address)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('pep_wallet_address',$address);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function find_xpep($address)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('xpep_wallet_address',$address);
        $query = $this->db->get();
        $rs = $query->num_rows();
        return $rs;

    }
    public function find_xpep_details($address)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('xpep_wallet_address',$address);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

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
}