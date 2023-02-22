
        <section class="content-header">
          <h1>
            Data absensi
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">absensi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <?php echo form_open("absensi/cari_absen_karyawan"); ?>
                     <div class="box-header">
                  <div class="col-md-4">
                    <div class="input-group">
                    <input name="date1" class="form-control" type="text" value="<?php if(!empty($t1))echo $t1; else echo""; ?>" id="datepicker4">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                  </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                    <input name="date2" class="form-control" type="text" value="<?php if(!empty($t2))echo $t2; else echo""; ?>" id="datepicker3">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                  </div>
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    <?php 
                    
                    if(!empty($data) and !empty($t1) and !empty($t2)) { ?>
                    <a href="<?php echo base_url('absensi/cetak_absensi_range_karyawan/'.$t1.'/'.$t2.''); ?>" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                    <?php } ?>
                    <!-- <a href="<//?php echo base_url('absensi/cetak_absensi_semua_owner'); ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Cetak Semua</a> -->
                  </div> 
                </div><!-- /.box-header -->
                <div class="box-body">
                   <?php echo $this->session->flashdata('pesan'); ?>
                   <div class="table-responsive">    
                <table class="table table-bordered" id="example1">
                <thead>
                  <tr>
                  <td><b>No</b></td>
                    <td><b>NIK</b></td>
                    <td><b>Nama Karyawan</b></td>
                    <td><b>Tanggal</b></td>
                    <td><b>Jam</b></td>
                    <td><b>Status</b></td>
                    <td><b>Accept Admin</b></td>
                  </tr>
                </thead>
                <tbody> 
                 <?php 
                  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
                 for ($i = 0; $i < count($data); ++$i) { ?>
                  <tr>
                  <td><?php echo ($i+1); ?></td>
                    <td><?php echo $data[$i]->nik; ?></td>
                    <td><?php echo $data[$i]->nm_karyawan; ?></td>
                    <td><?php echo $data[$i]->tanggal; ?></td>
                    <td><?php echo $data[$i]->jam; ?></td>
                     <td><?php echo $data[$i]->status_absen; ?></td>
                     <td><?php echo $data[$i]->status == 1 ? 'Ya' : 'Tidak'; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
