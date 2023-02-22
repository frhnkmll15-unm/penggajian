<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/icn.png"/>
    <title>SISTEM INFORMASI PENGGAJIAN KARYAWAN</title>
     <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/bootstrap/css/bootstrap.min.css">
  </head>

  <body onload="window.print();">
   <center>
       <h3>BIMBA AIUEO MENCONG<br></h3>
          <br>
        <b>Laporan Data Karyawan</b>

   
      <?php if(!empty($t1) and !empty($t2)){ ?>
       <p><b>Periode : </b> <?php echo date('d M Y',strtotime($t1)); ?> - <?php echo date('d M Y',strtotime($t2)); ?></p>
        <?php }else{ ?>
        <p><b>Periode : </b> <?php echo date('F'); ?> - <?php echo date('Y'); ?></p>
      <?php } ?> </center>
   
    <br>
   
       <table class="table table-bordered" id="example1">
                <thead>
                  <tr>
                    <td><b>No</b></td>
                    <td><b>NIK</b></td>
                    <td><b>Nama karyawan</b></td>
                    <td><b>Jabatan</b></td>
                    <td><b>Status Perkawinan</b></td>
                    <td><b>Status Karyawan</b></td>
                    <td><b>Jekel</b></td>
                    <td><b>Telp</b></td>
                    <td><b>Alamat</b></td>
                    <td><b>Email</b></td>
                    <td><b>Th Masuk</b></td>
                    <td><b>Rekening</b></td>
                    <td><b>Nama Bank</b></td>
                  </tr>
                </thead>
                <tbody> 
                 <?php 

                 for ($i = 0; $i < count($data); ++$i) { ?>
                  <tr>
                    <td><?php echo ($i+1); ?></td>
                   
                    <td><?php echo $data[$i]->nik; ?></td>
                    <td><?php echo $data[$i]->nm_karyawan; ?></td>
                    <td><?php echo $data[$i]->nm_jabatan; ?></td>
                    <td><?php echo $data[$i]->stt_perkawinan; ?></td>
                    <td><?php echo $data[$i]->stt_karyawan; ?></td>
                    <td><?php echo $data[$i]->jekel; ?></td>
                    <td><?php echo $data[$i]->telp; ?></td>
                    <td><?php echo $data[$i]->alamat; ?></td>
                    <td><?php echo $data[$i]->email; ?></td>
                    <td><?php echo $data[$i]->th_masuk; ?></td>
                    <td><?php echo $data[$i]->rekening; ?></td>
                    <td><?php echo $data[$i]->nm_bank; ?></td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
      <div style="float: right;">
    <p> Tangerang , <?php echo date('d F Y'); ?></p>
    <br>
    <br>
    <br>
    <p>Kepala Bimba</p>
  </div>
    
  </body>
</html>