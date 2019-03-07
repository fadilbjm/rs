<div class="container">
    <div class="text-center">
        <div class="row">
            <div class="col-lg-6" style="border-radius: 5px; padding:10px;">
                <div id="char" style="width:400px; height:300px;"></div>
                
            </div>
        </div>
    </div>
</div>



 </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/rs/aset/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/rs/aset/js/bootstrap.js"></script>
    <script src="/rs/aset/js/custom.js"></script>
    <script src="/rs/aset/js/datatables.js"></script>
    <script src="/rs/aset/js/highcharts.js"></script>
	<script type="text/javascript">
		$(document).ready(function (){
            
            Highcharts.chart('char',{
                chart:{
                    type:'pie'
                },
                title:{
                    text:'Data Penyakit'
                },
                subtitle:{
                    text:'Banyak penyakit dalam bulan <?php echo date('M');?>'
                },
                series:[<?php foreach ($data->result() as $d ) {?>
                    {
                        name:'<?php echo $d->diagnosa;?>',
                        y:12
                    },
                <?php }?>]
            });
        
    });
        </script>
  </body>
</html>