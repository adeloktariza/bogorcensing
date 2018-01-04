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
                  	->join('user', 'user.id_user = penduduk.id_user')
                  	->where('user.id_user',$data);
            

            $query = $this->db->get();

           	if ($query->num_rows() > 0) {
         				return $query->row()->nik;
     		}
    		
    		return false;

	    }
	    public function get_laporan($data){
	        
	        $this->db->select('*')
	        		->from('laporan')
                  	->join('penduduk', 'penduduk.nik = laporan.nik')
                  	->where('penduduk.nik',$data)
                  	->order_by('id_laporan',"desc");
	        
	        $que = $this->db->get();

           	if ($que->num_rows() > 0) {
         				return $que->result();
     		}
    		
    		return false;
	    }
	    public function add_laporan($data){
	    	$this->db->insert('laporan', $data);
		}
		public function update_laporan($data, $id){

			$this->db->where("id_laporan",$id);
			$this->db->update("laporan",$data);
		}

		public function delete_laporan($data){

	    	$this->db->where('id_laporan', $data);
			$this->db->delete('laporan');
		}

	}

?>
