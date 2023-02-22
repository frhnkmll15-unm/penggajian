<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {


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
            "data"=>$this->ModelAdmin->list_data_where('tb_jabatan',$where,'kd_jabatan','DESC')->result(),
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/jabatan/list_jabatan',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
 
    
    public function hapus_jabatan($id){

        $where=array('kd_jabatan'=> $id);
        $res=$this->ModelAdmin->hapus_data($where,'tb_jabatan');

         if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Jabatan berhasil dihapus.</div>');
                redirect($this->agent->referrer());
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Jabatan  gagal dihapus cobalah beberapa saat lagi.</div>');
                redirect($this->agent->referrer());
                }

    }
   public function tambah_jabatan()
    {
        
         $data=array();
         $comp=array(
            "isi"=>$this->load->view('./admin/jabatan/form_jabatan',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }


    public function jabatan_submit(){

        date_default_timezone_set("Asia/Jakarta");


        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

        $data=array(
                'nm_jabatan'=>$this->input->post('nama_jabatan'),
                'honor'=>$this->input->post('honor'),
            );
        $res=$this->ModelAdmin->simpan_data($data,'tb_jabatan');
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Jabatan berhasil disimpan.</div>');
               redirect('./jabatan');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Jabatan gagal disimpan.</div>');
                redirect('./jabatan');
                }
            }
        }

        public function edit_jabatan($id)
    {
        $where=array('kd_jabatan'=> $id);
         $data=array(
            'data'=>$this->ModelAdmin->list_data_where('tb_jabatan',$where,'','')->result(),
         );
         $comp=array(
            "isi"=>$this->load->view('./admin/jabatan/edit_jabatan',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function edit_submit(){

        date_default_timezone_set("Asia/Jakarta");


        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

        $jenrek=
        $id=

        $data=array(
                'nm_jabatan'=>$this->input->post('nama_jabatan'),
                'honor'=>$this->input->post('honor')
            );
        $where=array(
                'kd_jabatan'=>$this->input->post('id')
            );
        $res=$this->ModelAdmin->update_data('tb_jabatan',$data,$where);
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>Jabatan berhasil disimpan.</div>');
               redirect('./jabatan');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>Jabatan gagal disimpan.</div>');
                redirect('./jabatan');
                }
            }
        }
    public function cetak_jabatan()
    {
       $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_data_where('tb_jabatan',$where,'kd_jabatan','DESC')->result(),
            );
        $this->load->view("./admin/jabatan/cetak_jabatan",$data);
       
    }

   
}
