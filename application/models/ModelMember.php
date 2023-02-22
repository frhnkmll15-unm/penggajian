<?php
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
class ModelMember extends CI_Model{

	 function __construct()
    {
        parent::__construct();
    }

   public function hapus_data($where,$table){
        $del=$this->db->where($where);
        $del=$this->db->delete($table);
        return $del;
    }

    public function simpan($data,$table){
        return $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$where){
        $res = $data = $this->db->update($table,$data,$where);
        return $res;
    }
    public function list_pemohon_join($where){
        
        $this->db->select('*');
        $this->db->select('tb_pemohon.email as emailm');
        $this->db->select('tb_perusahaan.email as emailp');
        $this->db->from('tb_pemohon');
        $this->db->join('tb_perusahaan','tb_perusahaan.npwp=tb_pemohon.npwp');
        $this->db->where($where);
        $this->db->order_by('tb_pemohon.tgl_daftar','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
     public function list_permohonan_join($where){
        $this->db->select('*');
        $this->db->select('tb_permohonan.no_pendaftaran as nodaf');
        $this->db->select('tb_permohonan.*');
        $this->db->from('tb_permohonan');
        $this->db->join('tb_pemohon','tb_permohonan.npwp=tb_pemohon.npwp','left');
        $this->db->where($where);
        $this->db->order_by('tb_permohonan.tgl_permohonan','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
     public function list_skp_join($where){
        $this->db->select('*');
        $this->db->from('tb_skp');
        $this->db->join('tb_pemohon','tb_pemohon.npwp=tb_skp.pemohon');
        $this->db->join('tb_permohonan','tb_permohonan.no_pendaftaran=tb_skp.no_pendaftaran');
        $this->db->where($where);
        $this->db->order_by('tb_skp.tanggal','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    public function list_data_where($table,$where){
        $this->db->select('*');
        $this->db->from($table); 
        $this->db->where($where);    
        $query = $this->db->get(); 
        return $query;
    }
    public function list_data($table){
        $this->db->select('*');
        $this->db->from($table);   
        $query = $this->db->get(); 
        return $query;
    }


    

    
}