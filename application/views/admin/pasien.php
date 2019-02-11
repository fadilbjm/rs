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
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Nama Suami/wali</th>
      <th scope="col">Alamat</th>
      <th scope="col">No. HP</th>
      <th scope="col" colspan="2"></th>
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
                    <td>$p->tgl_lahir</td>
                    <td>$p->jk</td>
                    <td>$p->nama_wali</td>
                    <td>$p->alamat</td>
                    <td>$p->telpon</td>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/rs/aset/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/rs/aset/js/bootstrap.js"></script>
    <script src="/rs/aset/js/custom.js"></script>
  </body>
</html>