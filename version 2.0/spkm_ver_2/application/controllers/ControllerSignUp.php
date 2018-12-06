<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class ControllerSignUp extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('ModelMasyarakat', 'ModelPengguna', 'ModelAdmin'));
    }
    
	public function register($useroradmin) {
        $noktp = $_POST['noktp'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['no_hp'];
		$email = $_POST['email'];
        $username = $_POST['username'];
		$password = $_POST['password'];
        if(isset($_POST['gambar'])) $gambar = $_POST['gambar'];
        
        if($useroradmin=="user") {
            if(($this->ModelPengguna->bacaDataUser("where no_ktp='".$noktp."'")->num_rows()==0) && ($this->ModelPengguna->bacaDataUser("where username='".$username."'")->num_rows()==0)) {
                if (!file_exists("/assets/userimages/".$username)) {
                    mkdir(FCPATH . "/assets/userimages/" . $username, 0777, true);
                }

                $config['upload_path']   = './assets/userimages/' . $username . "/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 1024;
                $config['overwrite']     = 'FALSE';
                $config['file_name']     = 'gbr_profil';

                $this->upload->initialize($config);
                $res      = $this->upload->do_upload('gambar');
                $namafile = $this->upload->data('file_name');

                if ($res < "1") {
                    $imgUrl = base_url()."assets/images/avatar.png";
                } else {
                    $imgUrl = base_url() . "assets/userimages/" . $username . "/" . $namafile;
                }

                $res_insert = $this->ModelMasyarakat->inputDataRegistrasi('user',
                                array("no_ktp" => $noktp,
                                    "nama"	=> $nama,
                                    "alamat"	=> $alamat,
                                    "no_tel" => $no_hp,
                                    "email" => $email,
                                    "username" => $username,
                                    "password" => md5($password),
                                    "gambar"  => $imgUrl
                                ));

                if ($res_insert) {
                    redirect('ControllerProker');
                } else {
                    echo "<script>alert('Anda gagal mendaftarkan akun Anda'); window.location = '/spkm/ControllerSignUp/showregister/user'; </script>";
                }
            } else {
                echo "<script>alert('No. KTP / Username yang Anda masukkan sudah terdaftar'); window.location = '/spkm/ControllerSignUp/showregister/user'; </script>";
            }
        } else if($useroradmin=="admin") {
            if(($this->ModelAdmin->bacaDataAdmin("where no_ktp_admin='".$noktp."'")->num_rows()==0) && ($this->ModelAdmin->bacaDataAdmin("where username_admin='".$username."'")->num_rows()==0)) {
                if (!file_exists("/assets/adminimages/".$username)) {
                    mkdir(FCPATH . "/assets/adminimages/" . $username, 0777, true);
                }

                $config['upload_path']   = './assets/adminimages/' . $username . "/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 1024;
                $config['overwrite']     = 'FALSE';
                $config['file_name']     = 'gbr_profil';

                $this->upload->initialize($config);
                $res      = $this->upload->do_upload('gambar');
                $namafile = $this->upload->data('file_name');

                if ($res < "1") {
                    $imgUrl = base_url()."assets/images/avatar.png";
                } else {
                    $imgUrl = base_url() . "assets/adminimages/" . $username . "/" . $namafile;
                }

                $res_insert = $this->ModelMasyarakat->inputDataRegistrasi('admin',
                                array("no_ktp_admin" => $noktp,
                                    "nama_admin"	=> $nama,
                                    "alamat_admin"	=> $alamat,
                                    "no_tel_admin" => $no_hp,
                                    "email_admin" => $email,
                                    "username_admin" => $username,
                                    "password_admin" => md5($password),
                                    "gambar_admin"  => $imgUrl
                                ));

                if ($res_insert) {
                    redirect('admin');
                } else {
                    echo "<script>alert('Anda gagal mendaftarkan akun Anda'); window.location = '/spkm/ControllerSignUp/showregister/admin'; </script>";
                }
            } else {
                echo "<script>alert('No. KTP / Username yang Anda masukkan sudah terdaftar'); window.location = '/spkm/ControllerSignUp/showregister/admin'; </script>";
            }
        }
    }
    
    public function showregister($useroradmin) {
        if($useroradmin=="user") {
            $component = array(
                "header" => $this->load->view('header', array(), true),
                "content" => $this->load->view('register', array(), true),
                "footer" => $this->load->view('footer', array(), true),
            );

            $this->load->view('index', $component);
        } else if($useroradmin=="admin") {
            $component = array(
                "header" => $this->load->view('admin/header', array(), true),
                "content" => $this->load->view('admin/register', array(), true),
                "footer" => $this->load->view('admin/footer', array(), true),
            );

            $this->load->view('admin/index', $component);
        }
    }
}