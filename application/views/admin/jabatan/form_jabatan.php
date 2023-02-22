<section class="content-header">
          <h1>
            Form jabatan
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">jabatan</li>
          </ol>
        </section>

        <section class="content">
           <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form jabatan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <?php echo form_open("jabatan/jabatan_submit"); ?>
     
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="nama_jabatan" class="form-control" maxlength="100" placeholder="jabatan" >
            </div>
          </div>
        </div>
       <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" id="email" name="honor" class="form-control" maxlength="100" placeholder="Honor" >
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <input type="submit" data-loading-text="Loading..." class="btn btn-primary btn-lg" value="Simpan">
          </div>
        </div>
        </form>
        <br>
  </div>
</div>
</div>
</div>


</section>