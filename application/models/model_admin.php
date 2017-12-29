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
}



?>