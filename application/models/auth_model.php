<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

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
    public function get_user_details($id)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("(referral_id = '$id' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function get_user_row($id)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("(referral_id = '$id' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->num_rows();
        return $rs;

    }
    public function get_closure_details($id)
    {

        $this->db->select('*');
        $this->db->from('closures');
        $this->db->where("(descendant = '$id' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;

    }
    public function get_closure_row($id)
    {

        $this->db->select('*');
        $this->db->from('closures');
        $this->db->where("(descendant = '$id' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->num_rows();
        return $rs;

    }
    public function insert_closure($data)
    {
        $this->db->insert('closures', $data);

        $id = $this->db->insert_id();

        return (isset($id)) ? $id : FALSE;
    }
    public function insert_kyc($data)
    {
        $this->db->insert('kyc', $data);

        $id = $this->db->insert_id();

        return (isset($id)) ? $id : FALSE;
    }
}
