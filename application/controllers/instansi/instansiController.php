<?php

class InstansiController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
		$this->load->helper('text');
		$this->load->model('model_register');
	}
	public function index() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('view_instansi', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}
}
?>