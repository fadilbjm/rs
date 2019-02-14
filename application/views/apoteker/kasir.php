<?php 
    foreach ($kode->result() as $k ) {
        echo $k->kode_pembayaran;
    }
?>