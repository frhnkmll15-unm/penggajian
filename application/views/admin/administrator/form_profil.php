<section class="content-header">
          <h1>
            Profil
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Profil</li>
          </ol>
        </section>

        <section class="content">
           <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Profil</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <?php echo form_open("admin/profil_submit"); ?>
     <input type="hidden" name="id" value="<?php echo $this->session->userdata('id_admin'); ?>">
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
               <label>Nama :</label><br>
              <input type="text" id="nama" name="nama" class="form-control" maxlength="100" placeholder="nama" value="<?php echo $this->session->userdata('nama'); ?>">
              
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
               <label>Username :</label><br>
              <input type="text" id="username" name="username" class="form-control" maxlength="100" placeholder="Username" value="<?php echo $this->session->userdata('username'); ?>">
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
               <label>Password:</label><br>
              <input type="password" id="password" name="password" class="form-control" maxlength="100" placeholder="Password" value="<?php echo $this->session->userdata('password'); ?>">
              
            </div>
          </div>
        </div>
       <br>
      
        <div class="row">
          <div class="col-md-12">
            <input type="submit" data-loading-text="Loading..." class="btn btn-primary" value="Simpan Perubahan">
            <a href="<?php echo base_url('admin'); ?>" class="btn btn-danger">Batal</a>
          </div>
        </div>
        </form>
  
        <br>
  </div>
</div>
</div>
</div>


</section>