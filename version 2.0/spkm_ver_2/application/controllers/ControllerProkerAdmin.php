<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerProkerAdmin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('ModelProker'));
    }
    
    public function index() {
        $data = array("contents" => $this->ModelProker->bacaDataProker()->result_array());
        
        $component = array(
            "header"    => $this->load->view('admin/header', array(), true),
            "content"   => $this->load->view('admin/proker', $data, true),
            "footer"    => $this->load->view('admin/footer', array(), true)
        );

		$this->load->view('admin/index', $component);
    }
    
    public function upload() {
        $username = $this->session->user;
        $judul = $_POST['judul'];
		$kementrian = $_POST['kementrian'];
		$isi = $_POST['isi_proker'];
        $gambar = $_POST['gambar'];
        
        $fjudul = str_replace(array(" ", "\"", ":", "."),array("_","'",";","_"), $judul);
        
        mkdir(FCPATH . "/assets/prokerimages/" . $fjudul, 0777, true);

        $config['upload_path']   = './assets/prokerimages/' . $fjudul . "/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 1024;
        $config['overwrite']     = 'FALSE';
        $config['file_name']     = 'gbr_proker';

        $this->upload->initialize($config);
        $res      = $this->upload->do_upload('gambar');
        $namafile = $this->upload->data('file_name');

        if ($res < "1") {
            $img = base_url()."assets/images/null.png";
        } else {
            $img = base_url() . "assets/prokerimages/" . $fjudul . "/" . $namafile;
        }

        $res_insert = $this->ModelProker->inputProker(array(
            "username_admin"    => (string)$this->session->user,
            "judul_proker"      => $judul,
            "isi_proker"        => $isi,
            "kementrian"        => $kementrian,
            "gambar_proker"     => $img
        ));

        if ($res_insert >= 1) {
            redirect('ControllerProkerAdmin');
        } else {
            show_404();
        }
    }
    
    public function showupload() {
        $component = array(
            "header"    => $this->load->view('admin/header', array(), true),
            "content"   => $this->load->view('admin/upload', array(), true),
            "footer"    => $this->load->view('admin/footer', array(), true),
        );

        $this->load->view('admin/index', $component);
    }
    
    public function loadPilihan($id) {
        $cek = $this->ModelProker->bacaDataProker("where id_proker = $id");

        if ($cek->num_rows() > 0) {
            $data = array(
                "contents"  => $this->ModelProker->bacaDataProker("where id_proker=$id")->result_array(),
                "komplain"  => $this->ModelProker->bacaKomplainProker("where b.id_proker=$id")->result_array(),
                "balasan"   => $this->ModelProker->bacaBalasanKomplainProker("where a.id_proker=$id")->result_array());

            $component = array(
                        "header"    => $this->load->view('admin/header', array(), true),
                        "content"   => $this->load->view('admin/detail_proker', $data, true),
                        "footer"    => $this->load->view('admin/footer', array(), true),
                        );

            $this->load->view('admin/index', $component);
        } else {
            show_404();
        }
    }
    public function setujuiKomplain($id) {
        $idk = $_POST['id'];
        $res_update = $this->ModelProker->tambahSetujuKomplain(array(
            "status_komplain" => 1),
            "id_komplain =" . $idk);

        if ($res_update >= 1) {
            redirect('ControllerProkerAdmin/loadPilihan/'.$id);
        } else {
            show_404();
        }
    }
    public function balas($id) {
        $idk = $_POST['idk'];
        $balasan = $_POST['balasan'];
        $res_insert = $this->ModelProker->inputBalasanKomplain(array(
            "id_proker"         => $id,
            "id_komplain"       => $idk,
            "username_admin"    => (string)$this->session->user,
            "isi_balasan"       => $balasan));

        if ($res_insert >= 1) {
            redirect('ControllerProkerAdmin/loadPilihan/'.$id);
        } else {
            show_404();
        }
    }
    public function hapusProker($id) {
        $judul = $_POST['judul'];
        $res_delete_proker = $this->ModelProker->hapusDataBerita("id_proker =" . $id);
        $judul = str_replace(array(" ", "\"",":", "."),array("_","'",";", "_"), $judul);
        $dir = "./assets/prokerimages/" . $judul;
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            unlink($dir.DIRECTORY_SEPARATOR.$item);
        }
        rmdir($dir);
        
        if ($res_delete_proker >= 1) {
            $this->index();
        } else {
            show_404();
        }
    }
    
    public function showeditProker($id) {
        $data = array(
                 "contents" => $this->ModelProker->bacaDataProker("where id_proker ='$id'")->result_array()
                );

        $component = array(
                    "header"    => $this->load->view('admin/header', array(), true),
                    "content"   => $this->load->view('admin/edit_proker', $data, true),
                    "footer"    => $this->load->view('admin/footer', array(), true),
                    );
        
        $this->load->view('admin/index', $component);
    }
    public function editProker($id) {
        $id = $id;
        $judul = $_POST['judul'];
        $judul_awal = $_POST['judul_awal'];
		$isi = $_POST['isi'];
		$kementrian = $_POST['kementrian'];
        $gambar = $_POST['gambar'];
        $gambar_awal = $_POST['gambar_awal'];
        
        $fjudul = str_replace(array(" ", "\"", ":", "."),array("_","'",";", "_"), $judul);
        $judul_awal = str_replace(array(" ", "\"",":", "."),array("_","'",";", "_"), $judul_awal);
        
        $olddir='./assets/prokerimages/' . $judul_awal . '/';
        $newdir='./assets/prokerimages/' . $fjudul . '/';
        rename($olddir,$newdir);
        
        $config['upload_path']   = './assets/prokerimages/' . $fjudul . "/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 1024;
        $config['overwrite']     = 'FALSE';
        $config['file_name']     = 'gbr_proker';

        $this->upload->initialize($config);
        $res      = $this->upload->do_upload('gambar');
        $namafile = $this->upload->data('file_name');

        if ($res < "1") {
            $imgUrl = $gambar_awal;
        } else {
            $imgUrl = base_url() . "assets/prokerimages/" . $fjudul . "/" . $namafile;
        }

        $res_update = $this->ModelProker->updateProker(array(
                    "judul_proker"  => $judul,
                    "isi_proker"    => $isi,
                    "kementrian"    => $kementrian,
                    "gambar_proker" => $imgUrl) , "id_proker =" ."'".$id."'");

        if ($res_update >= 1) {
            redirect('ControllerProkerAdmin/loadPilihan/'.$id);
        } else {
            show_404();
        }
    }
    public function cariProker() {
        $kementrian = $_GET['kementrian'];
        $data = array("contents" => $this->ModelProker->bacaDataProker("where kementrian='".$kementrian."'")->result_array());
        
        $component = array(
            "header"    => $this->load->view('admin/header', array(), true),
            "content"   => $this->load->view('admin/proker', $data, true),
            "footer"    => $this->load->view('admin/footer', array(), true)
        );

		$this->load->view('admin/index', $component);
    }
}