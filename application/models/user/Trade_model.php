<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trade_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_payment($data)
	{
		$this->db->insert('trade', $data);

		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;		
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
    public function trade()
    {

        $this->db->select('*');
        $this->db->from('trade');
        $this->db->where("(status = '1' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function currency_bitcoin()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(abbrevation = 'BTC' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function currency_bitcash()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(abbrevation = 'BCH' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }

    public function currency_ethereum()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(abbrevation = 'ETH' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function currency_litcoin()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(abbrevation = 'LTC' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function currency_waves()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(abbrevation = 'Waves' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function currency_steem()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(abbrevation = 'STEEM' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function currency_naira()
    {

        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where("(abbrevation = 'NGN' )", NULL, FALSE);
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