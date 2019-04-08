<!-- <div class="row"> -->

<?php echo form_open('ranap/addRanap');?>
<!-- kalo ada data dari pasien -->
<?php
if(isset($data)){
    foreach($data->result() as $d){
?>

    
        <div class="jumbotron">
            <input type="hidden" name="bpjs" value="<?php echo $d->no_bpjs;?>">
            <div class="form-group">
            <label for="rm">No. RM</label>
            <input type="text"
                class="form-control form-control-sm" name="rm" id="rm" value="<?php echo $d->no_rm;?>" autocomplete="off" placeholder="">
                
            </div>
            <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text"
                class="form-control form-control-sm" name="nama" id="nama" autocomplete="off" value="<?php echo $d->nama;?>" placeholder="" required>
            </div>
            <div class="form-group">
            <label for="umur">Tgl Lahir</label>
            <input type="date"
                class="form-control" name="umur" id="umur" autocomplete="off" value="<?php echo $d->tgl_lahir;?>" placeholder="" required>
                
            </div>
            <div class="form-group">
              <label for="hp">Nomor Handphone</label>
              <input type="tel"
                class="form-control" name="hp" id="hp" autocomplete="off" maxlength="14" value="<?php echo $d->telpon;?>" placeholder="" required>
            </div>
            
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info active">
                    <input type="radio" name="jk" id="jk" autocomplete="off" value="L" required>Laki-laki
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="jk" id="jk" autocomplete="off" value="P" required>Perempuan
                </label>
            </div>
            <div class="form-group">
              <label for="penanggung">Nama Penanggung Jawab</label>
              <input type="text"
                  class="form-control form-control-sm" name="penanggung" id="penanggung" value="<?php echo $d->nama_wali;?>" autocomplete="off" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="dokter">Dokter Penanggung Jawab</label>
              <select class="form-control" name="dokter" id="dokter">
                <option value="koder">koder</option>

              </select>
            </div>
            <div class="form-group">
              <label for="kamar">Kamar</label>
              <select class="form-control" name="kamar" id="kamar">
                <option selected>--- Pilih Kamar ---</option>
                <?php
foreach ($kamar->result() as $o ) {
        echo "<option value='$o->nama_kamar'>$o->nama_kamar</option>";
}
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Input Data</button>
        </div>
    
<?php
    }
}else {
    ?>
<!-- kalu tidak ada data -->
<div class="jumbotron">
            <div class="form-group">
            <label for="rm">No. RM</label>
            <input type="text"
                class="form-control form-control-sm" name="rm" id="rm" autocomplete="off" placeholder="">
                
            </div>
            <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text"
                class="form-control form-control-sm" name="nama" id="nama" autocomplete="off" placeholder="" required>
            </div>
            <div class="form-group">
            <label for="umur">Tgl Lahir</label>
            <input type="date"
                class="form-control" name="umur" id="umur" autocomplete="off" placeholder="" required>
                
            </div>
            <div class="form-group">
              <label for="hp">Nomor Handphone</label>
              <input type="tel"
                class="form-control" name="hp" id="hp" maxlength="14" autocomplete="off" placeholder=""required>
            </div>
            
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info active">
                    <input type="radio" name="jk" id="jk" autocomplete="off" value="L" required>Laki-laki
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="jk" id="jk" autocomplete="off" value="P" required>Perempuan
                </label>
            </div>
            <div class="form-group">
              <label for="penanggung">Nama Penanggung Jawab</label>
              <input type="text"
                  class="form-control form-control-sm" name="penanggung" id="penanggung" autocomplete="off" required placeholder="">
            </div>
            <div class="form-group">
              <label for="dokter">Dokter Penanggung Jawab</label>
              <select class="form-control" name="dokter" id="dokter">
                <!-- dokter -->
                <option value="koder">koder</option>
              </select>
            </div>
            <div class="form-group">
              <label for="kamar">Kamar</label>
              <select class="form-control" name="kamar" id="kamar">
                <option selected>--- Pilih Kamar ---</option>
                <?php
foreach ($kamar->result() as $o ) {
        echo "<option value='$o->nama_kamar'>$o->nama_kamar</option>";
}
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Input Data</button>
        </div>
    
    <?php
}
        echo form_close();?>
<!-- </div> -->