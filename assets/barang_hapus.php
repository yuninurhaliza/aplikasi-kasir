<?php 

    include "../config/koneksi.php";

    if (isset($_GET['id'])) {
        $id     = $_GET['id'];

        $query  = mysqli_query($connect, "DELETE FROM barang WHERE id='$id' ");

        if ($query) {
            echo "<script>alert ( 'Data berhasil Dihapus' );</script>";
            echo "<script>location='barang.php'</script>";
        }
    }

?>