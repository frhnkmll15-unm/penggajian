<section class="content-header">
        </section>

        <section class="content">
           <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Absensi</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <?php echo form_open_multipart("absensi/submit_absen"); ?>
     
        <div class="row">
          <div class="form-group">
           
        <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <button type="submit" name="absen" class="btn btn-primary btn-block" value="masuk" disable>Absen Masuk</button>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <button type="submit" name="absen" class="btn btn-danger btn-block" value="keluar">Absen Pulang</button>
        </div>
        </div>
        </form>
        <br>
  </div>
</div>
</div>
</div>


</section>