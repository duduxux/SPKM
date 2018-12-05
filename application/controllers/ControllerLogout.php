<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLogout extends CI_Controller {

	public function logout($useroradmin) {
        $this->session->sess_destroy();
        if($useroradmin=="user") {
            redirect('');
        } else if($useroradmin=="admin") {
            redirect('admin');
        }
    }
}