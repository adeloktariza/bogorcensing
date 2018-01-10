<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		// $this->load->model('model_user');
		$this->load->library('twig');
		$this->twig->add_function('base_url');
 
	}

	public function index() {
		if ($this->session->userdata('username') == "") {
			$this->load->view('view_login');
		}else{
			if ($this->session->userdata('level') == 2) {
				redirect('pendudukController');
			}
			elseif ($this->session->userdata('level') == 1) {
				redirect('instansiController');
			}
			elseif ($this->session->userdata('level') == 0) {
				redirect('adminController');
			}		
		}
		
	}

	public function cek_login() {

		$data = array('username' => $this->input->post('username', TRUE),
					  'password' => md5($this->input->post('password', TRUE)));

		//$hasil = $this->model_user->cek_user($data);

		$users = User::where('username',$data['username'])->first();

		if ($users) 
		{
			$sess_data = [];
			$sess_data['id_user'] = $users->id_user;
			$sess_data['username'] = $users->username;
			$sess_data['level'] = $users->level;
			$this->session->set_userdata($sess_data);

			if ($this->session->userdata('level') == 2) {
				redirect('pendudukController');
			}
			elseif ($this->session->userdata('level') == 1) {
				redirect('instansiController');
			}
			elseif ($this->session->userdata('level') == 0) {
				redirect('adminController');
			}					
			
		}
		else {
			redirect('login');
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}

}

?>