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

    public function update_kategori($data, $id){

            $this->db->where("id_kategori",$id);
            $this->db->update("kategori",$data);
    }

    public function update_status($data, $id){

            $this->db->where("id_laporan",$id);
            $this->db->update("laporan",$data);
    }

    public function delete_kategori($data){
        
        $this->db->where('id_kategori', $data);
        
        $this->db->delete('kategori');
        
    }

    public function delete_laporan($data){
        
        $this->db->where('id_laporan', $data);
        
        $this->db->delete('laporan');

        
    }

    public function get_admin($data)
    {
        $this->db->select('*')
                 ->from('admin')
                 ->join('user', 'user.id_user = admin.id_user');
                   

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
                    return $query->result();
        }
        
        return false;
    }

    public function get_dinas()
    {
        $this->db->select('*')
                 ->from('instansi')
                 ->join('user', 'user.id_user = instansi.id_user');
                   

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
                    return $query->result();
        }
        
        return false;
    }

    public function get_laporan()
    {
        $this->db->select('*')
                 ->from('laporan')
                 ->join('penduduk', 'penduduk.nik = laporan.nik')
                 ->join('kategori','kategori.id_kategori = laporan.id_kategori')
                 ->order_by('id_laporan','desc');
                   

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
                    return $query->result();
        }
        
        return false;
    }
}



?>