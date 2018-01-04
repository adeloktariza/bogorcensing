<?php

class InstansiController extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('text');
		
		$this->load->model('model_instansi');

		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));

		$this->gallery_path = realpath(APPPATH .'../assets/images/');
	}


	public function index() {
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');

		$id = $this->session->userdata('id_user');

		$get_id = $this->model_instansi->get_id($id);

		$get_kategori = $this->model_instansi->get_kategori($get_id);
		
		$get_status = "terkirim";

		$data['data_laporan'] = $this->model_instansi->get_laporan($get_kategori, $get_status);
		
		$this->load->view('view_instansi', $data);
	}

	public function update_status() {

		$id= $this->uri->segment(4);
		
		$data = array('status_laporan' => "validasi",);

		$hasil = $this->model_instansi->update_status($data,$id);

		redirect('instansi/instansiController');

	}

}
?>