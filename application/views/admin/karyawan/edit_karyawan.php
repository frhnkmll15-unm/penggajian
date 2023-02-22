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
          <?php echo form_open_multipart("karyawan/edit_submit"); ?>
          <?php
          foreach ($data as $d) {
            ?>
        <input type="hidden" name="id" value="<?php echo $d->nik; ?>" >
         
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="nm_karyawan" class="form-control" maxlength="100" placeholder="Nama Karyawan" value="<?php echo $d->nm_karyawan; ?>">
            </div>
          </div>
        </div>
       <br>
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <label>Foto</label><br>
              <img src="<?php echo base_url()."file/foto/".$d->foto; ?>" class="img-thumbnail" style="width:200px;">
              <input type="file" name="foto" class="form-control" maxlength="100" placeholder="Nama Karyawan">
              <input type="hidden" name="foto_lama" class="form-control" value="<?php echo $d->foto; ?>">
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" name="jekel">
                <option value="">Jenis Kelamin</option>
                <option value="Laki-laki" <?php echo $d->jekel=='Laki-laki' ? 'Selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo $d->jekel=='Perempuan' ? 'Selected' : ''; ?>>Perempuan</option>
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
                <option value="<?php echo $jb->kd_jabatan; ?>" <?php echo $d->kd_jabatan==$jb->kd_jabatan ? 'Selected' : ''; ?>><?php echo $jb->nm_jabatan; ?></option>
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
                <option value="Menikah" <?php echo $d->stt_perkawinan=='Menikah' ? 'Selected' : ''; ?>>Menikah</option>
                <option value="Single" <?php echo $d->stt_perkawinan=='Single' ? 'Selected' : ''; ?>>Single</option>
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
                <option value="Kontrak" <?php echo $d->stt_karyawan=='Kontrak' ? 'Selected' : ''; ?>>Kontrak</option>
                <option value="Honorer" <?php echo $d->stt_karyawan=='Honorer' ? 'Selected' : ''; ?>>Honorer</option>
                <option value="Tetap" <?php echo $d->stt_karyawan=='Tetap' ? 'Selected' : ''; ?>>Tetap</option>
              </select>
            </div>
          </div>
        </div>
       <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="telp" class="form-control" maxlength="100" placeholder="Telepon" value="<?php echo $d->telp; ?>">
            </div>
          </div>
        </div>
        <br>
         <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $d->alamat; ?></textarea> 
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="email" class="form-control" maxlength="100" placeholder="EMail" value="<?php echo $d->email; ?>">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="th_masuk" class="form-control" maxlength="100" placeholder="Tahun Masuk" id="datepicker3" value="<?php echo $d->th_masuk; ?>">
            </div>
          </div>
        </div>
        <br>
        
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="rekening" class="form-control" maxlength="100" placeholder="rekening" value="<?php echo $d->rekening; ?>">
            </div>
          </div>
        </div>
        <br>
         <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" name="nm_bank">
                <option value="">Nama Bank</option>
                <option value="BANK BRI" <?php echo $d->nm_bank=='BANK BRI' ? 'Selected' : ''; ?>>BANK BRI</option>
                <option value="BANK BNI" <?php echo $d->nm_bank=='BANK BNI' ? 'Selected' : ''; ?>>BANK BNI</option>
                <option value="BANK NAGARI" <?php echo $d->nm_bank=='BANK NAGARI' ? 'Selected' : ''; ?>>BANK NAGARI</option>
                <option value="BANK MANDIRI" <?php echo $d->nm_bank=='BANK MANDIRI' ? 'Selected' : ''; ?>>BANK MANDIRI</option>
                <option value="BANK BCA" <?php echo $d->nm_bank=='BBANK BCA' ? 'Selected' : ''; ?> >BANK BCA</option>
              </select>
            </div>
          </div>
        </div>
       <br>
        <br>
        <div class="row">
          <div class="col-md-12">
            <input type="submit" data-loading-text="Loading..." class="btn btn-primary btn-lg" value="Simpan">
          </div>
        </div>
      <?php } ?>
        </form>
        <br>
  </div>
</div>
</div>
</div>


</section>