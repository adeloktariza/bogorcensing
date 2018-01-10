<?php

class InstansiController extends CI_Controller {

	public function __construct() {
		parent::__construct();


		if ($this->session->userdata('username') == "") {
			redirect('login');
		}
		$this->load->library('twig');
		$this->twig->add_function('base_url');


		$this->load->helper('text');

		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));

		$this->gallery_path = realpath(APPPATH .'../assets/images/');
	}


	public function index() {
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');

		$id = $this->session->userdata('id_user');


		$instansi = new Instansi;
		$instansi = Instansi::where('id_user', $id)->first();

		$kategori = new Kategori;
		$kategori = Kategori::where('id_instansi', $instansi->id_instansi)->get();

		$laporan = new Laporan;
		$laporan = Laporan::where('status_laporan !=', 'terkirim')->get();

		
		$data['laporan'] = [];
	 	$temp = [];
		foreach ($laporan as $key => $val) {
			foreach ($kategori as $key => $val3) {
					if($val->id_kategori == $val3->id_kategori && $val->status_laporan != 'terkirim'){
						$temp['nama_kategori'] = $val3->nama_kategori;
						$temp['id_laporan'] = $val->id_laporan;
						$temp['judul_laporan'] = $val->judul_laporan;
						$temp['tgl_lapor'] = $val->tgl_lapor;
						$temp['lokasi_kejadian'] = $val->lokasi_kejadian;
						$temp['keterangan'] = $val->keterangan;
						$temp['media'] = $val->media;
						$temp['status_laporan'] = $val->status_laporan;
						array_push($data['laporan'], $temp);	
					}
			}
		}


		$this->load->view('view_instansi', $data);
	}

	public function update_status() {

		$id= $this->uri->segment(3);

		$laporan = new Laporan;
		$laporan = Laporan::where('id_laporan', $id)->first();
		$laporan->status_laporan = "validasi";
		$laporan->save();


		redirect('instansiController');

	}

}
?>