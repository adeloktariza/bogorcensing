<?php

class AdminController extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('username') == "") {
			redirect('login');
		}
		$this->load->library('twig');
		$this->twig->add_function('base_url');

		$this->load->helper('text');
	}

	public function index() {
		$data['username'] = $this->session->userdata('username');

		$this->load->view('view_admin', $data);
	}

	public function page_register_admin() {
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');

		$admin = new Admin;
		$admin = Admin::all();
	 	$user = Admin::user()->get();

	 	$data['admin'] = [];
	 	$temp = [];
		foreach ($admin as $key => $val) {
			foreach ($user as $key => $value) {
				if($val->id_user == $value->id_user){
					$temp['nama'] = $val->nama;
					$temp['alamat'] = $val->alamat;
					$temp['email'] = $val->email;
					$temp['username'] = $value->username;
					$temp['level'] = $value->level;	

					array_push($data['admin'], $temp);
				}				
			}
		}
		
		$this->load->view('view_admin_register', $data);
	}

	public function page_register_instansi() {
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');

		$id = $this->session->userdata('id_user');

		$dinas = new Instansi;
		$dinas = Instansi::all();

		$data['instansi'] = $dinas;

		$this->load->view('view_instansi_register', $data);
	}

	public function page_kategori() 
    {
    	$data['username'] = $this->session->userdata('username');

    	$instansi = new Instansi;
    	$instansi = Instansi::all();

    	$kategori = new Kategori;
    	$kategori = Kategori::all();

    	$data['kategori'] = $kategori;
    	$data['instansi'] = $instansi;


        $this->load->view('view_admin_kategori',$data);
    }

    public function page_laporan() 
    {
    	$data['username'] = $this->session->userdata('username');


    	$laporan = new Laporan;
		$laporan = Laporan::all();
	 	$kategori = Laporan::kategori()->get();
	 	$penduduk = Laporan::penduduk()->get();

	 	$data['laporan'] = [];
	 	$temp = [];
		foreach ($laporan as $key => $val) {
			foreach ($penduduk as $key => $val2) {
					if($val->nik == $val2->nik){
						$temp['nama'] = $val2->nama;
					}	
			}
			foreach ($kategori as $key => $val3) {
					if($val->id_kategori == $val3->id_kategori){
						$temp['nama_kategori'] = $val3->nama_kategori;	
					}
			}

			$temp['id_laporan'] = $val->id_laporan;
			$temp['judul_laporan'] = $val->judul_laporan;
			$temp['tgl_lapor'] = $val->tgl_lapor;
			$temp['lokasi_kejadian'] = $val->lokasi_kejadian;
			$temp['keterangan'] = $val->keterangan;
			$temp['media'] = $val->media;
			$temp['status_laporan'] = $val->status_laporan;

			array_push($data['laporan'], $temp);	
		}

        $this->load->view('view_admin_laporan',$data);
    }

    public function page_berita() 
    {
    	$data['username'] = $this->session->userdata('username');

    	$data['id_user'] = $this->session->userdata('id_user');

		$id = $this->session->userdata('id_user');


		$admin = new Admin;
		$admin = Admin::where('id_user', $id)->first();



		$laporan = new Laporan;
		$laporan = Laporan::where('status_laporan', 'validasi')->get();

		$berita = new Berita;
		$berita = Berita::where('id_admin', $admin->id_admin)->get();
		$adm    = Berita::admin()->get();
		$lap    = Berita::laporan()->get();

		$data['laporan'] = $laporan; 
		$data['admin'] = $admin;
		$data['berita'] = [];
	 	$temp = [];
		foreach ($berita as $key => $val) {
			foreach ($adm as $key => $val2) {
					if($val->id_admin == $val2->id_admin){
						$temp['nama'] = $val2->nama;
						$temp['id_admin'] = $val2->id_admin;
						$temp['id_user'] = $val2->id_user;
					}	
			}
			foreach ($lap as $key => $val3) {
					if($val->id_laporan == $val3->id_laporan){
						$temp['id_laporan'] = $val3->id_laporan;
						$temp['judul_laporan'] = $val3->judul_laporan;
						$temp['tgl_lapor'] = $val3->tgl_lapor;
						$temp['lokasi_kejadian'] = $val3->lokasi_kejadian;
						$temp['keterangan'] = $val3->keterangan;
						$temp['media'] = $val3->media;
						$temp['status_laporan'] = $val3->status_laporan;	
					}
			}
			$temp['id_berita'] = $val->id_berita;
			$temp['isi_berita'] = $val->isi_berita;


			array_push($data['berita'], $temp);	
		}

		$this->load->view('view_admin_berita',$data);
    }

	public function register_admin() {


		$users = new User;

		$users->username 	= $this->input->post('addUsername', TRUE);
		$users->password 	= md5($this->input->post('addPassword', TRUE));
		$users->level 		= 0;
		$users->save();


		$admin = new Admin;
		$admin->nama 			= $this->input->post('addName', TRUE);
		$admin->email 			= $this->input->post('addEmail', TRUE);
		$admin->no_telpon 		= $this->input->post('addNumber', TRUE);
		$admin->alamat 			= $this->input->post('addAddress', TRUE);
		$admin->id_user			= $users->id_user;
		$admin->save();

		redirect('adminController/page_register_admin');

	}

	public function register_instansi() {

		$users = new User;
		$users->username 	= $this->input->post('addUsername', TRUE);
		$users->password 	= md5($this->input->post('addPassword', TRUE));
		$users->level 		= 1;
		$users->save();


		$instansi = new Instansi;
		$instansi->nama 			= $this->input->post('addName', TRUE);
		$instansi->email 			= $this->input->post('addEmail', TRUE);
		$instansi->no_telpon 		= $this->input->post('addNumber', TRUE);
		$instansi->alamat 			= $this->input->post('addAddress', TRUE);
		$instansi->id_user			= $users->id_user;
		$instansi->save();

		redirect('adminController/page_register_instansi');

	}

	public function add_kategori() {

		$kategori = new Kategori;
		$kategori->nama_kategori 	= $this->input->post('addName', TRUE);
		$kategori->id_instansi 		= $this->input->post('addKategori', TRUE);
		$kategori->save();

		redirect('adminController/page_kategori');

	}

	public function add_berita() {

		$data['username'] = $this->session->userdata('username');

    	$data['id_user'] = $this->session->userdata('id_user');

		$id = $this->session->userdata('id_user');

		$admin = new Admin;
		$admin = Admin::where('id_user', $id)->first();

		$berita = new Berita;
		$berita->id_admin 	= $admin->id_admin;
		$berita->id_laporan = $this->input->post('addlaporan', TRUE);
		$berita->isi_berita = $this->input->post('keterangan', TRUE);
		$berita->save();

		redirect('adminController/page_berita');

	}

	public function update_kategori() {

		$id= $this->uri->segment(3);

		$kategori = new Kategori;
		$kategori = Kategori::where('id_kategori',$id)->first();

		$kategori->nama_kategori 	= $this->input->post('addName', TRUE);
		$kategori->id_instansi 		= $this->input->post('addKategori', TRUE);
		$kategori->save();
		
		redirect('adminController/page_kategori');

	}

	public function update_berita() {

		$idb= $this->uri->segment(3);

		$id = $this->session->userdata('id_user');

		$admin = new Admin;
		$admin = Admin::where('id_user', $id)->first();

		$berita = new Berita;
		$berita = Berita::where('id_berita',$idb)->first();

		$berita->id_admin 	= $admin->id_admin;
		$berita->id_laporan = $this->input->post('addlaporan', TRUE);
		$berita->isi_berita = $this->input->post('keterangan', TRUE);
		$berita->save();

		redirect('adminController/page_berita');

	}


	public function delete_kategori() {

		$id= $this->uri->segment(3);

		$kategori = new Kategori;
		$kategori = Kategori::delete($id);

		redirect('adminController/page_kategori');

	}

	public function delete_berita() {

		$id= $this->uri->segment(3);
		
		$berita = new Berita;
		$berita = Berita::delete($id);

		redirect('adminController/page_berita');

	}

	public function delete_instansi() {

		$id_instansi = $this->uri->segment(3);
		$id_user = $this->uri->segment(4);
		
		$instansi = new Instansi;
		$instansi = Instansi::delete($id_instansi);

		$user = new User;
		$user = User::delete($id_user);

		redirect('adminController/page_register_instansi');

	}

	public function update_status() {

		$id= $this->uri->segment(3);

		$laporan = new Laporan;
		$laporan = Laporan::where('id_laporan', $id)->first();
		$laporan->status_laporan = "verifikasi";
		$laporan->save();

		redirect('adminController/page_laporan');

	}

}
?>