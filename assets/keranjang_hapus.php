<?php 

    session_start();
    include "../config/koneksi.php";

    $id = $_GET['id'];

    $cart = $_SESSION['cart'];

    $k = array_filter($cart, function ($var) use ($id){
        return ($var['id']==$id);
    });

    foreach ($k as $key => $value) {
        unset($_SESSION['cart'][$key]);
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header('location:../kasir.php');

?>