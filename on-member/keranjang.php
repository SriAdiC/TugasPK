<?php 
session_start();
require '../config.php';
$query = $dbconnect->query('SELECT * FROM users');
$row = $query->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="member.css">
    <link rel="stylesheet" href="keranjang.css">
    <!-- <link rel="stylesheet" href="./assets/css/parallax.css"> -->
    <title>Toko Online|SriAdi|tugas</title>
</head>

<body>
    <!-- navbar -->
    <div id="home">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a href="profil.php" class="navbar-brand"><img src="../foto_profil/<?= $row['foto_profil']; ?>"><span><?= $row['nama']; ?></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link page-scroll">home</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link page-scroll">order</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link page-scroll">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link page-scroll">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link page-scroll">Contact</a>
                        </li>
                        <li class="nav-item disabled">
                            <a href="../logout.php" class="nav-link">LogOut</a>
                        </li>
                        <li class="nav-item active">
                            <a href="keranjang.php" class="nav-link page-scroll active"><i class="fas fa-cart-plus fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- jumbotron -->
    <div id="keranjang">
        <div class="jumbotron welcome text-center">
            <h1 class="heading">Keranjang Belanja</h1>
            <div class="heading-underline"></div>
        </div>
        <div class="container">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>SubHarga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                    <?php
                    $query = $dbconnect->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                    $row = $query->fetch_assoc();
                    $subharga = $row['harga_produk'] * $jumlah;
                    ?>
                    <tr>
                        <td class=" text-center"><?= $no ?></td>
                        <td class=" text-center"><?= $row['id_produk']; ?></td>
                        <td class=" text-center"><?= $row['nama_produk']; ?></td>
                        <td class=" text-center">Rp. <?= number_format($row['harga_produk']); ?></td>
                        <td class=" text-center"><?= $jumlah; ?></td>
                        <td class=" text-center">Rp. <?= number_format($subharga); ?></td>

                        <td class="text-center">

                            <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" style="color: #bb0000;"><i class="fa fa-trash mr-3"></i></a>
                            <a href="-produk.php?id=<?= $id_produk ?>" style="color: #bb0000;"><i class="fa fa-minus"></i></a>
                        </td>

                    </tr>
                    <?php $no++; ?>
                    <?php $total += $subharga ?>
                    <?php endforeach ?>
                </tbody>
                <thead>
                    <?php
                    if ($total == 0) {
                        echo '<tr>
                                <th colspan="7">Upss!! Keranjang kosong...</th>
                              </tr>';
                    }else {
                       echo '<tr>
                            <th colspan="5">Total Belanja</th>
                            <th colspan="2" class="text-center">Rp'. number_format($total) .' </th>
                        </tr>';
                    }
                    ?>
                </thead>

            </table>
            <a href="index.php#produk" class="btn btn-secondary" style="margin-left:70%;">&DoubleLeftArrow; Back to Shop</a>
            <a href="#" class="btn btn-success">CheckOut &DoubleRightArrow;</a>
        </div>
    </div>

    <hr class="my-1">


    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="#"><i class="fab fa-cc-paypal fa-3x ml-5"></i></a>
                <a href="#"><i class="fab fa-apple-pay fa-3x ml-5"></i></a>
            </div>
        </div>
    </div>

    <hr class="my-3">

    <div id="contact">
        <footer class="ftco-footer bg-light ftco-section">
            <div class="col-12 text-center">
                <h3 class="heading">Contact</h3>
                <div class="heading-underline"></div>
            </div>
            <div class="container mt-5">
                <div class="row mb-5">
                    <div class="col-md personal">
                        <div class="mb-4 ml-md-5">
                            <h2 class="pb-4">Help</h2>
                            <ul class="list-unstyled" id="personal">
                                <li><a href="" class="d-block pb-4">Contact</a></li>
                                <li><a href="" class="d-block pb-4">FAQs</a></li>
                                <li><a href="" class="d-block pb-4">Terms & Conditions</a></li>
                                <li><a href="" class="d-block pb-4">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 social">
                        <div class="mb-4 ml-md-5">
                            <h2 class="pb-4">Social Account</h2>
                            <ul class="list-unstyled pt-3" id="menu">
                                <li><a href="" class="d-inline"><i class="fab fa-facebook-square fa-3x p-1"></i></a></li>
                                <li><a href="" class="d-inline"><i class="fab fa-twitter-square fa-3x p-1 ml-4"></i></a></li>
                                <li><a href="" class="d-inline"><i class="fab fa-instagram fa-3x p-1 ml-4"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 address">
                        <div class="mb-4 ml-md-5">
                            <h2 class="pb-4">Have a question?</h2>
                            <div class="block-23 mb-3">
                                <ul class="list-unstyled" id="address">
                                    <li class="pb-4">
                                        <span><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="text ml-3">City State, Rejoagung</span>
                                    </li>
                                    <li class="pb-4">
                                        <span><i class="fas fa-phone"></i></span>
                                        <span class="text ml-3">(666) 666-6666</span>
                                    </li>
                                    <li class="pb-4">
                                        <span><i class="fa fa-envelope"></i></span>
                                        <span class="text ml-3">email@gmail.com</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-1">
                <div class="row">
                    <div class="col-md-12 text-center mt-2">
                        <p>
                            COPYRIGHT&copy; MARVEL COLLECTION with Bootstrap 4 theme 2019 design by Sri Adi Cahyono
                            <a href="#home" class="page-scroll"><i class="fa fa-angle-up"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <button id="arrow">
        <i class="fas fa-arrow-up"></i>
    </button>






    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <script src="./assets/js/jquery-easing.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/all.js"></script>
    <!-- <script src="./assets/js/"></script> -->
</body>

</html> 