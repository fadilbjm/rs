<div class="jumbotron"> 
    <?php echo form_open('ranap/');?>
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
    <div class="form-group">
      <label for="wali_ayah">Nama Ayah</label>
      <input type="text" class="form-control" name="wali_ayah" id="wali_ayah" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="wali_ibu">Nama Ibu</label>
      <input type="text" class="form-control" name="wali_ibu" id="wali_ibu" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="keluhan">Keluhan</label>
      <textarea class="form-control" name="keluhan" id="keluhan" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="rwyPenyakit">Riwayat Penyakit</label>
      <textarea class="form-control" name="rwyPenyakit" id="rwyPenyakit" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="rwyKesehatan">Riwayat Kesehatan</label>
      <textarea class="form-control" name="rwyKesehatan" id="rwyKesehatan" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="data">Data Bio, Psiko, Sosial</label>
      <textarea class="form-control" name="data" id="data" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="rwyImunisasi">Riwayat Imunisasi</label>
      <textarea class="form-control" name="rwyImunisasi" id="rwyImunisasi" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="pemUmum">Pemeriksaan Umum</label>
      <textarea class="form-control" name="pemUmum" id="pemUmum" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="pemKhusus">Pemeriksaan Khusus</label>
      <textarea class="form-control" name="pemKhusus" id="pemKhusus" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="analisa">Analisa</label>
      <textarea class="form-control" name="analisa" id="analisa" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="penLaksana">Penata Laksana</label>
      <textarea class="form-control" name="penLaksana" id="penLaksana" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Input Data</button>







    <?php echo form_close();?>
</div>