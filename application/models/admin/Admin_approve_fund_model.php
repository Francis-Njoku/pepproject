<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_approve_fund_model extends CI_Model {

    public function __construct()
    {
        //$this->load->database();
    }
    public function insert_wallet($data)
    {
        $this->db->insert('wallet', $data);

        $id = $this->db->insert_id();

        return (isset($id)) ? $id : FALSE;
    }
    public function result4()
    {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        $this->db->select('*');
        $this->db->from('fund_wallet');
        $this->db->where('currency_to','PEP');
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function get_blogs4($limit, $offset) {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
        $this->db->where('currency_to','PEP');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get('fund_wallet',$limit, $offset);
        // $result['num_rows'] = $this->db->count_all_results('conversations');

        //$result['num_rows'] = $this->db->count_all_results('messages');
        return $result;
    }

    public function result2()
    {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        $this->db->select('*');
        $this->db->from('fund_wallet');
        $this->db->where('currency_to','XPEP');
        $query = $this->db->get();
        return $query->num_rows();

    }
    public function get_blogs2($limit, $offset) {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        if ($offset > 0) {
            $offset = ($offset - 1) * $limit;
        }
        $this->db->where('currency_to','XPEP');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get('fund_wallet',$limit, $offset);
        // $result['num_rows'] = $this->db->count_all_results('conversations');

        //$result['num_rows'] = $this->db->count_all_results('messages');
        return $result;
    }

    public function accept($id)
    {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('fund_wallet');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function ico($id)
    {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('ico');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function currency($id)
    {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        $this->db->select('*');
        $this->db->where('abbrevation', $id);
        $this->db->from('currency');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function wallet_details($id)
    {
        if (isset($this->session->userdata['user_id'])) {
            $user_id = ($this->session->userdata['user_id']);

        }
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('wallet');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_details($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE id='$id'");
        $result = $query->result_array();
        return $result; //return as object array
    }
    public function update($where, $data)
    {
        $this->db->update('currency', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_ico($ico, $updata)
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $deig = date('Y-m-d h:i', $new_me);
        $this->db->where('id', $ico);
        $this->db->update('ico', array('current_amount' => $updata['current_amount'], 'updated' => $deig));
        return;
    }
    public function update_status2($data)
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);

        $terms = $this->input->post('terms');
        $meeting_place = $this->input->post('meeting_place');


        $deig = date('Y-m-d h:i', $new_me);
        $this->db->where('id', $data);
        $this->db->update('trade', array('meeting_place' => $meeting_place, 'terms_of_trade' => $terms, 'date' => $deig));
        return;
    }
    public function update_status_fund_wallet($data)
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);


        $deig = date('Y-m-d h:i', $new_me);
        $this->db->where('id', $data);
        $this->db->update('fund_wallet', array('status' => 1, 'updated' => $deig));
        return;
    }
    public function update_status_fund_wallet2($data)
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);


        $deig = date('Y-m-d h:i', $new_me);
        $this->db->where('id', $data);
        $this->db->update('fund_wallet', array('status' => 2, 'updated' => $deig));
        return;
    }
    public function update_status_wallet($id)
    {
        date_default_timezone_set("Africa/Lagos");
        //echo "The time is " . date("h:i:sa");
        $new_da = date("Y-m-d h:i:sa");
        // $dayLight = TRUE;
        $new_me = strtotime($new_da);


        $deig = date('Y-m-d h:i', $new_me);
        $this->db->where('type', $id);
        $this->db->where('escrow >', 0);
        $this->db->update('wallet', array('status' => 2, 'date' => $deig));
        return;
    }

}