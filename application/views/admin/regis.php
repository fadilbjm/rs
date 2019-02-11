<div class="row">
    
    <div class="col-md-6">
        <div class="jumbotron">
        <h2>Pasien Terdaftar</h2>
            <?php echo form_open("admin/procReg?q=sudah");?>
                <div class="form-group">
                    <label for="rm">No. Rekam Medis</label>
                    <input type="text" class="form-control" name="rm" id="rm" aria-describedby="helpId" placeholder="">
                    <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control" name="keluhan" id="keluhan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="poli">Poli</label>
                    <select class="form-control" name="poli" id="poli">
                        <option>Poli Anak</option>
                        <option>Poli Kandungan</option>
                    </select>
                    <div class="form-group">
                      <label for="dokter">Dokter</label>
                      <select class="form-control" name="dokter" id="dokter">
                        <!-- data doketer -->
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        <?php echo form_close();?>
        </div>    
    </div>
    <div class="col-md-6">
        <div class="jumbotron">
                <h2>Pendaftaran Pasien</h2>
            <?php
            $norm;
                if ($data->num_rows()>0) {
                    foreach ($data->result() as $d ) {
                        $rmBef = $d->no_rm;
                        $exp = explode(".", $rmBef);
                        $exp1=$exp[0];$exp2=$exp[1];$exp3=$exp[2];
                        if ($exp3 > 0) {
                            // echo "hubungi IT, telah membatasi Limit";
                            
                            $exp3s = $exp3+1;
                            $imp3 = implode(".",array($exp1,$exp2,$exp3s));
                            $norm = $imp3;
                        }else{
                            
                        }
                    }?>


            <?php echo form_open('admin/procReg?q=belum');?>
                    <input type="hidden" name="rm" value="<?php echo $norm;?>">
                <div class="form-group">
                  <label for="rm">No. Rekam Medis</label>
                  <input type="text" class="form-control" name="rms" id="rms" aria-describedby="" placeholder="" value="<?php 
                echo $norm;
                }
            ?>" disabled>
                <hr>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="number"
                class="form-control" name="nik" id="nik" aria-describedby="helpId" placeholder="">
            </div><hr>
            <div class="form-group">
              <label for="nik">Nama</label>
              <input type="text"
                class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
            </div><hr>
            
            <div class="form-group">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input type="date"
                class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="helpId" placeholder="">
              
            </div><hr>
            <div class="form-group">
              <label for="nik">Nama wali/suami</label>
              <input type="text"
                class="form-control" name="wali" id="wali" aria-describedby="helpId" placeholder="">
            </div><hr>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
            </div><hr>
            <div class="form-group">
              <label for="bpjs">No. BPJS</label>
              <input type="text"
                class="form-control" name="bpjs" id="bpjs" aria-describedby="helpId" placeholder="">
            </div><hr>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jk" id="jk" value="L"> Laki-laki
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jk" id="jk" value="P"> Perempuan
                </label>
            </div><hr>
            <div class="form-group">
              <label for="hp">No. HP</label>
              <input type="text"
                class="form-control" name="hp" id="hp" aria-describedby="helpId" placeholder="">
            </div><hr>
            <button type="submit" class="btn btn-success">Tambahkan</button>
                </div>
            <?php echo form_close();?>
        </div>
        
    </div>
</div>
    





                <!-- end content copy dari sini -->
                </div>
        </div>
    </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/rs/aset/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/rs/aset/js/bootstrap.js"></script>
    <script src="/rs/aset/js/custom.js"></script>
    <script>
        function handle(isi){
            
            document.getElementById('nama').innerHTML = isi.value;
        }
    </script>
  </body>
</html>