<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('ModelPengguna', 'ModelAdmin'));
    }
    
	public function validasi($useroradmin) {
        if($useroradmin=="user") {
            $username  = $_POST['username'];
            $password  = $_POST['password'];
            $data_auth = $this->ModelPengguna->cekDataLogin($username, md5($password));
            $nama = (string) $data_auth['nama'];
            $pass = (string) $data_auth['password'];

            if ($data_auth != null) {
                $data      = array(
                    'user'      => $username,
                    'nama'      => $nama,
                    'password'  => $pass,
                    'logged_in' => true
                );
                $this->session->set_userdata($data);
                $datauser = $this->session->user;

                redirect('ControllerProker');
            } else {
                echo "<script>alert('Username / Password Salah'); window.location = '/spkm/ControllerLogin/login/user'; </script>";
            }
        } else if($useroradmin=="admin") {
            $username  = $_POST['username'];
            $password  = $_POST['password'];
            $data_auth = $this->ModelAdmin->cekDataLogin($username, md5($password));
            $nama = (string) $data_auth['nama_admin'];
            $pass = (string) $data_auth['password_admin'];

            if ($data_auth != null) {
                $data      = array(
                    'user'      => $username,
                    'nama'      => $nama,
                    'password'  => $pass,
                    'logged_in' => true
                );
                $this->session->set_userdata($data);
                $datauser = $this->session->user;

                redirect('ControllerProkerAdmin');
            } else {
                echo "<script>alert('Username / Password Salah'); window.location = '/spkm/admin'; </script>";
            }
        }
    }
    
    public function login($useroradmin) {
        if($useroradmin=="user") {
            $component = array(
                "header"    => $this->load->view('header', array(), true),
                "content"   => $this->load->view('login', array(), true),
                "footer"    => $this->load->view('footer', array(), true),
            );

            $this->load->view('index', $component);
        } else if($useroradmin=="admin") {
            $component = array(
                "header"    => $this->load->view('admin/header', array(), true),
                "content"   => $this->load->view('admin/login', array(), true),
                "footer"    => $this->load->view('admin/footer', array(), true),
            );

            $this->load->view('admin/index', $component);
        }
    }
}