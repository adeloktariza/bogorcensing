<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_admin extends CI_Model {

    public function get_instansi()
    {
        $result = $this->db->get('instansi');
        
        return $result;
    }

    public function add_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function get_kategori(){
        

        $this->db->select('*')
                 ->from('instansi')
                 ->join('kategori', 'kategori.id_instansi = instansi.id_instansi');
                   

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
                    return $query->result();
        }
        
        return false;
        
    }
}



?>