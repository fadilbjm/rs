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
            <?php echo form_open('admin/procReg?q=belum');?>
                <div class="form-group">
                  <label for="rm">No. Rekam Medis</label>
                  <input type="text" class="form-control" name="rm" id="rm" aria-describedby="" placeholder="" value="23" disabled>
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