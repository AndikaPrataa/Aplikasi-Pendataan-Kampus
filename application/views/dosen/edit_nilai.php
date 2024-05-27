<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">

    <title>Halaman Admin</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="#">Selamat datang | <b>Universitas Lampung</b></a>
     

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form class="form-inline my-2 my-lg-0 ml-auto">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="icon-ml-4">
          <h5>
            <i class="fa-solid fa-envelope ml-3" data-toggler="tooltip" title="Surat Masuk"></i>
            <i class="fa-solid fa-bell mr-3" datda-toggler="tooltip" title="Notifikasi"></i>
            <i class="fa-solid fa-right-to-bracket mr-3" data-toggle="tooltip" title="Log Out"></i>
          </h5>
        </div>
      </div>
    </nav>

    <!-- Sidebar -->
    <div class="row no-gutters">
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active text-white" href="<?php echo base_url('dosen/Dashboard') ?>"> <i class="fa-solid fa-dashboard mr-2"></i>Dashboard</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('dosen/jadwal_kuliah') ?>"><i class="fa-solid fa-calendar-days mr-2"></i> Jadwal Kuliah</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('dosen/mahasiswa') ?>"><i class="fa-solid fa-graduation-cap mr-2"></i>Daftar Mahasiswa</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('dosen/daftar_nilai') ?>"><i class="fa-solid fa-paper-plane mr-2"></i>Daftar Nilai</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('dosen/daftar_nilai') ?>"><i class="fa-solid fa-paper-plane mr-2"></i>Pengumuman</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('login/logout') ?>"><i class="fa-solid fa-paper-plane mr-2"></i>Logout</a> <hr class="bg-secondary">
            </li>
          </ul>
      </div>

      <!-- Halaman dashboard -->
      <div class="col-md-10 p-5 pt-2">
        <h3><i class="fa-solid fa-graduation-cap mr-2"></i><?php echo $title ?></h3><hr>
        <div>
          <br>
        </div>

        <?php foreach($nilai as $nilai) : ?>
        <form method="post" action="<?php echo base_url('dosen/daftar_nilai/edit_dataAksi') ?>">
          <div>
            <label>Mata Kuliah</label>
            <input type="hidden" name="id_nilai" class="form-control" value="<?php echo $nilai->id_nilai ?>">
            <input type="text" name="mata_kuliah" class="form-control" value="<?php echo $nilai->mata_kuliah ?>">
          </div>
          <div>
            <label>Dosen Pengampu</label>
            <input type="text" name="dosen_pengampu" class="form-control" value="<?php echo $nilai->dosen_pengampu ?>">
          </div>
          <div>
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" value="<?php echo $nilai->nilai ?>">
          </div>
          <div>
            <button type="submit" class="btn btn-success mt-3 btn-sm" ><i class="fa fa-save mr-1"></i>Simpan data</button>
            <a href="<?php echo base_url('dosen/daftar_nilai') ?>" class="btn btn-warning btn-sm mt-3" >Kembali</a>
          </div>
        </form>
      <?php endforeach; ?>
      </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/style.js"></script>

  </body>
</html>