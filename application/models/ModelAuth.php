<?php
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
  class ModelAuth extends CI_Model {

     function __construct()
    {
        parent::__construct();
    }

    public function cek_log_admin($table ,$where){
    return $this->db->get_where($table ,$where);
    }
     public function cek_log_member($table,$user,$pass){
        $this->db->select('*');
        $this->db->from($table);
         $this->db->where("email = '$user' or npwp = '$user'");
        $this->db->where('password',$pass);       
        $query = $this->db->get(); 
        return $query;
    }

    public function register($data,$table){
    return $this->db->insert($table,$data);
    }



  }

