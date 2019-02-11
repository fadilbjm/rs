<!doctype html>
<html lang="en">
  <head>
    <title>Admin &middot; RSB Ibunda</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/rs/aset/css/bootstrap.css">
    <link rel="stylesheet" href="/rs/aset/css/custom.css">
  </head>
  <body>
      <!-- navar -->
    <nav class="navbar navbar-expand-md navbar-dark hijau">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
      <!-- akhir navbar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 seratus">
                <div class="bg-hitam text-white text-center">
                <!-- menu samping -->
                    <span><a href="<?php echo base_url('admin/registrasi');?>" class="text-white linkurl">Registrasi</a></span>
                    <hr>
                    <span><a href="<?php echo base_url('admin/pasien');?>" class="text-white linkurl">Data Pasien</a></span>
                    <hr>
                    <span><a href="<?php echo base_url('admin/diagnosa');?>" class="text-white linkurl">Diagnosis</a></span>
                    <hr>
                    <span><a href="#" class="text-white linkurl">Pegawai</a></span>
                    <hr>
                </div>
            </div>
            <div class="col-md-9">
                <!-- content here -->
