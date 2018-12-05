<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengguna extends CI_Model {
    
    public function cekDataLogin($username, $password = true) {
        $data = $this->db->get_where("user", array('username' => $username, 'password' => $password), 1);
        if ($data->num_rows() > 0) {
            return array_shift($data->result_array());
        } else {
            return null;
        }
    }
    
    public function bacaDataUser($where) {
        $data = $this->db->query('select * from user ' .$where);
		return $data;
    }
    
    public function updateProfil($data, $where) {
		$res = $this->db->update("user", $data, $where);
		return $res;
	}
}