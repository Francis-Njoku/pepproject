<?php

Class Dashboard_model extends CI_Model {


    public function __construct()
    {
        parent::__construct();

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
    public function count_airdrop()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }
        $this->db->select('*');
        $this->db->from('airdrop_count');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->num_rows();
        return $rs;

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

    public function total_credit_bitcoin()
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
        $this->db->where("(currency = 'BTC' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }
    public function total_debit_bitcoin()
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
        $this->db->where("(currency = 'BTC' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

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

    public function xpep_wallet()
    {
        if (isset($this->session->userdata['user_id'])) {

            $userid = ($this->session->userdata['user_id']);
        }

        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('status','1');
        $this->db->where('user_id', $userid);
        $this->db->where('currency','XPEP');
        $this->db->limit('5');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function waves_wallet()
    {
        if (isset($this->session->userdata['user_id'])) {

            $userid = ($this->session->userdata['user_id']);
        }

        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('status','1');
        $this->db->where('user_id', $userid);
        $this->db->where('currency','Waves');
        $this->db->limit('5');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function pep_wallet()
    {
        if (isset($this->session->userdata['user_id'])) {

            $userid = ($this->session->userdata['user_id']);
        }

        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('status','1');
        $this->db->where('user_id', $userid);
        $this->db->where('currency','PEP');
        $this->db->limit('5');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function ethereum_wallet()
    {
        if (isset($this->session->userdata['user_id'])) {

            $userid = ($this->session->userdata['user_id']);
        }

        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('status','1');
        $this->db->where('user_id', $userid);
        $this->db->where('currency','ETH');
        $this->db->limit('5');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function bitcoin_wallet()
    {
        if (isset($this->session->userdata['user_id'])) {

            $userid = ($this->session->userdata['user_id']);
        }

        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('status','1');
        $this->db->where('user_id', $userid);
        $this->db->where('currency','BTC');
        $this->db->limit('5');
        $this->db->order_by('id', 'DESC');
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
}

?>