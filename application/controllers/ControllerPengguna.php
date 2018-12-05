<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPengguna extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('ModelPengguna'));
    }
    
    public function showprofil($id) {
        $data = array(
                 "contents" => $this->ModelPengguna->bacaDataUser("where username ='$id'")->result_array()
        );

        $component = array(
                    "header"    => $this->load->view('header', array(), true),
                    "content"   => $this->load->view('profil', $data, true),
                    "footer"    => $this->load->view('footer', array(), true),
        );
        
        $this->load->view('index', $component);
    }
    
	public function showedit($id) {
        $data = array(
                 "contents" => $this->ModelPengguna->bacaDataUser("where username ='$id'")->result_array()
                );

        $component = array(
                    "header"    => $this->load->view('header', array(), true),
                    "content"   => $this->load->view('edit_profil', $data, true),
                    "footer"    => $this->load->view('footer', array(), true),
                    );
        
        $this->load->view('index', $component);
    }
    
    public function editProfil($id) {
        $username = $id;
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['no_hp'];
		$email = $_POST['email'];
        $gambar = $_POST['gambar'];
        $gambar_awal = $_POST['gambar_awal'];
        
        $config['upload_path']   = './assets/userimages/' . $username . "/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 1024;
        $config['overwrite']     = 'FALSE';
        $config['file_name']     = 'gbr_profil';

        $this->upload->initialize($config);
        $res      = $this->upload->do_upload('gambar');
        $namafile = $this->upload->data('file_name');

        if ($res < "1") {
            $imgUrl = $gambar_awal;
        } else {
            $imgUrl = base_url() . "assets/userimages/" . $username . "/" . $namafile;
        }
        
        $res_update = $this->ModelPengguna->updateProfil(array(
                    "nama"          => $nama,
                    "alamat"        => $alamat,
                    "no_tel"        => $no_hp,
                    "email"         => $email,
                    "gambar"        => $imgUrl) , "username =" ."'".$username."'");
        
        if ($res_update >= 1) {
            redirect('ControllerPengguna/showprofil/'.$id);
        } else {
            show_404();
        }
    }
}