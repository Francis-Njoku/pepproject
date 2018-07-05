<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Airdrop_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_airdrop($data)
	{
		$this->db->insert('airdrop_count', $data);

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
    public function ico()
    {

        $this->db->select('*');
        $this->db->from('ico');
        $this->db->where('status','1');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function airdrop_gained()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }

        $this->db->select('Sum(amount) as total');
        $this->db->from('airdrop_count');
        $this->db->where("(user_id = '$user_id' )", NULL, FALSE);
        $this->db->where("(status = '1' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }
    public function airdrop_details()
    {

        $this->db->select('*');
        $this->db->from('airdrop');
        $this->db->where('id', '1');
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function airdrop($type)
    {

        $this->db->select('*');
        $this->db->from('airdrop_amount');
        $this->db->where('id', $type);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function update($where, $data)
    {
        $this->db->where('id', $data);
        $this->db->update('airdrop_count', $where);
        return $this->db->affected_rows();
    }

    public function peptribe_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '1');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_peptribe()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '1');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_peptribe()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','1');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_row($airdrop_type)
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type',$airdrop_type);
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }


    public function pep_telegram_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '2');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_peptribe_telegram()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '2');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_peptribe_telegram()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type',2);
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function pep_whatsapp_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '3');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_peptribe_whatsapp()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '3');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_peptribe_whatsapp()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','3');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function pep_tribetv_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '4');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_peptribe_tv()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '4');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_peptribe_tv()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','4');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function facebook_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '5');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_peptribe_facebook()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '5');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_peptribe_facebook()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','5');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function marketxr_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '7');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_peptribe_marketxr()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '7');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_peptribe_marketxr()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','7');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function email_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '8');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_email()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '8');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_email()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','8');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function sms_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '9');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_sms()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '9');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_sms()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','9');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function chatonx_value()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_amount');
            $this->db->where('id', '10');
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }
    public function num_chatonx()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);
            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type', '10');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->num_rows();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

    public function get_chatonx()
    {
        if (isset($this->session->userdata['user_id'])) {
            $email = ($this->session->userdata['email']);
            $user_id = ($this->session->userdata['user_id']);


            $this->db->select('*');
            $this->db->from('airdrop_count');
            $this->db->where('type','10');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            $rs = $query->result_array();
            return $rs;
        }
        else {
            redirect(site_url().'/auth/login');
        }

    }

}