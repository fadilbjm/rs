<!-- <div class="row"> -->

<?php echo form_open('admin/addRanap');?>
<!-- kalo ada data dari pasien -->
<?php
if(isset($data)){
    foreach($data->result() as $d){
?>

    <!-- <div class="col-lg-6"> -->
        <div class="jumbotron">
            <div class="form-group">
            <label for="rm">No. RM</label>
            <input type="text"
                class="form-control form-control-sm" name="rm" id="rm" value="<?php echo $d->no_rm;?>" autocomplete="off" placeholder="">
                <a href="<?php base_url('admin/pasien');?>"><button>Pilih Pasien Dari Daftar</button></a>
            </div>
            <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text"
                class="form-control form-control-sm" name="nama" id="nama" autocomplete="off" placeholder="" required>
            </div>
            <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number"
                class="form-control" name="umur" id="umur" autocomplete="off" placeholder="">
                <select name="umur1" id="umur1">
                    <option value="tahun">Tahun</option>
                    <option value="bulan">Bulan</option>
                    <option value="hari">Hari</option>
                </select>
            </div>
            <div class="form-group">
              <label for="hp">Nomor Handphone</label>
              <input type="tel"
                class="form-control" name="hp" id="hp" autocomplete="off" placeholder="">
            </div>
            <div class="form-group">
            <label for="pendidikan">Pendidikan/Pekerjaan</label>
            <input type="text"
                class="form-control" name="pendidikan" id="pendidikan" autocomplete="off" placeholder="">
            </div>
            <div class="form-group">
            <label for="alamat">ALamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
            </div>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info active">
                    <input type="radio" name="jk" id="jk" autocomplete="off" checked>Laki-laki
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="jk" id="jk" autocomplete="off">Perempuan
                </label>
            </div>
            <div class="form-group">
              <label for="penanggung">Nama Penanggung Jawab</label>
              <input type="text"
                  class="form-control form-control-sm" name="penanggung" id="penanggung" autocomplete="off" placeholder="">
            </div>
            <hr>
            <label for="jkjkkjk">* Jika bersalin</label>
            <div class="form-group">
              <label for="tglbersalin">Tanggal</label>
              <input type="date"
                  class="form-control form-control-sm" name="tglbersalin" id="tglbersalin" autocomplete="off" placeholder="">
            </div>
            <div class="form-group">
              <label for="jambersalin">Pukul</label>
              <input type="time"
                class="form-control" name="jambersalin" id="jambersalin" autocomplete="off" placeholder="">
              <small id="helpId" class="form-text text-muted">JAM : MENIT AM/PM (AM dari jam 1 malam sampai jam 12 siang, PM dari jam 1 siang sampai jam 12 malam)</small>
            </div>
            <div class="form-group">
              <label for="anakke">Anak ke</label>
              <input type="number"
                class="form-control" name="anakke" id="anakke" autocomplete="off" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Input Data</button>
        </div>
    <!-- </div>
    <div class="col-md-6">
        

        akhir kalo ada data dari psien
    </div> -->
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
                <a href="<?php base_url('admin/pasien');?>"><button>Pilih Pasien Dari Daftar</button></a>
            </div>
            <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text"
                class="form-control form-control-sm" name="nama" id="nama" autocomplete="off" placeholder="" required>
            </div>
            <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number"
                class="form-control" name="umur" id="umur" autocomplete="off" placeholder="">
                <select name="umur1" id="umur1">
                    <option value="tahun">Tahun</option>
                    <option value="bulan">Bulan</option>
                    <option value="hari">Hari</option>
                </select>
            </div>
            <div class="form-group">
              <label for="hp">Nomor Handphone</label>
              <input type="tel"
                class="form-control" name="hp" id="hp" autocomplete="off" placeholder="">
            </div>
            <div class="form-group">
            <label for="pendidikan">Pendidikan/Pekerjaan</label>
            <input type="text"
                class="form-control" name="pendidikan" id="pendidikan" autocomplete="off" placeholder="">
            </div>
            <div class="form-group">
            <label for="alamat">ALamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
            </div>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-info active">
                    <input type="radio" name="jk" id="jk" autocomplete="off" checked>Laki-laki
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="jk" id="jk" autocomplete="off">Perempuan
                </label>
            </div>
            <div class="form-group">
              <label for="penanggung">Nama Penanggung Jawab</label>
              <input type="text"
                  class="form-control form-control-sm" name="penanggung" id="penanggung" autocomplete="off" placeholder="">
            </div>
            <div class="form-group">
              <label for="dokter">Dokter Penanggung Jawab</label>
              <select class="form-control" name="dokter" id="dokter">
                <!-- dokter -->

              </select>
            </div>
            <hr>
            <label for="jkjkkjk">* Jika bersalin</label>
            <div class="form-group">
              <label for="tglbersalin">Tanggal</label>
              <input type="date"
                  class="form-control form-control-sm" name="tglbersalin" id="tglbersalin" autocomplete="off" placeholder="">
            </div>
            <div class="form-group">
              <label for="jambersalin">Pukul</label>
              <input type="time"
                class="form-control" name="jambersalin" id="jambersalin" autocomplete="off" placeholder="">
              <small id="helpId" class="form-text text-muted">JAM : MENIT AM/PM (AM dari jam 1 malam sampai jam 12 siang, PM dari jam 1 siang sampai jam 12 malam)</small>
            </div>
            <div class="form-group">
              <label for="anakke">Anak ke</label>
              <input type="number"
                class="form-control" name="anakke" id="anakke" autocomplete="off" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Input Data</button>
        </div>
    <!-- </div>
    <div class="col-md-6">
        

        akhir kalo ada data dari psien
    </div> -->
    <?php
}
        echo form_close();?>
<!-- </div> -->