<?php

class UserController extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->model('model_user');
		$this->load->model('model_register');
	}

	public function index() {
		
		$data['username'] = $this->session->userdata('username');

		$data['data_kategori'] = $this->model_user->get_kategori();
		
		$this->load->view('view_user', $data);

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
	
}
?>