<?php 

    session_start();
    include '../config/koneksi.php';

    $id_trx = $_GET['idtrx'];

    $data = mysqli_query($connect, "SELECT * FROM transaksi WHERE id_transaksi='$id_trx' ");
    $trx = mysqli_fetch_assoc($data);

    $detail = mysqli_query($connect, "SELECT detail_transaksi.*, barang.nama_barang FROM detail_transaksi INNER JOIN barang ON detail_transaksi.id_barang=barang.id WHERE detail_transaksi.id_transaksi='$id_trx' ");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Struk Belanja</title>
    <style>
        body{
            color: #a7a7a7;
        }
    </style>
  </head>
  <body>
    <div class='container mt-5'>
        <div align="center">
            <table width="500" border="0" cellpadding="1" cellspacing="0">
                <tr>
                    <th class="text-center">
                        Toko Alat Tulis <br>
                        Jl. Veteran No. 10 <br> 
                        Pasuruan Jawa Timur 
                    </th>
                </tr>
                <tr class="text-center"><td><hr></td></tr>
                <tr>
                    <td><?= date('d-m-Y H:i:s'); ?></td>
                </tr>
                <tr class="text-center"><td><hr></td></tr>
            </table>
            <table width="500" border="0" cellpadding="3" cellspacing="0">
                <?php while ($row = mysqli_fetch_array($detail)) { ?>
                    <tr>
                        <td><?= $row['nama_barang'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td><?= number_format($row['harga']) ?></td>
                        <td><?= number_format($row['total']) ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
                <tr>
                        <td align="right" colspan="3">Total</td>
                        <td align="right"><?= number_format($trx['total']) ?></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="3">Bayar</td>
                        <td align="right"><?= number_format($trx['bayar']) ?></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="3">Kembali</td>
                        <td align="right"><?= number_format($trx['kembali']) ?></td>
                    </tr>
            </table>
            <table width="500" border="0" cellpadding="1" cellspacing="0">
                <tr><td><hr></td></tr>
                <tr>
                    <th class="text-center">Terimakasi, Selemat Berbelanja Kembali</th>
                </tr>
            </table>
            <!-- <a href="cetak-all.php" class="btn btn-primary mt-3 celap">Cetak</a> -->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
