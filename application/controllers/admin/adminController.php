<?php
session_start();

class AdminController extends CI_Controller {


	public function index() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('view_admin', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}
}
?>