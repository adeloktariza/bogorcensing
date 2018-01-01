<?php

class UserController extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->model('model_user');
		$this->load->model('model_register');
		$this->load->library('form_validation');
		$this->load->helper('date');
	}

	public function index() {
		
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');

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

	public function add_laporan(){
  	
  	$data['id_user'] = $this->session->userdata('id_user');
  	$nik = $this->model_user->get_nik($data);

  	//berfungsi saat submit ditekan namun file kosong supaya tidak masuk ke database


	  	$this->load->library('upload');
	  	$namafile = "file_".time();

	  	//konfigurasi ukuran dan type yang bisa di upload
	  	$config = array(
	  						'upload_path' => "./assets/images/laporan/", //mengatur lokasi penyimpanan gambar
	  						'allowed_types' => "gif|jpg|png|jpeg|pdf", // mengatur type yang boleh disimpan
	  						'overwrite' => TRUE,
	  						'max_size' => "2048000",//maksimal ukuran file yang bisa diupload, disini menggunankan 2MB
	  						'max_height' => "1080",
	  						'max_width' => "1920",
	  						'file_name' => $namafile //nama file yang akan terimpan nanti 
	  			);

	  	$this->upload->initialize($config);

	  	$gambar = $this->upload->data();

	  	

	  	$now = date('Y-m-d H:i:s');

	  	$data2= array('judul_laporan' => $this->input->post('judul', TRUE),
					  'keterangan' => $this->input->post('keterangan', TRUE),
					  'id_kategori' => $this->input->post('addKategori', TRUE),
					  'nik' => $nik,
					  'tgl_lapor' => $now,
					  'media' => $gambar['file_name'],
					  'lokasi_kejadian' => $this->input->post('lokasi', TRUE),
					  'status_laporan' => "terkirim"

					 );

		$hasil2 = $this->model_user->add_laporan($data2);

		redirect('user/userController');



 	
	}
	
}
?>
