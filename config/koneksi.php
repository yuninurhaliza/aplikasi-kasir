<?php 

    $connect = mysqli_connect("localhost", "root", "", "kasir");

    if (!$connect) {
        echo "Koneksi Gagal";
    }

?>