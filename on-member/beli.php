<?php
session_start();
//mendapatkan id_produk dari url

$id_produk = $_GET['id'];

//jika sudah ada produk di keranjang maka ditambah

if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk]+=1;
}
//jika belum ada
else{
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>window.alert('Produk masuk Keranjang Belanja')</script>";
echo "<script>location= './index.php#produk'</script>";
?>
