<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status')!="admin" && $this->session->userdata('status')!="karyawan"&& $this->session->userdata('status')!="owner"){
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
            "data"=>$this->ModelAdmin->list_karyawan_join($where)->result()
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/karyawan/list_karyawan',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
 
    
    public function hapus_karyawan($id){

        $where=array('nik'=> $id);
        $res=$this->ModelAdmin->hapus_data($where,'tb_karyawan');

         if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>karyawan berhasil dihapus.</div>');
                redirect($this->agent->referrer());
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>karyawan  gagal dihapus cobalah beberapa saat lagi.</div>');
                redirect($this->agent->referrer());
                }

    }
   public function tambah_karyawan()
    {

         $data=array(
            "jabatan"=>$this->ModelAdmin->list_data('tb_jabatan','kd_jabatan','Desc')->result());
         $comp=array(
            "isi"=>$this->load->view('./admin/karyawan/form_karyawan',$data,true)
            );

        $this->load->view("./layout/layout_admin",$comp);
       
    }


    public function karyawan_submit(){

        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('nik', 'Nik karyawan', 'required');
        $this->form_validation->set_rules('nm_karyawan', 'Nama karyawan', 'required');
        $this->form_validation->set_rules('kd_jabatan', 'Kode Jabatan', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

            if(!empty($_FILES['foto']['name'])){
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './file/foto/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '2048'; //maksimum besar file 2Mb
            $config['max_width']  = '1288'; //lebar maksimum 1288 px
            $config['max_height']  = '768'; //tinggi maksimum 768 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload',$config);
                 $this->upload->initialize($config);
            
            
                if ($this->upload->do_upload('foto'))
                {
                    $uploadData=$this->upload->data();
                    $gbr=$uploadData['file_name'];
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Gagal! </strong> Terjadi Kesalahan Saat upload Foto.</div>');

                  redirect($this->agent->referrer());
                }
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Foto Tidak boleh kosong.</div>');

              redirect($this->agent->referrer());
            }
        $data=array(
                'nik'=>$this->input->post('nik'),
                'nm_karyawan'=>$this->input->post('nm_karyawan'),
                'kd_jabatan'=>$this->input->post('kd_jabatan'),
                'stt_perkawinan'=>$this->input->post('stt_perkawinan'),
                'stt_karyawan'=>$this->input->post('stt_karyawan'),
                'jekel'=>$this->input->post('jekel'),
                'telp'=>$this->input->post('telp'),
                'alamat'=>$this->input->post('alamat'),
                'foto'=>$gbr,
                'email'=>$this->input->post('email'),
                'th_masuk'=>$this->input->post('th_masuk'),
                'rekening'=>$this->input->post('rekening'),
                'nm_bank'=>$this->input->post('nm_bank')
            );
        $res=$this->ModelAdmin->simpan_data($data,'tb_karyawan');
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>karyawan berhasil disimpan.</div>');
               redirect('./karyawan');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>karyawan gagal disimpan.</div>');
                redirect('./karyawan');
                }
            }
        }

    public function edit_karyawan($id)
    {

        $where=array('nik'=> $id);
         $data=array(
            'data'=>$this->ModelAdmin->list_data_where('tb_karyawan',$where,'','')->result(),
            "jabatan"=>$this->ModelAdmin->list_data('tb_jabatan','kd_jabatan','Desc')->result()
         );
         $comp=array(
            "isi"=>$this->load->view('./admin/karyawan/edit_karyawan',$data,true)
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
    public function edit_submit(){

        date_default_timezone_set("Asia/Jakarta");

        $this->form_validation->set_rules('nm_karyawan', 'Nama karyawan', 'required');
        $this->form_validation->set_rules('kd_jabatan', 'Kode Jabatan', 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong> Ada inputan yang tidak cocok.</div>');

             redirect($this->agent->referrer());

        }else{

            if(!empty($_FILES['foto']['name'])){

            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './file/foto/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '2048'; //maksimum besar file 2Mb
            $config['max_width']  = '1288'; //lebar maksimum 1288 px
            $config['max_height']  = '768'; //tinggi maksimum 768 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

                 $this->load->library('upload',$config);
                 $this->upload->initialize($config);
            
            
                if ($this->upload->do_upload('foto'))
                {
                    $uploadData=$this->upload->data();
                    $gbr=$uploadData['file_name'];
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Gagal! </strong> Terjadi Kesalahan Saat upload Foto.</div>');

                  redirect($this->agent->referrer());
                }
            }else{
                $gbr=$this->input->post('foto_lama');
            }

         $data=array(
                'nm_karyawan'=>$this->input->post('nm_karyawan'),
                'kd_jabatan'=>$this->input->post('kd_jabatan'),
                'stt_perkawinan'=>$this->input->post('stt_perkawinan'),
                'stt_karyawan'=>$this->input->post('stt_karyawan'),
                'jekel'=>$this->input->post('jekel'),
                'telp'=>$this->input->post('telp'),
                'alamat'=>$this->input->post('alamat'),
                'foto'=>$gbr,
                'email'=>$this->input->post('email'),
                'th_masuk'=>$this->input->post('th_masuk'),
                'rekening'=>$this->input->post('rekening'),
                'nm_bank'=>$this->input->post('nm_bank')
            );

        $where=array(
                'nik'=>$this->input->post('id')
            );
        $res=$this->ModelAdmin->update_data('tb_karyawan',$data,$where);
        if($res >= 1){
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses! </strong>karyawan berhasil disimpan.</div>');
               redirect('./karyawan');
        
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal! </strong>karyawan gagal disimpan.</div>');
                redirect('./karyawan');
                }
            }
        }
    public function cari_karyawan()
    {
        $t1=$this->input->post('date1');
        $t2=$this->input->post('date2');
  
         $where=array('jenis_perizinan ='=>'Perorangan','date(tgl_daftar) >='=>$t1,'date(tgl_daftar) <='=>$t2); 

         $data=array(
            "data"=>$this->ModelAdmin->list_data_where('tb_pemohon',$where,'tgl_daftar','DESC')->result(),
            't1'=>$t1,
            't2'=>$t2
            );
         $comp=array(
            "isi"=>$this->load->view('./admin/pemohon/list_pemohon_perorangan',$data,true)
            
            );
        $this->load->view("./layout/layout_admin",$comp);
       
    }
     public function cetak_karyawan_range()
    {
        $t1=$this->uri->segment(3);
        $t2=$this->uri->segment(4);

           $where=array('jenis_perizinan ='=>'Perorangan','date(tgl_daftar) >='=>$t1,'date(tgl_daftar) <='=>$t2); 
       
         $data=array(
            "data"=>$this->ModelAdmin->list_data_where('tb_pemohon',$where,'tgl_daftar','DESC')->result(),
            't1'=>$t1,
            't2'=>$t2
            );
        $this->load->view("./admin/pemohon/cetak_pemohon_perorangan",$data);
       
    }
     
    public function cetak_karyawan_semua()
    {
        $where=array();
         $data=array(
            "data"=>$this->ModelAdmin->list_karyawan_join($where)->result()
            );
          $this->load->view("./admin/karyawan/cetak_karyawan",$data);

        
    }
   
}
