<?php 

    include "../config/koneksi.php";

    if (isset($_GET['id'])) {
        $id     = $_GET['id'];

        $data   = mysqli_query($connect, "SELECT * FROM barang WHERE id='$id' ");
        $data   = mysqli_fetch_assoc($data);
    }

    if (isset($_POST['update'])) {
        $id     = $_GET['id'];
        $nama   = $_POST['nama'];
        $harga  = $_POST['harga'];
        $stok   = $_POST['stok'];

        $query = mysqli_query($connect, "UPDATE barang SET nama_barang='$nama', harga_barang='$harga', stok='$stok' WHERE id='$id' ");

        if ($query) {
            echo "<script>alert ( 'Data berhasil Diupdate' );</script>";
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

    <title>update barang</title>
  </head>
  <body>
    
    <div class='container'>
        <h1 class="text-center mb-3 mt-3">Tambah Barang</h1>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" value="<?= $data['nama_barang'] ?>">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Barang" value="<?= $data['harga_barang'] ?>">
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok Barang</label>
            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Barang" value="<?= $data['stok'] ?>">
        </div>
        <button type="submit" name="update" class="btn btn-success">Update Data</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </form>
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