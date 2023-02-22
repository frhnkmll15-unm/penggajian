
        <section class="content-header">
          <h1>
            Data jabatan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">jabatan</li>
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
                  <h3 class="box-title">Data jabatan <a href="<?php echo base_url('jabatan/tambah_jabatan'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a></h3> 
                <?php };?> 
                  <a href="<?php echo base_url('jabatan/cetak_jabatan'); ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Cetak Semua</a> 
                </div><!-- /.box-header -->
                <div class="box-body">
                   <?php echo $this->session->flashdata('pesan'); ?>
                   <div class="table-responsive">    
                <table class="table table-bordered" id="example1">
                <thead>
                  <tr>
                    <td><b>No</b></td>
                    <td><b>KD</b></td>
                    <td><b>Nama Jabatan</b></td>
                    <td><b>Honor</b></td>
                    <td><b>Act</b></td>
                  </tr>
                </thead>
                <tbody> 
                 <?php 

                 for ($i = 0; $i < count($data); ++$i) { ?>
                  <tr>
                    <td><?php echo ($i+1); ?></td>
                    <td><?php echo $data[$i]->kd_jabatan; ?></td>
                    <td><?php echo $data[$i]->nm_jabatan; ?></td>
                    <td>Rp <?php echo number_format($data[$i]->honor,0,".","."); ?></td>
                    <td><a class="btn btn-success btn-xs"  href="<?php echo base_url('jabatan/edit_jabatan/'.$data[$i]->kd_jabatan.''); ?>"><i class="fa fa-pencil"></i></a>

                      <a class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"  href="<?php echo base_url('jabatan/hapus_jabatan/'.$data[$i]->kd_jabatan.''); ?>"><i class="fa fa-trash"></i></a></td>
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
