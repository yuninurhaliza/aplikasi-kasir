<?php 

  session_start();
  include 'config/koneksi.php';
  $barang = mysqli_query($connect, "SELECT * FROM barang");
  // print_r($_SESSION);

  $sum  = 0;

  if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
      $sum  += $value['harga_barang']*$value['jumlah'];
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

    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title>Aplikasi Kasir</title>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
        <h1 class="text-center mb-3 mt-3">Selamat Datang di Aplikasi Kasir</h1>
        <hr>
        <a href="assets/reset_keranjang.php" class="btn btn-danger mb-3">Reset Keranjang</a>
        <div class="row">
            <div class="col-md-8">
              <form method="POST" action="assets/keranjang.php">
                <div class="input-group">
                    <select name="id" class="form-control">
                      <option value="">Pilih Barang</option>
                      <?php while ($row = mysqli_fetch_array($barang)) { ?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama_barang']; ?></option>
                      <?php } ?>
                    </select>
                    <span class="input-group-btn ms-2">
                      <button class="btn btn-primary" type="submit">Tambah</button>
                    </span>
                </div>
              </form>
              <br>
              <table class="table table-bordered">
                <tr class="text-center">
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                </tr>
                <?php foreach ($_SESSION['cart'] as $key => $value ) { ?>
                  <tr class="text-center">
                    <td><?= $value['nama_barang']; ?></td>
                    <td><?= number_format($value['harga_barang']); ?></td>
                    <td><?= $value['jumlah']; ?></td>
                    <td><?= number_format($value['jumlah']*$value['harga_barang']); ?></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <div class="col-md-4">
              <h3>Total Belanja Rp.<?= number_format($sum); ?></h3>
            </div>
        </div>
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