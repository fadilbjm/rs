<div class="row">
    
    <div class="col-md-6">
        <div class="jumbotron">
        <h2>Pasien Terdaftar</h2>
            <?php echo form_open("admin/procReg?q=sudah");?>
                <div class="form-group">
                    <input type="hidden" name="nama" value="<?php echo $this->uri->segment(4);?>">
                    <label for="rm">No. Rekam Medis</label>
                    <input type="text" class="form-control" name="rm" id="rm" aria-describedby="helpId" placeholder="" value="<?php echo $this->uri->segment(3); ?>">
                    <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control" name="keluhan" id="keluhan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="poli">Poli</label>
                    <select class="form-control" name="poli" id="poli">
                        <?php
foreach ($poli->result() as $p ) {
    echo "<option value='$p->nama_poli'>$p->nama_poli</option>";
}
                        ?>
                    </select>
                    <div class="form-group">
                      <label for="dokter">Dokter</label>
                      <select class="form-control" name="dokter" id="dokter">
                        <!-- data doketer -->
                        <?php 
                        foreach ($dokter->result() as $s ) {
                            echo "<option value='$s->nama_pegawai'>$s->nama_pegawai</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        <?php echo form_close();?>
        </div>    
    </div>
    <div class="col-md-6">
        <div class="">
                <h2>Data Keluhan</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No. RM</th>
                        <th>Nama</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                    $noId;
                    $diagnosa;
                        foreach ($keluhan->result() as $k) {
                            if($k->diagnosa === ""){
                                $noId = $k->id_rajal;
                                $diagnosa = '<td>'.anchor('admin/diag/'.$k->id_rajal, '<button class="btn btn-sm btn-primary">Beri Diagnosa</button>').'</td>';
                            }else{
                                $diagnosa = "<td class='text-success'>$k->diagnosa</td>";
                            }
                            echo "
                                <tr>
                                    <td>$k->tgl_periksa</td>
                                    <Td>$k->no_rm</td>
                                    <td>$k->nama</td>
                                    <td>$k->keluhan</td>
                                    $diagnosa
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
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