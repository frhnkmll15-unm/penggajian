<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthAdmin extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ModelAuth');

        
    }
   public function index()
  {
        $this->load->view("./auth/auth_admin");
  }
    public function login(){

        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
        $this->form_validation->set_rules('role', 'role', 'required|trim|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('result_login', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!! </strong> Username dan password tidak boleh kosong .</div>');
             redirect (base_url('AuthAdmin'));
        }
        $username=$this->input->post('username',TRUE);
        $password=md5($this->input->post('password',TRUE));

        $where=array(
                'username'=>$username,
                'password'=>$password
                );

        if($this->input->post('role') == 'admin'){
            $cek=$this->ModelAuth->cek_log_admin("tb_admin",$where);
        }else if($this->input->post('role') == 'karyawan'){
            $cek=$this->ModelAuth->cek_log_admin("tb_karyawan",$where);
        }else{
            $cek=$this->ModelAuth->cek_log_admin("tb_owner",$where);
        }

        // die(var_dump($cek->result()));

         
             if(count($cek->result())){

                if ($this->input->post('role') == 'admin') {
                    foreach ($cek->result() as $ck) {
                       $id=$ck->id_admin;
                       $nama=$ck->nama;
                       $username=$ck->username;
                       $password=$ck->password;
   
                   }
                   $data_session=array(
                   'id_admin'=>$id,
                   'nama'=>$nama,
                   'username'=>$username,
                   'password'=>$password,
                   'status'=>$this->input->post('role')
                   );
                   $this->session->set_userdata($data_session);
                //    die('1');
                   redirect (base_url("admin"));
                }else if($this->input->post('role') == 'karyawan'){
                    foreach ($cek->result() as $ck) {
                        $id=$ck->nik;
                        $nama=$ck->nm_karyawan;
                        $username=$ck->username;
                        $password=$ck->password;
    
                    }
                    $data_session=array(
                    'id_admin'=>$id,
                    'nama'=>$nama,
                    'username'=>$username,
                    'password'=>$password,
                    'status'=>$this->input->post('role')
                    );
                    $this->session->set_userdata($data_session);
                    redirect (base_url("absensi/viewAbsen"));
                }else{
                    foreach ($cek->result() as $ck) {
                        $id=$ck->nik;
                        $nama=$ck->nama;
                        $username=$ck->username;
                        $password=$ck->password;
    
                    }
                    $data_session=array(
                    'id_admin'=>$id,
                    'nama'=>$nama,
                    'username'=>$username,
                    'password'=>$password,
                    'status'=>$this->input->post('role')
                    );
                    $this->session->set_userdata($data_session);
                    redirect (base_url("admin"));
                }


           
            }else {
                $this->session->set_flashdata('pesanAdmin','<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!! </strong> Username dan password salah.</div>');
                redirect (base_url('AuthAdmin'));

       }
    }

    public function logout(){

        $this->session->sess_destroy();
        redirect (base_url('/'));
    }
}
