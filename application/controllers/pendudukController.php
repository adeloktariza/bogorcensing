<?php

class PendudukController extends CI_Controller {

	var $gallery_path;

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('username') == "") {
			redirect('login');
		}
		

		$this->load->helper('text');

		$this->load->library('twig');
		$this->twig->add_function('base_url');
 
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));

		$this->gallery_path = realpath(APPPATH .'../assets/images/');
	}

	public function index() {
		
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');

		$user = User::where('username',$data['username'])->first();

		$penduduk = Penduduk::where('id_user',$data['id_user'])->first();

		$laporan = Laporan::where('nik', $penduduk->nik)->get();

		$kategori = Kategori::all();

		$data['penduduk'] = $penduduk;
		$data['laporan']  = $laporan;
		$data['kategori'] = $kategori;
		
		$this->load->view('view_user', $data);

	}

	public function page_register_user() {

		$this->load->view('view_user_register');
	}

	public function add_user() {

		$users = new User;

		$users->username 	= $this->input->post('addUsername', TRUE);
		$users->password 	= md5($this->input->post('addPassword', TRUE));
		$users->level 		= 2;
		$users->save();

		// echo "<pre>";
		// print_r($users->id_user); die();

		$penduduk = new Penduduk;
		$penduduk->nik 			= $this->input->post('addNik', TRUE);
		$penduduk->nama 		= $this->input->post('addName', TRUE);
		$penduduk->email 		= $this->input->post('addEmail', TRUE);
		$penduduk->no_telpon 	= $this->input->post('addNumber', TRUE);
		$penduduk->alamat		= $this->input->post('addAddress', TRUE);
		$penduduk->id_user 		= $users->id_user;
		$penduduk->save();

		redirect('login');

	}

	public function add_laporan(){
  	
	  	$data['id_user'] = $this->session->userdata('id_user');
	  	$id = $this->session->userdata('id_user');

	  	$nik = new Penduduk;
	  	$nik = Penduduk::where('id_user',$id)->first()->nik;
		

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

		$laporan = new Laporan;

		$laporan->judul_laporan 	= $this->input->post('judul', TRUE);
		$laporan->keterangan    	= $this->input->post('keterangan', TRUE);
		$laporan->id_kategori   	= $this->input->post('addKategori', TRUE);
		$laporan->nik   			= $nik;
		$laporan->tgl_lapor			= $now;
		$laporan->media 			= $gambar;
		$laporan->lokasi_kejadian 	= $this->input->post('lokasi', TRUE);
		$laporan->status_laporan 	= 'terkirim';
		$laporan->save();

		redirect('pendudukController');



 	
	}
	public function check_user(){

		$usr = $this->input->post('addUsername',TRUE);

		$cek_user = User::where('username', $usr)->first();
		
		if($cek_user)
		{
		 
		  echo "false";
		
		}else{
		
		  echo "true";
		
		}
	}
	public function update_laporan() {

		

		$id = $this->uri->segment(3);

		if ($_FILES['gambar']['name'] == "" && $_FILES['gambar']['size'] == 0)
		{
    			$now = date('Y-m-d H:i:s');

    			$laporan = new Laporan;
    			$laporan = Laporan::where('id_laporan',$id)->first();

    			$laporan->judul_laporan 	= $this->input->post('judul', TRUE);
				$laporan->keterangan    	= $this->input->post('keterangan', TRUE);
				$laporan->id_kategori   	= $this->input->post('addKategori', TRUE);
				$laporan->tgl_lapor			= $now;
				$laporan->lokasi_kejadian 	= $this->input->post('lokasi', TRUE);
				$laporan->status_laporan 	= 'terkirim';
				$laporan->save();

		}else{
			
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

			$laporan = new Laporan;
			$laporan = Laporan::where('id_laporan',$id)->first();

			$laporan->judul_laporan 	= $this->input->post('judul', TRUE);
			$laporan->keterangan    	= $this->input->post('keterangan', TRUE);
			$laporan->id_kategori   	= $this->input->post('addKategori', TRUE);
			$laporan->tgl_lapor			= $now;
			$laporan->media 			= $gambar;
			$laporan->lokasi_kejadian 	= $this->input->post('lokasi', TRUE);
			$laporan->status_laporan 	= 'terkirim';
			$laporan->save();
		

		}

		redirect('pendudukController');


	}

	public function delete_laporan() {

		$id= $this->uri->segment(3);

		$laporan = new Laporan;
		$laporan = Laporan::delete($id);

		redirect('pendudukController');

	}

}
?>
