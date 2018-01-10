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

	// public function page_kategori() 
 //    {
 //    	$data['username'] = $this->session->userdata('username');

 //    	$data['data_instansi'] = $this->model_admin->get_instansi();

 //    	$data['data_kategori'] = $this->model_admin->get_kategori();


 //        $this->load->view('view_admin_kategori',$data);
 //    }

 //    public function page_laporan() 
 //    {
 //    	$data['username'] = $this->session->userdata('username');

 //    	$data['data_laporan'] = $this->model_admin->get_laporan();

 //        $this->load->view('view_admin_laporan',$data);
 //    }

 //    public function page_berita() 
 //    {
 //    	$data['username'] = $this->session->userdata('username');

 //    	$data['id_user'] = $this->session->userdata('id_user');

	// 	$id = $this->session->userdata('id_user');

	// 	$id_admin = $this->model_admin->get_id_admin($id);

	// 	$data['data_berita'] = $this->model_admin->get_berita();

 //    	$data['data_laporan_valid'] = $this->model_admin->get_laporan_valid();

 //        $this->load->view('view_admin_berita',$data);
 //    }

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
		$users->level 		= 0;
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

	// public function add_kategori() {
	// 	$data = array('nama_kategori' => $this->input->post('addName', TRUE),
	// 				  'id_instansi'   => $this->input->post('addKategori', TRUE)
	// 				 );

	// 	$hasil = $this->model_admin->add_kategori($data);

	// 	redirect('admin/AdminController/page_kategori');

	// }

	// public function add_berita() {

	// 	$data['id_user'] = $this->session->userdata('id_user');

	// 	$id = $this->session->userdata('id_user');

	// 	$id_admin = $this->model_admin->get_id_admin($id);

	// 	$data = array('id_admin' => $id_admin,
	// 				  'id_laporan' => $this->input->post('addlaporan', TRUE),
	// 				  'isi_berita'   => $this->input->post('keterangan', TRUE)
	// 				 );

	// 	$hasil = $this->model_admin->add_berita($data);

	// 	redirect('admin/AdminController/page_berita');

	// }

	// public function update_kategori() {

	// 	$id= $this->uri->segment(4);
		
	// 	$data = array('nama_kategori' => $this->input->post('addName', TRUE),
	// 				  'id_instansi'   => $this->input->post('addKategori', TRUE)
	// 				 );

	// 	$hasil = $this->model_admin->update_kategori($data,$id);

	// 	redirect('admin/AdminController/page_kategori');

	// }

	// public function update_berita() {

	// 	$idber= $this->uri->segment(4);

	// 	echo $idber;
	// 	$id = $this->session->userdata('id_user');

	// 	$id_admin = $this->model_admin->get_id_admin($id);

	// 	$data = array('id_admin' => $id_admin,
	// 				  'id_laporan' => $this->input->post('addlaporan', TRUE),
	// 				  'isi_berita'   => $this->input->post('keterangan', TRUE)
	// 				 );



	// 	$hasil = $this->model_admin->update_berita($data,$idber);

	// 	redirect('admin/AdminController/page_berita');

	// }


	// public function delete_kategori() {

	// 	$data= $this->uri->segment(4);
		
	// 	$del = $this->model_admin->delete_kategori($data);

	// 	redirect('admin/adminController/page_kategori');

	// }

	// public function delete_berita() {

	// 	$data= $this->uri->segment(4);
		
	// 	$del = $this->model_admin->delete_berita($data);

	// 	redirect('admin/adminController/page_berita');

	// }

	public function delete_instansi() {

		$id_instansi = $this->uri->segment(3);
		$id_user = $this->uri->segment(4);
		
		$instansi = new Instansi;
		$instansi = Instansi::delete($id_instansi);

		$user = new User;
		$user = User::delete($id_user);

		redirect('adminController/page_register_instansi');

	}

	// public function update_status() {

	// 	$id= $this->uri->segment(4);
		
	// 	$data = array('status_laporan' => "verifikasi",);

	// 	$hasil = $this->model_admin->update_status($data,$id);

	// 	redirect('admin/AdminController/page_laporan');

	// }

}
?>