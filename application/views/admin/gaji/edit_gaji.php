<section class="content-header">
          <h1>
            Form gaji
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">gaji</li>
          </ol>
        </section>

        <section class="content">
           <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form gaji</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <?php echo form_open_multipart("gaji/edit_submit"); ?>
          <?php
          foreach ($data as $d) {
            $tot=$d->honor+$d->piket+$d->non_sertikasi+$d->bpjs-$d->potongan;

            ?>
        <input type="hidden" name="id" value="<?php echo $d->kd_gaji; ?>" >
         
           
              <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="bulan" class="form-control" value="<?php echo $d->bulan; ?>" maxlength="100" placeholder="Bulan" id="datepicker4">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="tahun" value="<?php echo $d->tahun; ?>" class="form-control" maxlength="100" placeholder="Tahun" id="datepicker3">
            </div>
          </div>
        </div>
        <br>
       <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <select class="form-control" onchange="lihat(this.value)"  name="nik" readonly>
                <option value="">-Karyawan-</option>
                <?php 
                $jsArray1 = "var prdName1 = new Array();\n";
                foreach($karyawan as $k){ ?>
                <option value="<?php echo $k->nik; ?>" <?php echo $d->nik==$k->nik ? 'Selected' : ''; ?>><?php echo $k->nm_karyawan; ?></option>
                <?php 
                    $jsArray1 .= "prdName1['" . $k->nik . "'] = {nm:'".addslashes($k->nm_karyawan)."',telp:'".addslashes($k->telp)."'};\n"; 
              } ?>
              </select>
            </div>
          </div>
        </div>
       <br>
        <!-- <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="per_jam" value="<?php echo $d->per_jam; ?>" class="form-control" maxlength="100" placeholder="Gaji Per jam" id="hpj">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6 ">
              <input type="text" name="jml_jam_ngajar" value="<?php echo $d->jml_jam_ngajar; ?>" class="form-control" maxlength="100" placeholder="Jumlah Jam Bekerja" onkeyup="htpj()" onfocus="htpj()" onchange="htpj()" onclick="htpj()" id="jj">
            </div>
          </div>
        </div> -->
        <br>
          <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="jml_gaji" value="<?php echo $d->honor; ?>" class="form-control" maxlength="100" placeholder="Jumlah" id="jmlj" readonly>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="piket" value="<?php echo $d->piket; ?>" class="form-control" maxlength="100" placeholder="Piket" id="piket">
            </div>
          </div>
        </div>
        <br>
         <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="non_sertikasi" class="form-control" maxlength="100" placeholder="Transport" id="non" value="<?php echo $d->non_sertikasi; ?>">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="bpjs" class="form-control" maxlength="100" placeholder="Uang Makan" onkeyup="htotal()" onfocus="htotal()" onchange="htotal()" onclick="htotal()" id="bpjs" value="<?php echo $d->bpjs; ?>">
            </div>
          </div>
        </div>
        <br>
         <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
                <input type="text" name="potongan" class="form-control" maxlength="100" placeholder="Potongan" id="pot" value="<?php echo $d->potongan; ?>">
              </div>
            </div>
             
        </div>
        <br>
       
         <div class="row">
          <div class="form-group">
           
            <div class="col-lg-6 ">
              <input type="text" name="total" class="form-control" maxlength="100" placeholder="Total" id="tot" value="<?php echo $tot; ?>" readonly>
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

  function htpj() {

    var hpj=document.getElementById('hpj').value;

    var jj= document.getElementById('jj').value;

    var jmlj= jj*hpj;
           
     document.getElementById('jmlj').value = jmlj;

   
  }
  function htotal() {

    var jmlj=document.getElementById('jmlj').value;

    var piket= document.getElementById('piket').value;

    var non= document.getElementById('non').value;

    var bpjs= document.getElementById('bpjs').value;
    var pot= document.getElementById('pot').value;

    var tot= parseInt(jmlj)+parseInt(piket)+parseInt(non)+parseInt(bpjs)-parseInt(pot);
           
     document.getElementById('tot').value = tot;

   
  }

</script>
<script type="text/javascript">

<?php echo $jsArray1; ?>;
   function lihat(id) {
     document.getElementById('nm').value = prdName1[id].nm;
      document.getElementById('telp').value = prdName1[id].telp;
  }
</script>