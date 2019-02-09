<table class="table table-sm table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">No. RM</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Nama Suami/wali</th>
      <th scope="col">Alamat</th>
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
                    <td>$p->nama</td>
                    <td>$p->tgl_lahir</td>
                    <td>$p->nama_wali</td>
                    <td>$p->alamat</td>
                    <td>".anchor(base_url('admin/editPasien'.$p->id_pasien), '<button class="btn btn-warning>Edit</button>"')."</td>
                    <td>".anchor(base_url('admin/delPasien'.$p->id_pasien), '<button class="btn btn-danger>Hapus</button>"')."</td>
            </tr>";
        }
      ?>
</tbody>