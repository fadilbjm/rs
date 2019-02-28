


<div class="jumbotron"> 
    <?php echo form_open('ranap/addigdanak');?>
    <?php
if(!isset($data)){

?>
    <div class="form-group">
      <label for="rm">NO. RM</label>
      <input type="text"
          class="form-control form-control-sm" name="rm" id="rm" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="nama_pasien">Nama Pasien</label>
      <input type="text"
          class="form-control form-control-sm" name="nama_pasien" id="nama_pasien" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="umur">Umur</label>
      <input type="number"
          class="form-control form-control-sm" name="umur" id="umur" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="jk" id="jk" value="l" >
        Laki-laki
      </label>
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="jk" id="jk" value="p" >
        Perempuan
      </label>
    </div>
    <div class="form-group">
      <label for="pendidikan">Pendidikan/Pekerjaan</label>
      <input type="text"
          class="form-control form-control-sm" name="pendidikan" id="pendidikan" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="agama">Agama</label>
      <select class="form-control" name="agama" id="agama">
        <option value="islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="hindu">Hindu</option>
        <option value="budha">Budha</option>
        <option value="konghucu">Konghucu</option>
      </select>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Input Data</button>

<?php }else{
    foreach ($data->result() as $k ) {
      $umurs = explode("-",$k->tgl_lahir);
      $umur = date("Y")-$umurs[0];
      $askes;
      if($k->no_bpjs == ""){
        $askes = "tidak";
      }else{
        $askes = "iya";
    }
  ?>
  <div class="form-group">
      <label for="rm">NO. RM</label>
      <input type="text"
          class="form-control form-control-sm" name="rm" id="rm" value="<?php echo $k->no_rm;?>" aria-describedby="helpId" placeholder="" >
    </div>
    <div class="form-group">
      <label for="nama_pasien">Nama Pasien</label>
      <input type="text"
          class="form-control form-control-sm" name="nama_pasien" id="nama_pasien" value="<?php echo $k->nama;?>" aria-describedby="helpId" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="umur">Umur</label>
      <input type="number"
          class="form-control form-control-sm" name="umur" id="umur" value="<?php echo $umur;?>" aria-describedby="helpId" placeholder="" required>
    </div>
    <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="jk" id="jk" value="l" required>
        Laki-laki
      </label>
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="jk" id="jk" value="p" required>
        Perempuan
      </label>
    </div>
    <div class="form-group">
      <label for="pendidikan">Pendidikan/Pekerjaan</label>
      <input type="text"
          class="form-control form-control-sm" name="pendidikan" id="pendidikan" aria-describedby="helpId" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="agama">Agama</label>
      <select class="form-control" name="agama" id="agama">
        <option value="islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="hindu">Hindu</option>
        <option value="budha">Budha</option>
        <option value="konghucu">Konghucu</option>
      </select>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
    </div>

      <input type="hidden" name="askes" value="<?php echo $askes; ?>">
    <button type="submit" class="btn btn-primary">Input Data</button>



<?php
    }
} ?>






    <?php echo form_close();?>
</div>