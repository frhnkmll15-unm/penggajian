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
       <h3>Bimba AIUEO<br></h3>
       Jl. H.MENCONG No. 16<br>
        <b>Laporan Gaji PerBank</b>

     
      <?php $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
                     if(!empty($t1) and !empty($t2)){ ?>
       <p><b>Periode : </b> <?php echo $nama_bln[$t1-0]; ?> - <?php echo $t2; ?></p>
        <?php }else{ ?>
        <p><b>Periode : </b> <?php echo date('F'); ?> - <?php echo date('Y'); ?></p>
      <?php } ?> </center>
    <br>
   
         <table class="table table-bordered" id="example1">
                 <thead>
                  <tr>
                    <td><b>No</b></td>
                    <td><b>Nama Karyawan</b></td>
                    <td><b>Gaji</b></td>
                     <td><b>Nama Bank</b></td>
                  </tr>
                </thead>
                <tbody> 
                 <?php 
                  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
                 for ($i = 0; $i < count($data); ++$i) { 
                      $tot=$data[$i]->jml_gaji+$data[$i]->piket+$data[$i]->non_sertikasi+$data[$i]->bpjs-$data[$i]->potongan;
                  ?>
                  <tr>
                    <td><?php echo ($i+1); ?></td>
                     <td><?php echo $data[$i]->nm_karyawan; ?></td>
                      <td>Rp <?php echo number_format($tot,0,".","."); ?></td>
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