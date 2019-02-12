<br>
<div class="text-right">
  <?php echo form_open('admin/cariPasien','class="form-inline"');?>
   <div class="form-group">
     
     <input type="text"
       class="form-control mr-sm-1" name="cari" id="cari" aria-describedby="helpId" placeholder="Nama">
       <input type="text"
       class="form-control mr-sm-1" name="cari" id="cari" aria-describedby="helpId" placeholder="No. RM">
       <input type="text"
       class="form-control mr-sm-1" name="cari" id="cari" aria-describedby="helpId" placeholder="BPJS">
     <input type="submit" class="btn btn-primary" value="Cari">
   </div>
  <?php echo form_close();?>
</div>
<hr>
<table class="table table-md table-responsive">
  <thead class="bg-dark text-white">
    <tr>
      <th scope="col">#</th>
      <th scope="col">No. RM</th>
      <th scope="col">No. BPJS</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No. HP</th>
      <th scope="col" colspan="4" class="text-center"><button type="button" class="btn btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      +Peserta Baru
    </button></th>
    </tr>
  </thead>
  <tbody>
      <?php
        $no = $this->uri->segment(3);
        foreach ($data->result() as $p ) {
            echo "<tr>
                    <th scope='row'>".$no++."</th>
                    <td>$p->no_rm</td>
                    <td>$p->no_bpjs</td>
                    <td>$p->nama</td>
                    <td>$p->jk</td>
                    <td>$p->telpon</td>
                    <td>".anchor(base_url('admin/registrasi/'.$p->no_rm), '<button class="btn btn-sm btn-info">Buat Keluhan</button>')."</td>
                    <td>".anchor(base_url('admin/detail/'.$p->id_pasien), '<button class="btn btn-sm btn-info">Detail</button>')."</td>
                    <td>".anchor(base_url('admin/editPasien/'.$p->id_pasien), '<button class="btn btn-sm btn-warning">Edit</button>')."</td>
                    <td>".anchor(base_url('admin/delPasien/'.$p->id_pasien), '<button class="btn btn-sm btn-danger">Hapus</button>')."</td>
            </tr>";
        }
      ?>
</tbody>

                <!-- end content copy dari sini -->
                </div>
        </div>
    </div>  
    
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <?php
            $norm;
                if ($rm->num_rows()>0) {
                    foreach ($rm->result() as $d ) {
                        $rmBef = $d->no_rm;
                        $exp = explode(".", $rmBef);
                        $exp1=$exp[0];$exp2=$exp[1];$exp3=$exp[2];
                        if ($exp3 >= 99) {
                            
                            if($exp2 >=99){
                                if($exp1 >= 99){
                                    echo "hubungi IT, telah membatasi Limit";
                                }else {
                                    $exp1s = $exp1+1;
                                    if(strlen($exp1s)<=1){
                                        $exp1s = "0".$exp1s;
                                    }
                                    $imp1 = implode(".",array($exp1s,"00","00"));
                                    $norm = $imp1;
                                }
                            }else {
                                $exp2s = $exp2+1;
                                    if(strlen($exp2s)<=1){
                                        $exp2s = "0".$exp2s;
                                    }
                                    $imp2 = implode(".",array($exp1,$exp2s,"00"));
                                    $norm = $imp2;
                            }
                            /* $exps = $exp2+1;
                            $imp2 = implode(".",array($exp1,$exp2s,"00"));
                            $norm = $imp2; */
                        }else{
                            $exp3s = $exp3+1;
                                    if(strlen($exp3s)<=1){
                                        $exp3s = "0".$exp3s;
                                    }
                                    $imp3 = implode(".",array($exp1,$exp2,$exp3s));
                                    $norm = $imp3;
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
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Tambahkan</button>            
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/rs/aset/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/rs/aset/js/bootstrap.js"></script>
    <script src="/rs/aset/js/custom.js"></script>
  </body>
</html>