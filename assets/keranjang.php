<?php 

    session_start();
    include '../config/koneksi.php';

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $jumlah = $_POST['jumlah'];

        $data   = mysqli_query($connect, "SELECT * FROM barang WHERE id='$id' ");
        $brg    = mysqli_fetch_assoc($data);

        $barang = [
            'id_barang'    => $brg['id'],
            'nama_barang'  => $brg['nama_barang'],
            'harga_barang' => $brg['harga_barang'],
            'jumlah'=> $jumlah
        ];

        $_SESSION['cart'][]=$barang;

        header('location: ../index.php');
    }

?>