<?php 

    include "../config/koneksi.php";
    $query  = $connect->query("SELECT * FROM barang");

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

    <title>barang</title>
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
        <h1 class="text-center mt-3 mb-3">List Barang</h1>
        <a href="barang_add.php" class="btn btn-success mt-3 mb-3">Tambah Data</a>

        <table class="table table-bordered">
            <tr class="text-center">
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok Barang</th>
                <th>Aksi</th>
            </tr>
            <?php 
            
            while ($row = $query->fetch_assoc()) { ?>

            <tr class="text-center">
                <td><?= $row['id_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td>Rp. <?= number_format($row['harga_barang']); ?></td>
                <td><?= $row['stok']; ?></td>
                <td>
                    <a href="barang_edit.php?id=<?=$row['id']?>">Edit</a> | <a href="barang_hapus.php?id=<?=$row['id']?>">Hapus</a> 
                </td>
            </tr>

            <?php } ?>
        </table>
    </div>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>