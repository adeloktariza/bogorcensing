<?php

class UserController extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->model('model_register');
	}

	public function index() {
		

		if ($this->session->userdata('username') == "") {
			$this->load->view('view_user_register', $data);
		}else{
			if ($this->session->userdata('level') == 2) {
				redirect('user/userController/logout');
			}
			elseif ($this->session->userdata('level') == 1) {
				redirect('home');
			}
			elseif ($this->session->userdata('level') == 0) {
				redirect('admin/adminController');
			}		
		}
	}

	public function page_register_user() {

		$this->load->view('view_user_register');
	}

	public function add_user() {
		$data = array('username' => $this->input->post('addUsername', TRUE),
					  'password' => md5($this->input->post('addPassword', TRUE)),
					  'level'    => 2 
					 );


		$hasil = $this->model_register->add_user($data);


		$data2= array('nik' => $this->input->post('addNik', TRUE),
					  'nama' => $this->input->post('addName', TRUE),
					  'email' => $this->input->post('addEmail', TRUE),
					  'no_telpon' => $this->input->post('addNumber', TRUE),
					  'alamat' => $this->input->post('addAddress', TRUE),
					  'id_user' => $hasil
					 );

		$hasil2 = $this->model_register->add_penduduk($data2);

		redirect('login');

	}
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}
}
?>