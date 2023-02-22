<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {


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
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/list_gaji',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
   
    public function hapus_gaji($id){

        $where=array('kd_gaji'=> $id);
        $res=$this->ModelAdmin->hapus_data($where,'tb_gaji');

         if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>gaji berhasil dihapus.</div>');
                redirect($this->agent->referrer());
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>gaji  gagal dihapus cobalah beberapa saat lagi.</div>');
                redirect($this->agent->referrer());
                }

    }
   public function tambah_gaji()
    {

         $data=array(
            "karyawan"=>$this->ModelAdmin->list_karyawan_join(null)->result()
        );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/form_gaji',$data,true)
            );

        $this->load->view("./layout/layout_admin",$comp);
       
    }


    public function gaji_submit(){

        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
         $this->form_validation->set_rules('nik', 'nik', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

           
        $data=array(
                'nik'=>$this->input->post('nik'),
                'bulan'=>$this->input->post('bulan'),
                'tahun'=>$this->input->post('tahun'),
                // 'per_jam'=>$this->input->post('per_jam'),
                // 'jml_jam_ngajar'=>$this->input->post('jml_jam_ngajar'),
                // 'jml_gaji'=>$this->input->post('jml_gaji'),
                'piket'=>$this->input->post('piket'),
                'non_sertikasi'=>$this->input->post('non_sertikasi'),
                'bpjs'=>$this->input->post('bpjs'),
                'potongan'=>$this->input->post('potongan')
            );
        $res=$this->ModelAdmin->simpan_data($data,'tb_gaji');
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>gaji berhasil disimpan.</div>');
               redirect('./gaji');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>gaji gagal disimpan.</div>');
                redirect('./gaji');
                }
            }
        }

    public function edit_gaji($id)
    {

        $where=array('kd_gaji'=> $id);
         $data=array(
            'data'=>$this->ModelAdmin->list_gaji_join($where)->result(),
            "karyawan"=>$this->ModelAdmin->list_data('tb_karyawan','nik','Desc')->result()
         );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/edit_gaji',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function edit_submit(){

        date_default_timezone_set("Asia/Jakarta");

      $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
         $this->form_validation->set_rules('nik', 'nik', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

             $data=array(
                'bulan'=>$this->input->post('bulan'),
                'tahun'=>$this->input->post('tahun'),
                'per_jam'=>$this->input->post('per_jam'),
                'jml_jam_ngajar'=>$this->input->post('jml_jam_ngajar'),
                'jml_gaji'=>$this->input->post('jml_gaji'),
                'piket'=>$this->input->post('piket'),
                'non_sertikasi'=>$this->input->post('non_sertikasi'),
                'bpjs'=>$this->input->post('bpjs'),
                'potongan'=>$this->input->post('potongan')
            );

        $where=array(
                'kd_gaji'=>$this->input->post('id')
            );
        $res=$this->ModelAdmin->update_data('tb_gaji',$data,$where);
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>gaji berhasil disimpan.</div>');
               redirect('./gaji');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>gaji gagal disimpan.</div>');
                redirect('./gaji');
                }
            }
        }
    public function cari_gaji()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/list_gaji',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
     public function cetak_gaji_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

            $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/gaji/cetak_gaji",$data);
       
    }
     
    public function cetak_gaji_semua()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
          $this->load->view("./admin/gaji/cetak_gaji",$data);

        
    }
     public function cetak_slip($id)
    {
        $where=array('kd_gaji'=> $id);
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
          $this->load->view("./admin/gaji/cetak_slip",$data);

        
    }
    public function gaji_perperiode()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/gaji_perperiode',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function cari_gaji_perperiode()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/gaji_perperiode',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
     public function cetak_gaji_periode_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

            $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/gaji/cetak_gaji_perperiode",$data);
       
    }
     
    public function cetak_gaji_periode_semua()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
          $this->load->view("./admin/gaji/cetak_gaji_perperiode",$data);

        
    }
   public function gaji_perbank()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/gaji_perbank',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function cari_gaji_perbank()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/gaji_perbank',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
     public function cetak_gaji_bank_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

            $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/gaji/cetak_gaji_perbank",$data);
       
    }
     
    public function cetak_gaji_bank_semua()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
          $this->load->view("./admin/gaji/cetak_gaji_perbank",$data);

        
    }
    public function gaji_perjabatan()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/gaji_perjabatan',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function cari_gaji_perjabatan()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/gaji/gaji_perjabatan',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
     public function cetak_gaji_jabatan_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

            $where=array('tb_gaji.bulan ='=>$t1,'tb_gaji.tahun ='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/gaji/cetak_gaji_perjabatan",$data);
       
    }
     
    public function cetak_gaji_jabatan_semua()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_gaji_join($where)->result()
            );
          $this->load->view("./admin/gaji/cetak_gaji_perjabatan",$data);

        
    }
  
   
   
}
