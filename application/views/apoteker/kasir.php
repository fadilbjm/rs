<div class="text-center text-primary">
    <h3>KASIR APOTEK</h3>
</div>
<div class="container">
<div class="row">
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Banyak</th>
                    <th>Harga</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kodes="";
                    if ($kode->num_rows()>=0) {
                        foreach ($kode->result() as $k ) {
                            $kodes = $k->kode_pembayaran;
                            echo "<tr>
                                <td>$k->nama_obat</td>
                                <td>$k->banyak</td>
                                <td>$k->subtotal</td>
                                <td>".anchor(base_url('apoteker/delKasir/'.$k->id_semen), '<button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>')."
                            </tr>";
                        }
                    }else {
                        foreach ($kode->result() as $ko ) {
                            $kodes = $ko->kode_pembayaran+1;
                        }
                    }
                        
                ?>
                <tr class="bg-dark text-light">
                    <td>Total</td>
                    <td>:</td>
                    <td><h3><?php echo $total;?></h3></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <?php echo form_open('apoteker/addKasir?q=biasa');?>
        <input type="hidden" name="id" value="<?php echo $kodes;?>">
        <div class="form-group">
          <label for="kode">Kode Obat:</label>
          <input type="text" class="form-control" name="kode" id="kode" autocomplete="off" aria-describedby="" placeholder="">          
        </div>
        <div class="form-group">
          <label for="banyak">Banyaknya:</label>
          <input type="number" class="form-control" name="banyak" id="banyak" autocomplete="off" value="1" aria-describedby="" placeholder="">          
        </div>
        <button type="submit" class="btn btn-secondary">Tambah</button>
        <?php echo form_close();?>
        <hr>
        <?php echo form_open('apoteker/addKasir?q=puyer');?>
        <input type="hidden" name="id" value="<?php echo $kodes;?>">
        <div class="form-group">
            <label for="puyer">Obat Puyer</label>
            <select class="custom-select" name="puyer" id="puyer">
                <option selected>Pilih Jenis Obat Puyer</option>
                <option value="puyer:30000">Obat Puyer Rp. 30.000</option>
                <option value="puyer:35000">Obat Puyer Rp. 35.000</option>
                <option value="puyer:40000">Obat Puyer Rp. 40.000</option>
                <option value="puyer:45000">Obat Puyer Rp. 45.000</option>
                <option value="puyer:50000">Obat Puyer Rp. 50.000</option>
                <option value="puyer:55000">Obat Puyer Rp. 55.000</option>
                <option value="puyer:60000">Obat Puyer Rp. 60.000</option>
                <option value="puyer:65000">Obat Puyer Rp. 65.000</option>
                <option value="puyer:70000">Obat Puyer Rp. 70.000</option>
                <option value="puyer:75000">Obat Puyer Rp. 75.000</option>
                <option value="puyer:80000">Obat Puyer Rp. 80.000</option>
            </select>
        </div>
        <div class="form-group">
          <label for="banyak">Banyaknya:</label>
          <input type="number"
            class="form-control" name="banyak" id="banyak" value="1" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-secondary">Tambah</button>
        <?php echo form_close();?>
    </div>
    <div class="col-md-3">
        <?php echo form_open('apoteker/bayar');?>
        <input type="hidden" name="id" value="<?php echo $kodes;?>">
        <input type="hidden" name="tot" value="<?php echo $total;?>">
        <div class="form-group">
          <label for="uang">Dibayar</label>
          <input type="number"
            class="form-control" name="uang" id="uang" aria-describedby="helpId" placeholder="" required>
        </div>
        <button type="submit" class="btn btn-primary">Bayar</button>
        <?php echo form_close();?>
    </div>
</div>
</div>

