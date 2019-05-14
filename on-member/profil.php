<?php 

require '../config.php';

$query = mysqli_query($dbconnect,"SELECT * FROM users WHERE level_user ='member'");
$row = mysqli_fetch_assoc($query);

?>
<script>
    function konfirmasi() {
        var x = confirm("Yakin diubah?");

        if (x == true) {

            return true;
        } else {
            return false;
        }
    }
</script>

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
                <!-- <a href="#home" class="navbar-brand"><img src="./assets/img/bg/logo.png" alt=""></a> -->
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
    <div id="profil">
        <div class="jumbotron welcome text-center">
            <h1 class="heading">Profil</h1>
            <div class="heading-underline"></div>
        </div>
        <div class="container text-center">
                <img src="../foto_profil/<?= $row['foto_profil']; ?>" style="border : 0; border-radius : 50%;" width="300" class="mb-5">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $row['username']; ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
        <a href="index.php" class="btn btn-danger ml-5"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

    <?php

    if (isset($_POST['ubah'])) {
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];
        // jk foto diubah
        if (!empty($lokasifoto)) {
            move_uploaded_file($lokasifoto, "../foto_profil/$namafoto");

            $dbconnect->query("UPDATE users SET nama='$_POST[nama]', foto_profil = '$namafoto' WHERE id_user ='$_GET[id]'");
        } else {
            $dbconnect->query("UPDATE users SET nama='$_POST[nama]' WHERE id_user ='$_GET[id]'");
        }



        echo "<script>alert('data berhasil diubah, Data akan berubah setelah anda login kembali')</script>";
        echo "<script>location= 'index.php'</script>";
    }

    ?>

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