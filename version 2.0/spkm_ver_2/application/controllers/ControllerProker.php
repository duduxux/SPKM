<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerProker extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('ModelProker'));
    }
    
    public function index() {
        $data = array("contents" => $this->ModelProker->bacaDataProker()->result_array());
        
        $component = array(
            "header"    => $this->load->view('header', array(), true),
            "content"   => $this->load->view('proker', $data, true),
            "footer"    => $this->load->view('footer', array(), true)
        );

		$this->load->view('index', $component);
    }
    
    public function loadPilihan($id) {
        $cek = $this->ModelProker->bacaDataProker("where id_proker = $id");

        if ($cek->num_rows() > 0) {
            $data = array(
                "contents"  => $this->ModelProker->bacaDataProker("where id_proker=$id")->result_array(),
                "komplain"  => $this->ModelProker->bacaKomplainProker("where a.id_proker=$id")->result_array(),
                "balasan"   => $this->ModelProker->bacaBalasanKomplainProker("where a.id_proker=$id")->result_array());

            $component = array(
                        "header"    => $this->load->view('header', array(), true),
                        "content"   => $this->load->view('detail_proker', $data, true),
                        "footer"    => $this->load->view('footer', array(), true),
                        );

            $this->load->view('index', $component);
        } else {
            show_404();
        }
    }
    public function tambahKomplain($id) {
        $isi = $_POST['isi_proker'];
        $res_insert = $this->ModelProker->inputKomplain(array(
            "id_proker"         => $id,
            "username"          => (string)$this->session->user,
            "isi_komplain"      => $isi,
            "status_komplain"   => 0,
            "suka"              => 0));

        if ($res_insert >= 1) {
           redirect('ControllerProker/loadPilihan/'.$id);
        } else {
            show_404();
        }
    }
    public function sukaiKomplain($id) {
        $idk = $_POST['id'];
        $suka = $_POST['sukai'];
        $sukai = (int)$suka+1;
        $res_update = $this->ModelProker->tambahSukaKomplain(array("suka" => $sukai), "id_komplain =" . $idk);

        if ($res_update >= 1) {
           redirect('ControllerProker/loadPilihan/'.$id);
        } else {
            show_404();
        }
    }
    public function cariProker() {
        $kementrian = $_GET['kementrian'];
        $data = array("contents" => $this->ModelProker->bacaDataProker("where kementrian='".$kementrian."'")->result_array());
        
        $component = array(
            "header"    => $this->load->view('header', array(), true),
            "content"   => $this->load->view('proker', $data, true),
            "footer"    => $this->load->view('footer', array(), true)
        );

		$this->load->view('index', $component);
    }
}