<?php
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
class ModelAdmin extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function list_data($table,$order,$urut){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$urut);      
        $query = $this->db->get(); 
        return $query;
    }
     public function list_data_where($table,$where,$order,$urut){
        $this->db->select('*');
        $this->db->from($table); 
        $this->db->where($where); 
        $this->db->order_by($order,$urut);      
        $query = $this->db->get(); 
        return $query;
    }
    public function list_karyawan_join($where){
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->join('tb_jabatan','tb_karyawan.kd_jabatan=tb_jabatan.kd_jabatan');
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->order_by('tb_karyawan.th_masuk','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    public function list_pinjaman_join($where){
        $this->db->select('*');
        $this->db->from('tb_pinjaman');
        $this->db->join('tb_karyawan','tb_karyawan.nik=tb_pinjaman.nik');
        $this->db->where($where);
        $this->db->order_by('tb_pinjaman.tgl_peminjaman','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    public function list_absensi_join($where){
        $this->db->select('*');
        $this->db->from('tb_absensi');
        $this->db->join('tb_karyawan','tb_karyawan.nik=tb_absensi.nik');
        $this->db->where($where);
        $this->db->order_by('tb_absensi.kd_absen','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    public function list_gaji_join($where){
        $this->db->select('*');
        $this->db->from('tb_gaji');
        $this->db->join('tb_karyawan','tb_karyawan.nik=tb_gaji.nik');
        $this->db->join('tb_jabatan','tb_jabatan.kd_jabatan=tb_karyawan.kd_jabatan');
        $this->db->where($where);
        $this->db->order_by('tb_gaji.kd_gaji','Desc');      
        $query = $this->db->get(); 
        return $query;
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

    
    
}