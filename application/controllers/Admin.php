<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status')!="admin" && $this->session->userdata('status')!="karyawan" && $this->session->userdata('status')!="owner"){
            redirect(base_url('/AuthAdmin'));
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('ModelAdmin');
        $this->load->library('encryption');
        $this->load->library('user_agent');
        
    }
    public function index()
    {
        $comp=array(
            "isi"=>$this->dashboard()
            );

        $this->load->view("./layout/layout_admin",$comp);
    }

     public function dashboard()
    {
        $data=array();
        return $this->load->view('./admin/dashboard',$data,true);
       
    }
      public function rekap_reklame()
    {
        $where=array('tb_permohonan.stt_permohonan ='=>'Acc Permohonan','tb_skp.stt ='=>'Approve'); 
         $data=array(
            "data"=>$this->ModelAdmin->list_rekap_join($where)->result(),
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/rekap/list_rekap',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
      public function cari_rekap()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('tb_permohonan.stt_permohonan ='=>'Acc Permohonan','tb_skp.stt ='=>'Approve','date(tb_skp.tanggal) >='=>$t1,'date(tb_skp.tanggal) <='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_rekap_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/rekap/list_rekap',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
    }
       
     public function cetak_rekap_semua()
    {
          $where=array('tb_permohonan.stt_permohonan ='=>'Acc Permohonan','tb_skp.stt ='=>'Approve'); 
         $data=array(
            "data"=>$this->ModelAdmin->list_rekap_join($where)->result()
            );
        $this->load->view("./admin/rekap/cetak_rekap",$data);
       
    }
     public function cetak_rekap_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

          $where=array('tb_permohonan.stt_permohonan ='=>'Acc Permohonan','tb_skp.stt ='=>'Approve','date(tb_skp.tanggal) >='=>$t1,'date(tb_skp.tanggal) <='=>$t2); 
       
         $data=array(
            "data"=>$this->ModelAdmin->list_rekap_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/rekap/cetak_rekap",$data);
       
    }
       public function profil()
    {
         $data=array();
        
         $comp=array(
            "isi"=>$this->load->view('./admin/administrator/form_profil',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
      public function profil_submit()
    {
      
        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('nama', 'Nama ', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id', 'ID admin', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

        $nama=$this->input->post('nama');    
        $username=$this->input->post('username');
        $pas=$this->input->post('password');
        $id=$this->input->post('id');

            if($pas !== $this->session->userdata('password')) {
                $password=md5($pas); 
            }else{
                $password=$this->session->userdata('password'); 
            }    

         $where=array('id_admin'=>$id);
        $data=array(
                'nama'=>$nama,
                'username'=>$username,
                'password'=>$password
            );
        $res=$this->ModelAdmin->update_data('tb_admin',$data,$where);

        if($res >= 1 ){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Perubahan berhasil disimpan.</div>');
               redirect('./admin/profil');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Perubahan gagal disimpan.</div>');
                redirect('./admin/profil');
                }
            }
        }
}
