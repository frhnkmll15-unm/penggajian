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
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/font awesome/ionicons.min.css">
     <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datepicker/css/bootstrap-datetimepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/dist/css/skins/_all-skins.min.css">
     <script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>plugins/datepicker/js/jQuery.js"></script>
     <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>plugins/datepicker/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
   
    <script type="text/javascript">
      $(function () {
        
        $('#datepicker').datetimepicker({
                                  
          format: 'DD-MM-YYYY',
           sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
          
        });

        $('#datepicker1').datetimepicker({

        format: 'YYYY-MM-DD',
        defaultDate: "",
        });
        
        $('#datepicker2').datetimepicker({

        format:'YYYY-MM-DD',
        defaultDate: "",


        });
        $('#datepicker3').datetimepicker({

        format:'YYYY',
        defaultDate: "",


        });
        $('#datepicker4').datetimepicker({

        format:'MM',
        defaultDate: "",


        });



            
        
      
      });
      </script>
   
   
  </head>
 
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">
          <div class="logo">
            <img src="<?php echo base_url()."assets/"; ?>images/logo.png" alt="" style="width: 250px;height: 50px;padding: 5px 0px 0px 0px;">
        </div>
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <!-- <span class="logo-mini"><b>Adm</b></span> -->
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b> <?php echo $this->session->userdata('status'); ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url()."assets/"; ?>images/user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url()."assets/"; ?>images/user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('nama'); ?>
                      <small> <?php echo $this->session->userdata('status'); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                 
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <a href="<?php echo site_url('admin/profil'); ?>" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo site_url('AuthAdmin/logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Keluar</i></a>
                    </div>
                  </li>
                </ul>
              </li>

              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()."assets/"; ?>images/user.png" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nama'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
     
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <?php if($this->session->userdata('status') == 'admin'){?>
            <li class="treeview">
              <a href="<?php echo base_url("admin/")?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Karyawan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("karyawan");?>"><i class="fa fa-circle-o"></i> List Karyawan</a></li>
                <li><a href="<?php echo base_url("karyawan/tambah_karyawan");?>"><i class="fa fa-circle-o"></i> Tambah Karyawan</a></li>
                
              </ul>
              
            </li>
           <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Gaji</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("gaji");?>"><i class="fa fa-circle-o"></i> List Gaji</a></li>
                <li><a href="<?php echo base_url("gaji/tambah_gaji");?>"><i class="fa fa-circle-o"></i> Tambah Gaji</a></li>
                 <!-- <li><a href="<?php echo base_url("gaji/gaji_perjabatan");?>"><i class="fa fa-circle-o"></i>Gaji Perjabatan</a></li>
                 <li><a href="<?php echo base_url("gaji/gaji_perbank");?>"><i class="fa fa-circle-o"></i>Gaji Perbank</a></li>
                 <li><a href="<?php echo base_url("gaji/gaji_perperiode");?>"><i class="fa fa-circle-o"></i>Gaji Perperiode</a></li>
                 -->
              </ul>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-reply-all"></i>
                <span>Pinjaman</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("pinjaman");?>"><i class="fa fa-circle-o"></i> List Pinjaman</a></li>
                <li><a href="<?php echo base_url("pinjaman/tambah_pinjaman");?>"><i class="fa fa-circle-o"></i> Tambah Pinjaman</a></li>
                
              </ul>
              
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-tags"></i>
                <span>Jabatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("jabatan");?>"><i class="fa fa-circle-o"></i> List Jabatan</a></li>
                <li><a href="<?php echo base_url("jabatan/tambah_jabatan");?>"><i class="fa fa-circle-o"></i> Tambah Jabatan</a></li>
                
              </ul>
              
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-check-square-o"></i>
                <span>Absensi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("absensi");?>"><i class="fa fa-circle-o"></i> List Absensi</a></li>
                <li><a href="<?php echo base_url("absensi/tambah_absensi");?>"><i class="fa fa-circle-o"></i> Tambah Absensi</a></li>
                <li><a href="<?php echo base_url("absensi/approval_absensi");?>"><i class="fa fa-circle-o"></i> Approval Absensi</a></li>
              </ul>
              
            </li>
            <?php }; ?>
            <?php if($this->session->userdata('status') == 'karyawan'){?>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-check-square-o"></i>
                <span>Absensi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("absensi/viewAbsen");?>"><i class="fa fa-circle-o"></i> Absen</a></li>
                <li><a href="<?php echo base_url("absensi/cari_absen_karyawan");?>"><i class="fa fa-circle-o"></i> Rekap Absensi</a></li>
              </ul>
              
            </li>
            <?php };?>

            <?php if($this->session->userdata('status') == 'owner'){?>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-check-square-o"></i>
                <span>Absensi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("absensi/owner_absensi_per_day");?>"><i class="fa fa-circle-o"></i> List Absensi Hari Ini</a></li>
                <li><a href="<?php echo base_url("absensi/cari_absen_owner");?>"><i class="fa fa-circle-o"></i> Rekap Absensi</a></li>
              </ul>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Karyawan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("karyawan");?>"><i class="fa fa-circle-o"></i> List Karyawan</a></li>
                <!-- <li><a href="<//?php echo base_url("karyawan/tambah_karyawan");?>"><i class="fa fa-circle-o"></i> Tambah Karyawan</a></li> -->
                
              </ul>
              
            </li>
           <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Gaji</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("gaji");?>"><i class="fa fa-circle-o"></i> List Gaji</a></li>
                <!-- <li><a href="<//?php echo base_url("gaji/tambah_gaji");?>"><i class="fa fa-circle-o"></i> Tambah Gaji</a></li> -->
                 <!-- <li><a href="<?php echo base_url("gaji/gaji_perjabatan");?>"><i class="fa fa-circle-o"></i>Gaji Perjabatan</a></li>
                 <li><a href="<?php echo base_url("gaji/gaji_perbank");?>"><i class="fa fa-circle-o"></i>Gaji Perbank</a></li>
                 <li><a href="<?php echo base_url("gaji/gaji_perperiode");?>"><i class="fa fa-circle-o"></i>Gaji Perperiode</a></li>
                 -->
              </ul>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-reply-all"></i>
                <span>Pinjaman</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("pinjaman");?>"><i class="fa fa-circle-o"></i> List Pinjaman</a></li>
                <!-- <li><a href="<?//php echo base_url("pinjaman/tambah_pinjaman");?>"><i class="fa fa-circle-o"></i> Tambah Pinjaman</a></li> -->
                
              </ul>
              
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-tags"></i>
                <span>Jabatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="<?php echo base_url("jabatan");?>"><i class="fa fa-circle-o"></i> List Jabatan</a></li>
                <!-- <li><a href="<//?php echo base_url("jabatan/tambah_jabatan");?>"><i class="fa fa-circle-o"></i> Tambah Jabatan</a></li> -->
                
              </ul>
              
            </li>
            <?php };?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

       <div class="content-wrapper" style="min-height: 491px;">
       
          <?php if($isi){ echo $isi; } ?>
      </div><!-- /.content-wrapper -->

    
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        <strong> &copy; <?php echo date('Y'); ?> All Copyright</strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
 
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
     <!-- DataTables -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Slimscroll -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/dist/js/app.min.js"></script>
   
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/dist/js/demo.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>