<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('model_register');
 
	}

	public function index() {
		if ($this->session->userdata('username') == "") {
			$this->load->view('view_register');
		}else{
			if ($this->session->userdata('level') == 2) {
				redirect('user/userController');
			}
			elseif ($this->session->userdata('level') == 1) {
				redirect('home');
			}
			elseif ($this->session->userdata('level') == 0) {
				redirect('admin/adminController');
			}		
		}
		
	}

	public function add_data() {
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