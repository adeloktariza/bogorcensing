<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_register extends CI_Model {

		public function add_user($data) {
			
			$this->db->insert('user', $data);

       		$id = $this->db->insert_id();
       		
       		return (isset($id)) ? $id : FALSE;


		}

		public function add_penduduk($data) {

			$this->db->insert('penduduk', $data);
		
		}

		public function add_admin($data) {

			$this->db->insert('admin', $data);
		
		}

		

	}

?>