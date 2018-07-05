<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_details_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function isDuplicate($phone_number)
    {
        $this->db->get_where('users', array('phone' => $phone_number), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
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
        $this->db->where("(currency = 'XPEP' )", NULL, FALSE);
        $this->db->where("(type = 'credit' )", NULL, FALSE);
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
        $this->db->where("(currency = 'XPEP' )", NULL, FALSE);
        $this->db->where("(type = 'debit' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

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
        $this->db->where("(currency = 'PEP' )", NULL, FALSE);
        $this->db->where("(type = 'credit' )", NULL, FALSE);
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
        $this->db->where("(currency = 'PEP' )", NULL, FALSE);
        $this->db->where("(type = 'debit' )", NULL, FALSE);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs['total'];

    }

    public function upload_image($inputdata,$filename)
    {
        $this->db->insert('user', $inputdata);
        $insert_id = $this->db->insert_id();
        if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){
                $file_data = array(
                    'image' => $file,
                    'user_id' => $insert_id
                );
                $this->db->insert('photos', $file_data);
            }
        }
    }

    public function view_data(){

        if (isset($this->session->userdata['user_id'])) {
            $eMail = ($this->session->userdata['email']);
            $userName = ($this->session->userdata['user_id']);
        } else {
            redirect(site_url('login'));
        }

        $query=$this->db->query("SELECT *
                                 FROM users
                                 WHERE id = $userName");
        return $query->result_array();
    }

    public function edit_kyc(){

        if (isset($this->session->userdata['user_id'])) {
            $eMail = ($this->session->userdata['email']);
            $userName = ($this->session->userdata['user_id']);
        } else {
            redirect(site_url('login'));
        }

        $query=$this->db->query("SELECT *
                                 FROM kyc
                                 WHERE user_id = $userName");
        return $query->result_array();
    }

    public function edit_data_image($id){
        $query=$this->db->query("SELECT photo.*
                                 FROM user ud
                                 RIGHT JOIN photos as photo
                                 ON ud.u_id = photo.user_id
                                 WHERE ud.u_id = $id");
        return $query->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_user_closure()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }
        $this->db->from('closures');
        $this->db->where('ancestor',$user_id);
        $query = $this->db->get();

        return $query->num_rows();
    }
    public function get_closure_details()
    {
        if (isset($this->session->userdata['user_id'])) {

            $user_id = ($this->session->userdata['user_id']);
        } else {

        }
        $this->db->from('closures');
        $this->db->where('ancestor',$user_id);
        $this->db->limit(5);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function db_update($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    public function pin_update($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    public function db_update2($data)
    {
        if (isset($this->session->userdata['user_id'])) {

            $id = ($this->session->userdata['user_id']);

        }
        $this->db->where('user_id', $id);
        $this->db->update('kyc', $data);
    }
    public function update($where, $data)
    {
        $this->db->update('kyc', $data, $where);
        return $this->db->affected_rows();
    }
    public function edit_upload_image($user_id,$inputdata,$filename ='')
    {

        $data = array('line_id'  => $inputdata['line_id'],
                      'id' => $inputdata['id']);
        $this->db->where('line_id', $user_id);
        $this->db->update('users', $data);

        if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){
                $file_data = array(
                    'photo' => $file,
                    'id' => $user_id
                );
                $this->db->insert('photo', $file_data);
            }
        }
    }


}
