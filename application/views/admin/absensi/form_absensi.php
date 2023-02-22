<section class="content-header">
          <h1>
            Form absensi
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">absensi</li>
          </ol>
        </section>

        <section class="content">
           <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form absensi</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <?php echo form_open_multipart("absensi/absensi_submit"); ?>
     
        
        
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="bulan" class="form-control" maxlength="100" placeholder="Bulan" id="datepicker4">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="tahun" class="form-control" maxlength="100" placeholder="Tahun" id="datepicker3">
            </div>
          </div>
        </div>
        <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" onchange="lihat(this.value)"  name="nik">
                <option value="">-Karyawan-</option>
                <?php 
                $jsArray1 = "var prdName1 = new Array();\n";
                foreach($karyawan as $k){ ?>
                <option value="<?php echo $k->nik; ?>"><?php echo $k->nm_karyawan; ?></option>
                <?php 
                    $jsArray1 .= "prdName1['" . $k->nik . "'] = {nm:'".addslashes($k->nm_karyawan)."',telp:'".addslashes($k->telp)."'};\n"; 
              } ?>
              </select>
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="nm_karyawan" class="form-control" maxlength="100" placeholder="Nama Karyawan" id="nm">
            </div>
          </div>
        </div>
       <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="hadir" class="form-control" maxlength="100" placeholder="Hadir" >
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="izin" class="form-control" maxlength="100" placeholder="Izin">
            </div>
          </div>
        </div>
        <br>
         <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="tdk_hadir" class="form-control" maxlength="100" placeholder="Tidak Hadir">
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

<script type="text/javascript">

<?php echo $jsArray1; ?>;
   function lihat(id) {
     document.getElementById('nm').value = prdName1[id].nm;
      document.getElementById('telp').value = prdName1[id].telp;
  }
</script>
</section>