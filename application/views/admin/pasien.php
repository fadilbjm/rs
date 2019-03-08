<hr>
<table id="mytable">
    <thead>
        <tr>
            <th>No. RM</th>
            <th>Nama</th>
            <th>No. BPJS</th>
            <th>Gender</th>
            <th>No. HP</th>
            <th><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modelId">+Tambah Pasien</button></th>
        </tr>
    </thead>
    <tbody id="hasil">
        
    </tbody>
</table>

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
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Tambahkan</button>            
          </div>
            <?php echo form_close();?>
        </div>
      </div>
    </div>
    </div>

<script src="/rs/aset/js/jquery.js"></script>
    <script src="/rs/aset/js/datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/rs/aset/js/bootstrap.js"></script>
    <script src="/rs/aset/js/custom.js"></script>
	<script type="text/javascript">
        


		$(document).ready(function (){
			$('#mytable').DataTable({
                dataLength:5,
                ajax:'<?php echo base_url('admin/get');?>'
            });
            // ambil();

            });
        
	</script>
</body>
</html>