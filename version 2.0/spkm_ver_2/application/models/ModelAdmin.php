<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {
    
    function __construct()
    {
         parent::__construct();
    }
    public function cekDataLogin($username, $password = true) {
        $data = $this->db->get_where("admin", array('username_admin' => $username, 'password_admin' => $password), 1);
        if ($data->num_rows() > 0) {
            return array_shift($data->result_array());
        } else {
            return null;
        }
    }
    
    public function bacaDataAdmin($where) {
        $data = $this->db->query('select * from admin ' .$where);
		return $data;
    }
    
    public function updateProfil($data, $where) {
		$res = $this->db->update("admin", $data, $where);
		return $res;
	}
}