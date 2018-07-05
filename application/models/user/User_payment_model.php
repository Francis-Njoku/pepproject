<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_payment_model extends CI_Model {

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
   function get_users($userid)
    {

        if (isset($this->session->userdata['id'])) {

            $userid = ($this->session->userdata['id']);
        } else {
            redirect(site_url().'/main/login');
        }

        /* all the queries relating to the data we want to retrieve will go in here. */

        $query = $this->db->query("SELECT * FROM walletbalance WHERE userId='$userid'");


        return $query;
    }

}