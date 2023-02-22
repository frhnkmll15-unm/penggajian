<?php
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
class ModelAbsen extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }
   
    public function hapus_data($where,$table){
		$del=$this->db->where($where);
		$del=$this->db->delete($table);
		return $del;
	}

    public function simpan_data($data,$table){
    return $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$where){
    $res = $data = $this->db->update($table,$data,$where);
     return $res;
    }

    public function list_absensi($where, $like){
        $this->db->select('tb_absensi_karyawan.*, tb_karyawan.nm_karyawan');
        $this->db->from('tb_absensi_karyawan');
        $this->db->join('tb_karyawan','tb_karyawan.nik=tb_absensi_karyawan.nik');
        if ($where != null) {
            $this->db->where($where);
        }
        if ($like != null) {
            $this->db->like($like);
        }
        $this->db->order_by('tb_absensi_karyawan.tanggal','Desc');      
        $query = $this->db->get(); 
        return $query;
    }

    public function list_absensi_month($month, $year, $id){
        $this->db->select('tb_absensi_karyawan.*, tb_karyawan.nm_karyawan');
        $this->db->from('tb_absensi_karyawan');
        $this->db->join('tb_karyawan','tb_karyawan.nik=tb_absensi_karyawan.nik');
        if ($id != null) {
            $this->db->where("tb_absensi_karyawan.nik", $id);
        }
        $this->db->where("MONTH(tb_absensi_karyawan.tanggal)", $month != null ? $month : date('m'));
        $this->db->where("YEAR(tb_absensi_karyawan.tanggal)", $year != null ? $year : date('Y') );
        // $this->db->order_by('tb_absensi_karyawan.tanggal','Desc');      
        $query = $this->db->get(); 
        return $query;
    }

    public function list_absensi_month_all(){
        $this->db->select('tb_absensi_karyawan.*, tb_karyawan.nm_karyawan');
        $this->db->from('tb_absensi_karyawan');
        $this->db->join('tb_karyawan','tb_karyawan.nik=tb_absensi_karyawan.nik');
        // $this->db->where("MONTH(tb_absensi_karyawan.tanggal)", $month != null ? $month : date('m'));
        // $this->db->where("YEAR(tb_absensi_karyawan.tanggal)", $year != null ? $year : date('Y') );
        $this->db->order_by('tb_absensi_karyawan.tanggal','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    
}