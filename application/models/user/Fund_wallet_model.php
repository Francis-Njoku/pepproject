<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fund_wallet_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_payment($data)
	{
		$this->db->insert('fund_wallet', $data);

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
}