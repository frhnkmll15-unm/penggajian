<section class="content-header">
          <h1>
            Form karyawan
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">karyawan</li>
          </ol>
        </section>

        <section class="content">
           <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form karyawan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <?php echo form_open_multipart("karyawan/karyawan_submit"); ?>
     
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="nik" class="form-control" maxlength="100" placeholder="nik" >
            </div>
          </div>
        </div>
       <br>
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="nm_karyawan" class="form-control" maxlength="100" placeholder="Nama Karyawan" >
            </div>
          </div>
        </div>
       <br>
         <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <label>Foto</label>
              <input type="file" name="foto" class="form-control" maxlength="100" placeholder="Nama Karyawan" >
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" name="jekel">
                <option value="">Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" name="kd_jabatan">
                <option value="">-Jabatan-</option>
                <?php foreach($jabatan as $jb){ ?>
                <option value="<?php echo $jb->kd_jabatan; ?>"><?php echo $jb->nm_jabatan; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
       <br>
         <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" name="stt_perkawinan">
                <option value="">Status Perkawinan</option>
                <option value="Menikah">Menikah</option>
                <option value="Belum Menikah">Belum Menikah</option>
              </select>
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" name="stt_karyawan">
                <option value="">Status Karyawan</option>
                <option value="Kontrak">Kontrak</option>
                <option value="Honorer">Honorer</option>
                <option value="Tetap">Tetap</option>
              </select>
            </div>
          </div>
        </div>
       <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="telp" class="form-control" maxlength="100" placeholder="Telepon" >
            </div>
          </div>
        </div>
        <br>
         <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea> 
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="email" class="form-control" maxlength="100" placeholder="EMail" >
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="th_masuk" class="form-control" maxlength="100" placeholder="Tahun Masuk" id="datepicker3">
            </div>
          </div>
        </div>
        <br>
         <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="rekening" class="form-control" maxlength="100" placeholder="rekening">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" name="nm_bank">
                <option value="">Nama Bank</option>
                <option value="BANK BRI">BANK BRI</option>
                <option value="BANK BNI">BANK BNI</option>
                <option value="BANK NAGARI">BANK NAGARI</option>
                <option value="BANK MANDIRI">BANK MANDIRI</option>
                <option value="BANK BCA">BANK BCA</option>
              </select>
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