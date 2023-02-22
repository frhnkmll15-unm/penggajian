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
       Jl. H.Mencong No. 16<br>
        <b>Laporan Data Pinjaman</b>

     
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
                    <td><b>KD Pinjaman</b></td>
                    <td><b>NIK</b></td>
                    <td><b>Nama Guru</b></td>
                    <td><b>Pinjaman</b></td>
                    <td><b>Dikembalikan</b></td>
                    <td><b>Sisa</b></td>
                    <td><b>Status Peminjaman</b></td>
                    <td><b>Tanggal Peminjaman</b></td>
             
                  </tr>
                </thead>
                <tbody> 
                 <?php 

                 for ($i = 0; $i < count($data); ++$i) { ?>
                  <tr>
                    <td><?php echo ($i+1); ?></td>
                    <td><?php echo $data[$i]->kd_pinjam; ?></td>
                    <td><?php echo $data[$i]->nik; ?></td>
                    <td><?php echo $data[$i]->nm_karyawan; ?></td>
                    <td>Rp <?php echo number_format($data[$i]->pinjaman,0,".","."); ?></td>
                    <td>Rp <?php echo number_format($data[$i]->dikembalikan,0,".","."); ?></td>
                    <td>Rp <?php echo number_format($data[$i]->sisa,0,".","."); ?></td>
                    <td><?php echo $data[$i]->stt_pinjaman; ?></td>
                    <td><?php echo date('d F Y',strtotime($data[$i]->tgl_peminjaman)); ?></td>
                  
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