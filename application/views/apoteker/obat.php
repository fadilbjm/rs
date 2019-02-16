<div class="container">
    <div class="text-center">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Obat</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th><button type="button" class="btn btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#obatMod">
  Tambah Obat
</button></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($obat->num_rows() > 0){
                        foreach($obat->result() as $o){
                            echo '<tr>
                                <td scope="row">'.$o->id_obat.'</td>
                                <td>'.$o->nama_obat.'</td>
                                <td>'.$o->stok.'</td>
                                <td>'.$o->jenis_obat.'</td>
                                <td>'.$o->harga.'</td>
                                <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-warning btn-lg" data-toggle="modal" data-target="#e'.$o->id_obat.'">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="e'.$o->id_obat.'" tabindex="-1" role="dialog" aria-labelledby="jdl" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            '.form_open('apoteker/edtObat/'.$o->id_obat).'
            <div class="modal-body text-left">
                <div class="form-group">
                  <label for="nama">Nama Obat</label>
                  <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" value="'.$o->nama_obat.'" placeholder="">
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="number" class="form-control" name="stok" id="stok" aria-describedby="helpId" value="'.$o->stok.'" placeholder="">
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" name="harga" id="harga" aria-describedby="helpId" value="'.$o->harga.'" placeholder="">
                </div>
                <div class="form-group">
                  <label for="jenis">Jenis Obat</label>
                  <input type="text" class="form-control" name="jenis" id="jenis" aria-describedby="helpId" value="'.$o->jenis_obat.'" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary"  value="Save">
            </div>
            '.form_close().'
        </div>
    </div>
</div>
                                '.anchor('apoteker/delObat/'.$o->id_obat, '<button class="btn btn-sm btn-danger">Hapus</button>').'</td>
                            </tr>';
                        }
                    }else{
                        echo "<tr><td colspan='6'><pre>Data belum/tidak ditemukan!.</pre></td></tr>";
                    }
                ?>
            </tbody>
        </table>





<!-- Modal -->
<div class="modal fade" id="obatMod" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('apoteker/insObat');?>
            <div class="modal-body text-left">
                <input type="hidden" name="id" value="<?php echo date('ymdhis');?>">
                <div class="form-group">
                  <label for="nama">Nama Obat</label>
                  <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="number" class="form-control" name="stok" id="stok" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" name="harga" id="harga" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  
                    <label for="jenis">Jenis Obat</label>
                    <select class="form-control" name="jenis" id="jenis">
                      <option value="1">Obat Bebas</option>
                      <option value="2">Obat Bebas Terbatas</option>
                      <option value="3">Obat Keras</option>
                      <option value="4">Psikotropika</option>
                      <option value="5">Narkotika</option>
                      <option value="6">Prekursor</option>
                      <option value="7">OHT</option>
                      
                    </select>
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

    </div>
</div>