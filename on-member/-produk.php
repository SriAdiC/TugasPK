<?php
session_start();
$id_produk = $_GET['id'];
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] -= 1;
}
echo "<script>alert(' Produk terhapus dari keranjang ');</script>";
echo "<script>location = './keranjang.php'</script>";