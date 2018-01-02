<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_user extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('user', $data);
			return $query;
		}
		public function get_kategori(){
	        
	        $result = $this->db->get('kategori');
	        
	        return $result;
	    }
	    public function get_nik($data){
	        
	        $this->db->select('nik')
	        		->from('penduduk')
                  	->join('user', 'user.id_user = penduduk.id_user');
            

            $query = $this->db->get();

           	if ($query->num_rows() > 0) {
         				return $query->row()->nik;
     		}
    		
    		return false;

	    }
	    public function get_laporan(){
	        
	        $result = $this->db->get('laporan');
	        
	        return $result;
	    }
	    public function add_laporan($data){
	    	$this->db->insert('laporan', $data);
		}

	}

?>
