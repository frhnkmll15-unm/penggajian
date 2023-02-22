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
    <div class="col-md-4"></div>
    <div class="col-md-4" style="margin-top:15px;border: 1px solid #555;">
      <br>
     <?php for ($i = 0; $i < count($data); ++$i) {
      $tot=$data[$i]->jml_gaji+$data[$i]->piket+$data[$i]->non_sertikasi+$data[$i]->bpjs-$data[$i]->potongan;
      ?>
<table width="400" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5"><strong><center>SLIP GAJI</center></strong></td>
  </tr>
  <tr>
    <td colspan="5" height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" width="169">NAMA GURU</td>
    <td width="34" class="hhh">:</td>
    <td colspan="3"><?php echo $data[$i]->nm_karyawan; ?></td>

  </tr>
  <tr>
    <td height="30">HONOR  PER JAM   </td>
    <td class="hhh">:</td>
    <td colspan="3">Rp <?php echo number_format($data[$i]->per_jam,0,".","."); ?></td>

  </tr>
  <tr>
    <td height="30">JAM  BEKERJA          </td>
    <td class="hhh">:</td>
    <td colspan="3"><?php echo $data[$i]->jml_jam_ngajar; ?> jam</td>

  </tr>
  <tr>
    <td height="30">PIKET                       </td>
    <td class="hhh">:</td>
    <td colspan="3">Rp <?php echo number_format($data[$i]->piket,0,".","."); ?></td>
  </tr>
  <tr>
    <td height="30">TRANSPORT            </td>
    <td class="hhh">:</td>
    <td colspan="3">Rp <?php echo number_format($data[$i]->non_sertikasi,0,".","."); ?></td>
  </tr>
  <tr>
    <td height="30">BPJS                         </td>
    <td class="hhh">:</td>
    <td colspan="3">Rp <?php echo number_format($data[$i]->bpjs,0,".","."); ?></td>
  </tr>
  <tr>
    <td>JUMLAH                     </td>
    <td class="hhh">:</td>
    <td colspan="3">Rp <?php echo number_format($data[$i]->jml_gaji,0,".","."); ?></td>
  </tr>
  <tr>
    <td height="30">POTONGAN              </td>
    <td class="hhh">:</td>
    <td colspan="3">Rp <?php echo number_format($data[$i]->potongan,0,".","."); ?></td>
  </tr>
  <tr>
    <td height="30">TOTAL GAJI</td>
    <td class="hhh">:</td>
    <td height="30" colspan="3"><b>Rp <?php echo number_format($tot,0,".","."); ?></b></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td height="75" colspan="3" rowspan="3">&nbsp;</td>
    <td colspan="2"><center>HORMAT KAMI</center></td>
  </tr>
  <tr>
    <td height="75" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="31" colspan="2"><center>(KEPALA BIMBA)</center></td>
  </tr>
</table>
<?php } ?>
  </div>
    </div>
    <div class="col-md-4"></div>
  </body>
</html>