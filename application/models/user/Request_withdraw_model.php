<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Request_withdraw_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_payment($data)
	{
		$this->db->insert('request_withdraw', $data);

		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;		
	}

}