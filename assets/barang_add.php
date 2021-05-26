<?php 

    include "../config/koneksi.php";

    if (isset($_POST['submit'])) {
        $nama   = $_POST['nama'];
        $harga  = $_POST['harga'];
        $stok   = $_POST['stok'];

        $query  = $connect->query("INSERT INTO barang VALUES ('', '$nama', '$harga', '$stok')");

        if ($query) {
            echo "<script>alert ( 'Data berhasil ditambahkan' );</script>";
            echo "<script>location='barang.php'</script>";
        }
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="../fontawesome/css/all.min.css">

    <title>tambah barang</title>
  </head>
  <body>
    

  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <div class='container'>
  <a class="navbar-brand" href="#">Aplikasi Kasir</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex ms-3">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <div class="icon mt-2">
        <h5>
          <a href="assets/barang.php"><i class="fas fa-list ms-3 me-3 text-white" data-toggle="tooltip" title="List Barang"></i></a>
          <a href="#"><i class="fas fa-envelope me-3 text-white" data-toggle="tooltip" title="Pesan"></i></a>
          <a href="#"><i class="fas fa-bell me-3 text-white" data-toggle="tooltip" title="Nofitikasi"></i></a>
        </h5>
      </div>
    </div>
  </div>
  </nav>


    <div class='container'>
        <h1 class="text-center mb-3 mt-3">Tambah Barang</h1>
        <form action="" method="post" class="row g-3 needs-validation justify-content-center" novalidate>
            <div class="col-md-8">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Barang" name="nama" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Silahkan Isi Nama Barang Untuk Melanjutkan
                </div>
            </div>
            <div class="col-md-8">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="text" class="form-control" id="harga" placeholder="Harga Barang" name="harga" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Silahkan Isi Harga Barang Untuk Melanjutkan
                </div>
            </div>
            <div class="col-md-8">
                <label for="stok" class="form-label">Stok Barang</label>
                <input type="text" class="form-control" id="stok" placeholder="Stok Barang" name="stok" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Silahkan Isi Stok Barang Untuk Melanjutkan
                </div>
            </div>
            <div class="col-md-8">
                <button class="btn btn-primary" name="submit" type="submit">Tambah Data</button>
            </div>
        <!-- <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Barang">
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok Barang</label>
            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Barang">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Tambah Data</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
        </form>
    </div>
    



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>