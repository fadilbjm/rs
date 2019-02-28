<hr>
<table id="mytable">
    <thead>
        <tr>
            <th>No. RM</th>
            <th>Nama</th>
            <th>No. BPJS</th>
            <th>Gender</th>
            <th>No. HP</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="hasil">
        
    </tbody>
</table>

</div>
    </div>
    </div>

<script src="/rs/aset/js/jquery.js"></script>
    <script src="/rs/aset/js/datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/rs/aset/js/bootstrap.js"></script>
    <script src="/rs/aset/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
	<script type="text/javascript">
        


		$(document).ready(function (){
			$('#mytable').DataTable({
                dataLength:5,
                ajax:'<?php echo base_url('ranap/get');?>'
            });
            // ambil();

		});
	</script>
</body>
</html>