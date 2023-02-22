
        <section class="content-header">
          <h1>
            Data karyawan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">karyawan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                <?php if($this->session->userdata('status') == 'admin'){?>
                  <h3 class="box-title">Data karyawan <a href="<?php echo base_url('karyawan/tambah_karyawan'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a></h3>
                <?php };?> 
                  <a href="<?php echo base_url('karyawan/cetak_karyawan_semua'); ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Cetak Semua</a> 
                </div><!-- /.box-header -->
                <div class="box-body">
                   <?php echo $this->session->flashdata('pesan'); ?>
                   <div class="table-responsive">    
                <table class="table table-bordered" id="example1">
                <thead>
                  <tr>
                    <td><b>No</b></td>
                    <td><b>Foto</b></td>
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
                    <td><b>Act</b></td>
                  </tr>
                </thead>
                <tbody> 
                 <?php 

                 for ($i = 0; $i < count($data); ++$i) { ?>
                  <tr>
                    <td><?php echo ($i+1); ?></td>
                    <td><a href="<?php echo base_url()."file/foto/".$data[$i]->foto; ?>" target="_blank"></a><img src="<?php echo base_url()."file/foto/".$data[$i]->foto; ?>" class="img-thumbnail" style="min-width:100px;"></td>
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
                    <td><a class="btn btn-success btn-xs"  href="<?php echo base_url('karyawan/edit_karyawan/'.$data[$i]->nik.''); ?>"><i class="fa fa-pencil"></i></a>

                      <a class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"  href="<?php echo base_url('karyawan/hapus_karyawan/'.$data[$i]->nik.''); ?>"><i class="fa fa-trash"></i></a></td>
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
