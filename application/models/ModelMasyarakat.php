<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasyarakat extends CI_Model {
    
    public function inputDataRegistrasi($adminoruser, $data) {
        $res_insert = $this->db->insert($adminoruser, $data);
		return $res_insert;
    }
}