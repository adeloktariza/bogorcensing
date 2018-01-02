<?php

class UserController extends CI_Controller {

	var $gallery_path;

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		$this->load->model('model_user');
		$this->load->model('model_register');
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));

		$this->gallery_path = realpath(APPPATH .'../assets/images/');
	}

	public function index() {
		
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');

		$id = $this->session->userdata('id_user');

		$nik = $this->model_user->get_nik($id);

		$data['data_laporan'] = $this->model_user->get_laporan($nik);

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



	  	$namafile = "file_".time();

	  	//konfigurasi ukuran dan type yang bisa di upload
	  	$config['upload_path'] = './assets/images/laporan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG|PNG'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $namafile; //nama yang terupload nantinya
 
        $this->load->library('upload',$config);

       if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
        }

        $gambar = base_url().'assets/images/laporan/'.$config['file_name'];
	  	
	  	$now = date('Y-m-d H:i:s');

	  	$data2= array('judul_laporan' => $this->input->post('judul', TRUE),
					  'keterangan' => $this->input->post('keterangan', TRUE),
					  'id_kategori' => $this->input->post('addKategori', TRUE),
					  'nik' => $nik,
					  'tgl_lapor' => $now,
					  'media' => $gambar,
					  'lokasi_kejadian' => $this->input->post('lokasi', TRUE),
					  'status_laporan' => "terkirim"

					 );

		$hasil2 = $this->model_user->add_laporan($data2);

		redirect('user/userController');



 	
	}

	public function delete_laporan() {

		$data= $this->uri->segment(4);

		$del = $this->model_user->delete_laporan($data);

		redirect('user/userController');

	}

}
?>
