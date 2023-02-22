<?php
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
class ModelGuest extends CI_Model{

     function __construct()
    {
        parent::__construct();
    }
    public function list_rekap_join($where){
        $this->db->select('*');
        $this->db->from('tb_skp');
        $this->db->join('tb_pemohon','tb_pemohon.npwp=tb_skp.pemohon');
        $this->db->join('tb_permohonan','tb_permohonan.no_pendaftaran=tb_skp.no_pendaftaran');
        $this->db->join('tb_jenis_reklame','tb_permohonan.kd_jenis_reklame=tb_jenis_reklame.kd_jenis_reklame');
        $this->db->where($where);
        $this->db->order_by('tb_skp.tanggal','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    
}