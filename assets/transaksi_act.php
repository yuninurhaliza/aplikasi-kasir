<?php 

    session_start();

    include "../config/koneksi.php";

    $bayar = preg_replace('/\D/', '', $_POST['bayar']);

    $tanggal = date('Y-m-d H:i:s');
    $total = $_POST['total'];
    // $nama = $_SESSION['nama'];
    $kembali = $bayar - $total;

    mysqli_query($connect, "INSERT INTO transaksi (id_transaksi, tanggal, total, bayar, kembali) VALUES (NULL, '$tanggal', '$total', '$bayar', '$kembali') ");

    $id_transaksi = mysqli_insert_id($connect);

    foreach ($_SESSION['cart'] as $key => $value) {
        $id_barang = $value['id_barang'];
        $harga = $value['harga_barang'];
        $jumlah = $value['jumlah'];
        $total = $harga*$jumlah;

        mysqli_query($connect, "INSERT INTO detail_transaksi (id_detail_transaksi, id_transaksi, id_barang, harga, jumlah, total) VALUES (NULL, '$id_transaksi', '$id_barang', '$harga', '$jumlah', '$total') ");
    }

    $_SESSION['cart'] = [];

    header("location:transaksi_selesai.php?idtrx=". $id_transaksi);

?>