<div class="jumbotron">
<div class="text-center"><h3><b>Data Pasien Rawat Inap</b></h3></div>
<table id="mytable" class="table table-inverse">
<thead class="thead-inverse">
    <tr>
        <th>Tanggal Masuk</th>
        <th>No. RM</th>
        <th>Nama Pasien</th>
        <th>Gender</th>
        <th>No. HP</th>
        <th>Dokter</th>
        <th></th>
    </tr>
</thead>
<tbody>

</tbody>
</table>



</div>

<div class="jumbotron">
    <div class="text-center">
        <h3><b>Data Pasien Pulang</b></h3>
    </div>
    <table id="mytable2" class="table table-inverse">
<thead class="thead-inverse">
    <tr>
        <th>Tanggal Keluar</th>
        <th>No. RM</th>
        <th>Nama Pasien</th>
        <th>Gender</th>
        <th>No. HP</th>
        <th>Dokter</th>
        <th></th>
    </tr>
</thead>
<tbody>

</tbody>
</table>
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
                ajax:'<?php echo base_url('ranap/getListRanap');?>'
            });

            $('#mytable2').DataTable({
                dataLength:5,
                ajax:'<?php echo base_url('ranap/getListRanap2');?>'
            });
            

		});
	</script>
</body>
</html>