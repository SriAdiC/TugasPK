<?php
session_start();
require '../config.php';
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai member
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
$query = mysqli_query($dbconnect, "SELECT * FROM produk");
$logo = mysqli_query($dbconnect, 'SELECT * FROM users');
$row_logo = mysqli_fetch_assoc($logo);

if (
    !isset($_SESSION['user_login']) || (isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'member')
) {
    header('location:./../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="member.css">
    <link rel="stylesheet" href="./assets/css/parallax.css">
    <title>Toko Online|SriAdi|tugas</title>
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
    <!-- navbar -->
    <div id="home">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a href="profil.php" class="navbar-brand page-scroll"><img src="../foto_profil/<?= $row_logo['foto_profil']; ?>"><span><?= $_SESSION['nama']; ?></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#home" class="nav-link page-scroll">home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#order" class="nav-link page-scroll">order</a>
                        </li>
                        <li class="nav-item">
                            <a href="#produk" class="nav-link page-scroll">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link page-scroll">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link page-scroll">Contact</a>
                        </li>
                        <li class="nav-item disabled">
                            <a href="../logout.php" class="nav-link">LogOut</a>
                        </li>
                        <li class="nav-item">
                            <a href="keranjang.php" class="nav-link page-scroll"><i class="fas fa-cart-plus fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="slides" class="carousel slide" data-ride="carousel" data-interval="7000">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image:url(../assets/img/bg/bg9.jpg);">
                    <div class="carousel-caption text-center">
                        <h1>Welcome To Marvel Collection</h1>
                        <h3>Costume and Action Figure</h3>
                        <h3>FREE Ongkir <i class="fas fa-car"></i></h3>
                        <a href="#produk" class="btn btn-secondary btn-lg page-scroll">Start Shopping <i class="fas fa-cart-plus"></i></a>
                    </div>
                </div>
                <div class="carousel-item" style="background-image:url(../assets/img/bg/bg12.jpg);"></div>
                <div class="carousel-item" style="background-image:url(../assets/img/bg/bg11.jpg);"></div>
                <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- jumbotron -->
    <div class="row jumbotron welcome">
        <!-- <div class="col-12"> -->
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
            <p class="lead">online shop yang menyediakan berbagai macam kostum dan action figure para karakter marvel.
                <br> Kepuasan anda adalah Tujuan Kami</p>
        </div>
        <!-- </div> -->
        <div class="col-xs-12 col-sm12 col-md-3 col-lg-3 col-xl-2">
            <a href="#"><button type="button" class="btn btn-outline-light btn-lg shop">
                    Shopping
                </button></a>
        </div>
    </div>
    <hr class="my-5">
    <!-- </div> -->
    <div id="order">
        <div class="container-fluid">
            <div class="row built text-center">
                <div class="col-12 mt-5">
                    <h3 class="heading">Special Order</h3>
                    <div class="heading-underline"></div>
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <div class="kategori">
                                <ul class="clearfix button-group filters-button-groups">
                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">All</li>
                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Costume</li>
                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Actions Figure</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="container-fluid padding alat">
            <div class="row text-center padding">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card">
                        <img src="../assets/img/bg/iron-studios_iron-studios-marvel-captain-america-comic-1-10-action-figure-patung_full02.jpg" class="card-img-top">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="font-weight-bold">Action Figure Iron Studios Captain America Comic</div>
                                <div class="text-danger">Rp.1.500.000</div>
                            </div>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 thumbnail">
                    <div class="card">
                        <img src="../assets/img/bg/images (12).jpeg" class="card-img-top">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="font-weight-bold">Action Figure Black Panther</div>
                                <div class="text-danger">Rp.650.000</div>
                            </div>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 thumbnail">
                    <div class="card">
                        <img src="../assets/img/bg/images (14).jpeg" class="card-img-top">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="font-weight-bold">Costume Cosplay Hawkeye</div>
                                <div class="text-danger">Rp.5.600.000</div>
                            </div>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <hr class="my-4"> -->
        </div>
    </div>
    <!-- nav -->
    <!-- <hr class="my-5"> -->
    <figure>
        <div class="fixed-wrap">
            <div id="fixed"></div>
        </div>
    </figure>

    <div class="jumbotron salebox">
        <div class="row">
            <div class="text-salebox">
                <div class="text-lefts">
                    <div class="sale-box">
                        <div class="sale-box-top">
                            <h2 class="number">40</h2>
                            <span class="sup-1">%</span>
                            <span class="sup-2">Off</span>
                        </div>
                        <h2 class="text-sale">SALES</h2>
                    </div>
                </div>
                <div class="text-rights ml-3">
                    <h2 class="title">Just hurry up limited offer!</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, fuga! Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Ad, ex?</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium quaerat nesciunt quidem excepturi! Nisi, rerum? Accusantium quam repellat odit eum exercitationem quas iste asperiores beatae enim incidunt possimus, ratione ipsum!</p>
                    <p>
                        <a href="#produk" class="page-scroll btn btn-secondary">Start shop</a>
                        <a href="#" class="btn btn-outline-light">Read more</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="produk">
        <div class="container-fluid">
            <div class="row built text-center">
                <div class="col-12 mt-5">
                    <h3 class="heading">Our Product</h3>
                    <div class="heading-underline"></div>
                </div>
                <hr>
            </div>
        </div>

        <!-- produk -->
        <div class="container mb-5">
            <div class="col-lg-12">
                <div class="row mt-6">
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                    <div class="col-lg-3 mb-3">
                        <div class="card">
                            <img src="../foto_produk/<?= $row['gambar_produk'] ?>" class="card-img-top">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="font-weight-bold"><?= $row['nama_produk']; ?></div>
                                    <div class="text-danger">Rp.<?= number_format($row['harga_produk']); ?></div>
                                </div>
                                <hr class="my-4">
                                <div class="text-center">
                                    <a href="beli.php?id=<?= $row['id_produk']; ?>" class="btn btn-outline-primary btn-sm ">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <hr class="my-5"> -->
    <figure>
        <div class="fixed-wrap">
            <div id="fixed1"></div>
        </div>
    </figure>
    <!-- <hr class="my-5"> -->
    <div id="about" class="about">
        <div class="jumbotron">
            <div class="col-12 text-center">
                <h3 class="heading">About Me</h3>
                <div class="heading-underline"></div>
            </div>

            <div class="row">
                <div class="col-md-12 admin">
                    <div class="row">
                        <div class="col-md-6 development">
                            <div class="row">
                                <div class="col-12 text-center ">
                                    <h5 class="heading">Admin</h5>
                                    <div class="heading-underline" id="heading-underline"></div>
                                </div>
                                <div class="col-md-4">
                                    <img src="../assets/img/admin.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <blockquote>
                                        <i class="fas fa-quote-left"></i>
                                        Stay positif, jangan pernah menyerah akan segala sesuatu yang kamu hadapi
                                        lakukanlah semua keadaan dengan hati yang gembira. Dan jangan lupa, Orang sukses adalah orang yang berani mengambil resiko.
                                        <hr class="my-2">
                                        <cite>&#8212; Sri Adi Cahyono, Student</cite>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 website">
                            <div class="row">
                                <div class="col-12 text-center ">
                                    <h5 class="heading">Web</h5>
                                    <div class="heading-underline" id="heading-underline"></div>
                                </div>
                                <div class="col-md-4">
                                    <img src="../assets/img/web.png" alt="">
                                </div>
                                <div class="col-md-6">
                                    <blockquote>
                                        <i class="fas fa-quote-left"></i>
                                        Website ini saya dedikasikan untuk tugas saya
                                        dan menambah ilmu untuk membuat sebuah website menggunakan HTML5,
                                        CSS3 dan Bootstrap 4 Responsive dan di lengkapi dengan Jquery
                                        dan Font awesome.
                                        <hr class="my-2">
                                        <cite>&#8212; Web design by Sri Adi Cahyono</cite>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="col-md-4 personal">
                        <div class="mb-4 ml-md-5">
                            <h2 class="pb-4">Help</h2>
                            <ul class="list-unstyled" id="personal">
                                <li><a href="#" class="d-block pb-4">Contact</a></li>
                                <li><a href="#" class="d-block pb-4">FAQs</a></li>
                                <li><a href="#" class="d-block pb-4">Terms & Conditions</a></li>
                                <li><a href="#" class="d-block pb-4">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 social text-center">
                        <div class="mb-4 ml-md-5">
                            <h2 class="pb-4">Social Account</h2>
                            <ul class="list-unstyled pt-3" id="menu">
                                <li><a href="http://twitter.com" class="d-inline"><i class="fab fa-twitter-square fa-3x p-1 mr-4"></i></a></li>
                                <li><a href="http://Facebook.com" class="d-inline"><i class="fab fa-facebook-square fa-3x p-1"></i></a></li>
                                <li><a href="http://Instagram.com" class="d-inline"><i class="fab fa-instagram fa-3x p-1 ml-4"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 address">
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
                            &copy;Copyright MARVEL COLLECTION with Bootstrap 4 theme 2019 design by <i class="fa fa-heart-broken"></i> Sri Adi Cahyono
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