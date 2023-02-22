<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/icn.png"/>
    <title>SISTEM INFORMASI PENGGAJIAN KARYAWAN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/font awesome/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>plugins/datatables/datatables.min.css"/>

      <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/dist/css/skins/_all-skins.min.css">
   
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="<?php echo base_url()."assets/"; ?>images/logo.png" alt="" style="width: 340px;height: 80px;margin-left: -15px;">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo $this->session->flashdata('result_login'); ?>
        <?php echo $this->session->flashdata('pesanAdmin'); ?>
        <?php echo form_open("AuthAdmin/login"); ?>
       
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-lg-6 ">
                <select class="form-control" name="role">
                  <option value="">Select Role</option>
                  <option value="admin">Admin</option>
                  <option value="karyawan">Karyawan</option>
                  <option value="owner">Owner</option>
                </select>
              </div>
            </div>
          </div>
        <br>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
         
        </div><!-- /.social-auth-links -->

     

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
     <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/jquery/jquery-2.1.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
 
    <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>plugins/datatables/datatables.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/admin style/js/app.min.js"></script>

  </body>
</html>
