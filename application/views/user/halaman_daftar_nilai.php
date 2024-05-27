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
              <a class="nav-link active text-white" href="<?php echo base_url('user/Dashboard') ?>"> <i class="fa-solid fa-dashboard mr-2"></i>Dashboard</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('user/jadwal_kuliah') ?>"><i class="fa-solid fa-calendar-days mr-2"></i> Jadwal Kuliah</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('user/daftar_nilai') ?>"><i class="fa-solid fa-paper-plane mr-2"></i>Daftar Nilai</a> <hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('login/logout') ?>"><i class="fa-solid fa-paper-plane mr-2"></i>Logout</a> <hr class="bg-secondary">
            </li>
          </ul>
      </div>

      <!-- Halaman dashboard -->
      <div class="col-md-10 p-5 pt-2">
        <h3><i class="fa-solid fa-paper-plane mr-2"></i>DAFTAR NILAI</h3><hr>
        <br>
        <?php echo $this->session->flashdata('pesan') ?>
        <table class="table table-striped table-hover table-bordered">
          <head>
            <tr>
              <th>No</th>
              <th>Mata Kuliah</th>
              <th>Dosen Pengampu</th>
              <th>Nilai</th>
              <th>Aksi</th>
              <tbody>
                <?php $no=1; foreach($nilai as $nilai) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nilai->mata_kuliah ?></td>
                    <td><?php echo $nilai->dosen_pengampu ?></td>
                    <td><?php echo $nilai->nilai ?></td>
                    <td>
                      
                      <a href="<?php echo base_url('user/daftar_nilai/detail/' .$nilai->id_nilai)?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a>
                      
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </tr>
          </head>
        </table>
      </div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div>
            <label>Mata Kuliah</label>
            <input type="text" name="mata_kuliah" class="form-control">
          </div>
          <div>
            <label>Dosen Pengampu</label>
            <input type="text" name="dosen_pengampu" class="form-control">
          </div>
          <div>
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control">
          </div>
          <div>
            <button type="submit" class="btn btn-success mt-3 btn-sm" style="width: 100%;"><i class="fa fa-save mr-1"></i>Simpan data</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="style.js"></script>

  </body>
</html>