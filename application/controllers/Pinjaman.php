<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
class Pinjaman extends CI_Controller {


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
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_pinjaman_join($where)->result()
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/pinjaman/list_pinjaman',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
 
    
    public function hapus_pinjaman($id){

        $where=array('kd_pinjam'=> $id);
        $res=$this->ModelAdmin->hapus_data($where,'tb_pinjaman');

         if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>pinjaman berhasil dihapus.</div>');
                redirect($this->agent->referrer());
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>pinjaman  gagal dihapus cobalah beberapa saat lagi.</div>');
                redirect($this->agent->referrer());
                }

    }
   public function tambah_pinjaman()
    {

         $data=array(
            "karyawan"=>$this->ModelAdmin->list_data('tb_karyawan','nik','Desc')->result());
         $comp=array(
            "isi"=>$this->load->view('./admin/pinjaman/form_pinjaman',$data,true)
            );

        $this->load->view("./layout/layout_admin",$comp);
       
    }


    public function pinjaman_submit(){

        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('pinjaman', 'Pinjaman', 'required');
         $this->form_validation->set_rules('tgl_pinjaman', 'Tanggal Pinjaman', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

           
        $data=array(
                'nik'=>$this->input->post('nik'),
                'pinjaman'=>$this->input->post('pinjaman'),
                'dikembalikan'=>"0",
                'sisa'=>$this->input->post('pinjaman'),
                'stt_pinjaman'=>"Pinjam",
                'tgl_peminjaman'=>$this->input->post('tgl_pinjaman')
            );
        $res=$this->ModelAdmin->simpan_data($data,'tb_pinjaman');
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>pinjaman berhasil disimpan.</div>');
               redirect('./pinjaman');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>pinjaman gagal disimpan.</div>');
                redirect('./pinjaman');
                }
            }
        }

    public function edit_pinjaman($id)
    {

        $where=array('kd_pinjam'=> $id);
         $data=array(
            'data'=>$this->ModelAdmin->list_data_where('tb_pinjaman',$where,'','')->result(),
            "karyawan"=>$this->ModelAdmin->list_data('tb_karyawan','nik','Desc')->result()
         );
         $comp=array(
            "isi"=>$this->load->view('./admin/pinjaman/edit_pinjaman',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function edit_submit(){

        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('pinjaman', 'Pinjaman', 'required');
         $this->form_validation->set_rules('tgl_pinjaman', 'Tanggal Pinjaman', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

              $data=array(
                'pinjaman'=>$this->input->post('pinjaman'),
                'dikembalikan'=>"0",
                'sisa'=>$this->input->post('pinjaman'),
                'stt_pinjaman'=>"Pinjam",
                'tgl_peminjaman'=>$this->input->post('tgl_pinjaman')
            );

        $where=array(
                'kd_pinjam'=>$this->input->post('id')
            );
        $res=$this->ModelAdmin->update_data('tb_pinjaman',$data,$where);
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>pinjaman berhasil disimpan.</div>');
               redirect('./pinjaman');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>pinjaman gagal disimpan.</div>');
                redirect('./pinjaman');
                }
            }
        }
    public function cari_pinjaman()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('date(tb_pinjaman.tgl_peminjaman) >='=>$t1,'date(tb_pinjaman.tgl_peminjaman) <='=>$t2); 
         $data=array(
            "data"=>$this->ModelAdmin->list_pinjaman_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/pinjaman/list_pinjaman',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
     public function cetak_pinjaman_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

           $where=array('date(tb_pinjaman.tgl_peminjaman) >='=>$t1,'date(tb_pinjaman.tgl_peminjaman) <='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_pinjaman_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/pinjaman/cetak_pinjaman",$data);
       
    }
     
    public function cetak_pinjaman_semua()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_pinjaman_join($where)->result()
            );
          $this->load->view("./admin/pinjaman/cetak_pinjaman",$data);

        
    }
     public function kembalikan_pinjaman($id)
    {

        $where=array('kd_pinjam'=> $id);
         $data=array(
            'data'=>$this->ModelAdmin->list_data_where('tb_pinjaman',$where,'','')->result(),
            "karyawan"=>$this->ModelAdmin->list_data('tb_karyawan','nik','Desc')->result()
         );
         $comp=array(
            "isi"=>$this->load->view('./admin/pinjaman/kembalikan_pinjaman',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function kembalikan_submit(){

        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('nik', 'Nik', 'required');
         $this->form_validation->set_rules('dikembalikan', 'Dikembalikan', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

                if($this->input->post('sisa')<=0){
                    $stt="Lunas";
                }else{
                    $stt="Pinjam";
                }
              $data=array(
                'dikembalikan'=>$this->input->post('dikembalikan'),
                'sisa'=>$this->input->post('sisa'),
                'stt_pinjaman'=>$stt
            );

        $where=array(
                'kd_pinjam'=>$this->input->post('id')
            );
        $res=$this->ModelAdmin->update_data('tb_pinjaman',$data,$where);
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>pinjaman berhasil disimpan.</div>');
               redirect('./pinjaman');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>pinjaman gagal disimpan.</div>');
                redirect('./pinjaman');
                }
            }
        }
   
}
