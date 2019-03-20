<table id="data-ruang">
    <thead>
        <th>Nama Ruang</th>
        <th>Tipe</th>
        <th>Bed Kosong</th>
        <th>Bed Terisi</th>
        <th>Jumlah Bed</th>
        <th><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add"><i class="fas fa-plus    "></i> Tambah Bed</button></th>
    </thead>
    <tbody>
    
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Bed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('ranap/addrooms');?>
            <div class="modal-body">
                <div class="form-group">
                  <label for="nama">Nama Kamar</label>
                  <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                  <label for="bed">Jumlah Bed</label>
                  <input type="number"
                    class="form-control" name="bed" id="bed" aria-describedby="helpId" min="1" required>
                </div>
                <div class="form-group">
                    <label for="tipe">Kelas</label>
                    <select class="custom-select" name="tipe" id="tipe" required>
                        <option selected>-- Chose One -- :)</option>
                        <option value="VIP">VIP</option>
                        <option value="Kelas I">Kelas I</option>
                        <option value="Kelas II">Kelas II</option>
                        <option value="Kelas III">Kelas III</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-secondary" value="Reset">
                <input type="submit" class="btn btn-primary" value="Tambah">
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

                <!-- end content -->
                <!-- </div> -->
                <!-- </div> -->
                </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/rs/aset/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/rs/aset/js/bootstrap.js"></script>
    <script src="/rs/aset/js/custom.js"></script>
    <script src="/rs/aset/js/datatables.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
        $("#data-ruang").DataTable({
            ajax: '<?php echo base_url('ranap/getRuang');?>'
        });
    });
    </script>
  </body>
</html>