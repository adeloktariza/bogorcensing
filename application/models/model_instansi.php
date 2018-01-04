<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_instansi extends CI_Model {

	    public function get_id($data){
	        
	        $this->db->select('*')
	        		->from('instansi')
                  	->join('user', 'user.id_user = instansi.id_user')
                  	->where('user.id_user',$data);
            

            $query = $this->db->get();

           	if ($query->num_rows() > 0) {
         				return $query->row()->id_instansi;
     		}
    		
    		return false;

	    }
	    public function get_kategori($data){
	        
	        $this->db->select('*')
	        		->from('kategori')
                  	->join('instansi', 'instansi.id_instansi = kategori.id_instansi')
                  	->where('instansi.id_instansi',$data);
            

            $query = $this->db->get();

           	if ($query->num_rows() > 0) {
         				return $query->row()->id_kategori;
     		}
    		
    		return false;

	    }
	    public function get_laporan($data, $status){

	        $this->db->select('*')
	        		->from('laporan')
                  	->join('kategori', 'kategori.id_kategori = laporan.id_kategori')
                  	->where('kategori.id_kategori',$data)
                  	->order_by('id_laporan','desc');

            $this->db->where('status_laporan !=', $status);
	        
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

		public function update_status($data, $id){

            $this->db->where("id_laporan",$id);
            $this->db->update("laporan",$data);
    	}

	}

?>
