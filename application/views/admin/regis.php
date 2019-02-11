<?php echo form_open("admin/procReg");?>
<input type="radio" name="reg" id="regis1" onclick="handle(this)" value="sudah">Sudah Terdaftar
<input type="radio" name="reg" id="regis2" onclick="handle(this)" value="belum">Belum Terdaftar
<br>
<input type="text" name="rm" id="nama" disabled>
<?php echo form_close();?>





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