<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('ModelAdmin'));
    }
    
    public function showprofil($id) {
        $data = array(
                 "contents" => $this->ModelAdmin->bacaDataAdmin("where username_admin ='$id'")->result_array()
                );

        $component = array(
                    "header" => $this->load->view('admin/header', array(), true),
                    "content" => $this->load->view('admin/profil', $data, true),
                    "footer" => $this->load->view('admin/footer', array(), true),
                    );
        
        $this->load->view('admin/index', $component);
    }
    
	public function showedit($id) {
        $data = array(
                 "contents" => $this->ModelAdmin->bacaDataAdmin("where username_admin ='$id'")->result_array()
                );

        $component = array(
                    "header" => $this->load->view('admin/header', array(), true),
                    "content" => $this->load->view('admin/edit_profil', $data, true),
                    "footer" => $this->load->view('admin/footer', array(), true),
                    );
        
        $this->load->view('admin/index', $component);
    }
    
    public function editProfil($id) {
        $username = $id;
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['no_hp'];
		$email = $_POST['email'];
        $gambar = $_POST['gambar'];
        $gambar_awal = $_POST['gambar_awal'];
        
        $config['upload_path']   = './assets/adminimages/' . $username . "/";
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
            $imgUrl = base_url() . "assets/adminimages/" . $username . "/" . $namafile;
        }

        $res_update = $this->ModelAdmin->updateProfil(array(
                "nama_admin"          => $nama,
                "alamat_admin"        => $alamat,
                "no_tel_admin"        => $no_hp,
                "email_admin"         => $email,
                "gambar_admin"        => $imgUrl) , "username_admin =" ."'".$username."'");
        
        if ($res_update >= 1) {
            redirect('ControllerAdmin/showprofil/'.$id);
        } else {
            show_404();
        }
    }
}