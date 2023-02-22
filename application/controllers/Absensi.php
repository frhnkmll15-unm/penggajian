<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
class Absensi extends CI_Controller {


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
        $this->load->model('ModelAbsen');
        $this->load->library('encryption');
        $this->load->library('user_agent');
    }

    public function index()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_absensi_join($where)->result()
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/absensi/list_absensi',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }

    public function viewAbsen(){
        $data= array();
        $comp=array(
            "isi"=>$this->load->view('./karyawan/absen',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
    }

	public function approval_absensi(){
        $where=array('status' => 0 );

        $data= array(
			"data"=>$this->ModelAbsen->list_absensi($where, null)->result()
		);
        $comp=array(
            "isi"=>$this->load->view('./admin/absensi/list_absensi_approval',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
    }

	public function owner_absensi_per_day(){
        $like=array('tanggal' => date('Y-m-d'));

        $data= array(
			"data"=>$this->ModelAbsen->list_absensi(null,$like)->result()
		);
        $comp=array(
            "isi"=>$this->load->view('./admin/absensi/list_absensi_owner_perday',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
    }

	public function action_absensi($id){
		$where=array('id'=> $id);
		$data=array('status' => 1);
        $res=$this->ModelAbsen->update_data('tb_absensi_karyawan', $data, $where);

         if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>.</div>');
                redirect($this->agent->referrer());
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>.</div>');
                redirect($this->agent->referrer());
                }
	}

    public function submit_absen(){


        date_default_timezone_set("Asia/Jakarta");
        $this->form_validation->set_rules('absen', 'Absen', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{
        $where=array('status' => 0 ,'tanggal'=>date('Y-m-d'));

        $getAbsen = $this->ModelAbsen->list_absensi($where, null)->result();
        
        $data=array(
                'status_absen'=>$this->input->post('absen'),
                'nik'=>$this->session->userdata('id_admin'),
                'tanggal'=>date('Y-m-d'),
                'jam'=>date('H:i:s'),
            );

        if($getAbsen){
            $res = 0;
        }else{
            $res=$this->ModelAbsen->simpan_data($data,'tb_absensi_karyawan');

        }
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>absensi berhasil disimpan.</div>');
               redirect('./absensi/viewAbsen');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>absensi gagal disimpan Anda sudah absen.</div>');
                redirect('./absensi/viewAbsen');
            }
        }
	}
   
    public function hapus_absensi($id){

        $where=array('kd_absen'=> $id);
        $res=$this->ModelAdmin->hapus_data($where,'tb_absensi');

         if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>absensi berhasil dihapus.</div>');
                redirect($this->agent->referrer());
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>absensi  gagal dihapus cobalah beberapa saat lagi.</div>');
                redirect($this->agent->referrer());
                }

    }
   public function tambah_absensi()
    {

         $data=array(
            "karyawan"=>$this->ModelAdmin->list_data('tb_karyawan','nik','Desc')->result());
         $comp=array(
            "isi"=>$this->load->view('./admin/absensi/form_absensi',$data,true)
            );

        $this->load->view("./layout/layout_admin",$comp);
       
    }


    public function absensi_submit(){

        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
         $this->form_validation->set_rules('izin', 'Izin', 'required');
        
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
                'izin'=>$this->input->post('izin'),
                'hadir'=>$this->input->post('hadir'),
                'tdk_hadir'=>$this->input->post('tdk_hadir')
            );
        $res=$this->ModelAdmin->simpan_data($data,'tb_absensi');
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>absensi berhasil disimpan.</div>');
               redirect('./absensi');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>absensi gagal disimpan.</div>');
                redirect('./absensi');
                }
            }
        }

    public function edit_absensi($id)
    {

        $where=array('kd_absen'=> $id);
         $data=array(
            'data'=>$this->ModelAdmin->list_data_where('tb_absensi',$where,'','')->result(),
            "karyawan"=>$this->ModelAdmin->list_data('tb_karyawan','nik','Desc')->result()
         );
         $comp=array(
            "isi"=>$this->load->view('./admin/absensi/edit_absensi',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function edit_submit(){

        date_default_timezone_set("Asia/Jakarta");

       $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
         $this->form_validation->set_rules('izin', 'Izin', 'required');
        
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
                'izin'=>$this->input->post('izin'),
                'hadir'=>$this->input->post('hadir'),
                'tdk_hadir'=>$this->input->post('tdk_hadir')
            );

        $where=array(
                'kd_absen'=>$this->input->post('id')
            );
        $res=$this->ModelAdmin->update_data('tb_absensi',$data,$where);
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>absensi berhasil disimpan.</div>');
               redirect('./absensi');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>absensi gagal disimpan.</div>');
                redirect('./absensi');
                }
            }
        }
    public function cari_absensi()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('tb_absensi.bulan ='=>$t1,'tb_absensi.tahun ='=>$t2); 
         $data=array(
            "data"=>$this->ModelAdmin->list_absensi_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/absensi/list_absensi',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }

	public function cari_absen_owner()
    {
        $month=$this->input->post('date1');
        $year=$this->input->post('date2');
  
         $data=array(
            "data"=>$this->ModelAbsen->list_absensi_month($month, $year, null)->result(),
            't1'=>$month,
            't2'=>$year
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/absensi/list_absensi_owner_permonth',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }

    public function cari_absen_karyawan()
    {
        $month=$this->input->post('date1');
        $year=$this->input->post('date2');
  
         $data=array(
            "data"=>$this->ModelAbsen->list_absensi_month($month, $year, $this->session->userdata('id_admin'))->result(),
            't1'=>$month,
            't2'=>$year
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/absensi/list_absensi_karyawan_permonth',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }

     public function cetak_absensi_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

            $where=array('tb_absensi.bulan ='=>$t1,'tb_absensi.tahun ='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_absensi_join($where)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/absensi/cetak_absensi",$data);
       
    }
     
    public function cetak_absensi_semua()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_absensi_join($where)->result()
            );
          $this->load->view("./admin/absensi/cetak_absensi",$data);

        
    }

	public function cetak_absensi_range_owner()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

         $data=array(
            "data"=>$this->ModelAbsen->list_absensi_month($t1, $t2, null)->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/absensi/cetak_absen_karyawan",$data);
       
    }
     
    public function cetak_absensi_semua_owner()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAbsen->list_absensi_month_all($where)->result()
            );
          $this->load->view("./admin/absensi/cetak_absen_karyawan",$data);

        
    }
  
    public function cetak_absensi_range_karyawan()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

         $data=array(
            "data"=>$this->ModelAbsen->list_absensi_month($t1, $t2, $this->session->userdata('id_admin'))->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/absensi/cetak_absen_karyawan",$data);
       
    }
    
   
   
}
