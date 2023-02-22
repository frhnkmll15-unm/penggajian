<section class="content-header">
          <h1>
            Form pinjaman
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">pinjaman</li>
          </ol>
        </section>

        <section class="content">
           <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form pinjaman</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <?php echo form_open_multipart("pinjaman/kembalikan_submit"); ?>
          <?php
          foreach ($data as $d) {
            ?>
        <input type="hidden" name="id" value="<?php echo $d->kd_pinjam; ?>" >
         
           
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" onchange="lihat(this.value)"  name="niks" disabled="">
                <option value="">-Karyawan-</option>
                <?php 
                $jsArray1 = "var prdName1 = new Array();\n";
                foreach($karyawan as $k){ ?>
                <option value="<?php echo $k->nik; ?>" <?php echo $d->nik==$k->nik ? 'Selected' : ''; ?>><?php echo $k->nm_karyawan; ?></option>
                <?php 
                    $jsArray1 .= "prdName1['" . $k->nik . "'] = {nm:'".addslashes($k->nm_karyawan)."',telp:'".addslashes($k->telp)."'};\n"; 
              } ?>
               <input type="hidden" name="nik" value="<?php echo $k->nik; ?>">
              </select>
            </div>
          </div>
        </div>
       <br>
        <!-- <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="nm_karyawan" class="form-control" maxlength="100" placeholder="Nama Karyawan" readonly value="<?php echo $k->nm_karyawan; ?>" id="nm">
            </div>
          </div>
        </div>
       <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="telp" class="form-control" maxlength="100" placeholder="Nomor Handphone" readonly value="<?php echo $k->telp; ?>" id="telp">
            </div>
          </div>
        </div>
       <br>
       
        <div class="row">
          <div class="form-group"> -->
           
            <div class="col-lg-6 ">
              <input type="text" name="pinjaman" class="form-control" maxlength="100" placeholder="Pinjaman" id="pinj" value="<?php echo $d->pinjaman; ?>" readonly>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="dikembalikan" id="kemb" class="form-control" maxlength="100" placeholder="Dikembalikan" onkeyup="hsisa()" onfocus="hsisa()" onchange="hsisa()" onclick="hsisa()">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="sisa" class="form-control" maxlength="100" placeholder="Sisa Pinjaman" id="sis">
            </div>
          </div>
        </div>
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

<script type="text/javascript">

  function hsisa() {

    var pinj=document.getElementById('pinj').value;

    var kemb= document.getElementById('kemb').value;

    var sis= pinj-kemb;
           
     document.getElementById('sis').value = sis;

   
  }

</script>
<script type="text/javascript">
<?php echo $jsArray1; ?>;
   function lihat(id) {
     document.getElementById('nm').value = prdName1[id].nm;
      document.getElementById('telp').value = prdName1[id].telp;
  }
  
</script>

</section>