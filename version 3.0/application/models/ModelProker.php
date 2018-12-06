<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProker extends CI_Model {
    
    function __construct()
    {
         parent::__construct();
    }
    public function bacaDataProker($where = "") {
		$data = $this->db->query('select * from proker '.$where);
		return $data;
	}
    public function inputKomplain($data) {
        $res_insert = $this->db->insert('komplain', $data);
		return $res_insert;
    }
    public function bacaKomplainProker($db, $where = "") {
        $data = $this->db->query('select * from komplain a join user b on a.username = b.username '.$where);
		return $data;
    }
    public function bacaBalasanKomplainProker($db, $where = "") {
        $data = $this->db->query('select * from balasan_komplain a join admin b on a.username_admin = b.username_admin '.$where);
		return $data;
    }
    public function tambahSukaKomplain($data, $where = "") {
        $res = $this->db->update('komplain', $data, $where);
		return $res;
    }
    public function hapusDataKomplain($komplainorbalasan, $where = "") {
        $res = $this->db->delete($komplainorbalasan, $where);
		return $res;
    }
    public function tambahSetujuKomplain($data, $where = "") {
        $res = $this->db->update('komplain', $data, $where);
		return $res;
    }
    public function hapusDataBerita($where = "") {
        $res = $this->db->delete('proker', $where);
		return $res;
    }
    public function inputBalasanKomplain($data) {
        $res_insert = $this->db->insert('balasan_komplain', $data);
		return $res_insert;
    }
    
    public function inputProker($data) {
        $res_insert = $this->db->insert('proker', $data);
		return $res_insert;
    }
    public function updateProker($data, $where) {
		$res = $this->db->update("proker", $data, $where);
		return $res;
	}
}