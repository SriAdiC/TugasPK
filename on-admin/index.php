<?php
session_start();
require '../config.php';
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */

if (
    !isset($_SESSION['user_login']) || (isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin')
) {

    header('location:./../login.php');
    exit();
}
?>
<script>
    // pop up konfirmasi untuk menghapus

    function confirmation() {
        var x = confirm("Yakin ingin menghapus?");

        if (x == true) {

            return true;
        } else {
            return false;
        }
    }

    // pop up konfirmasi untuk mengubah

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
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin|SriAdi|tugas</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand"><?= $_SESSION['nama'] ?></>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Last access : <?php $zone = 3600 * +7; //GM T
                                $date = gmdate("l, d F Y H:i a", time() + $zone);

                                echo "$date"; ?> &nbsp;
                <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> <a href="../on-member/index.php" class="btn btn-danger square-btn-adjust">To Olshop</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php?id=<?= $_SESSION['sess_id'] ?>"><i class="fa fa-fw fa-home fa-1x"></i>Home</a>
                    </li>
                    <li>
                        <a href="index.php?page=produk"><i class="fa fa-fw fa-shopping-cart fa-1x"></i>Produk</a>
                    </li>
                    <li>
                        <a href="index.php?page=pelanggan"><i class="fa fa-fw fa-users fa-1x"></i>Pelanggan</a>
                    </li>
                    <li>
                        <a href="index.php?page=profil&id=<?= $_SESSION['sess_id'] ?>">
                            <i class="fa fa-fw fa-user fa-1x"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a href="../login.php"><i class="fa fa-fw fa-sign-out fa-1x"></i>Logout</a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'produk') {
                        include 'produk.php';
                    } elseif ($_GET['page'] == 'pelanggan') {
                        include 'pelanggan.php';
                    } elseif ($_GET['page'] == 'tambahproduk') {
                        include 'tambahproduk.php';
                    } elseif ($_GET['page'] == 'hapusproduk') {
                        include 'hapusproduk.php';
                    } elseif ($_GET['page'] == 'ubahproduk') {
                        include 'ubahproduk.php';
                    } elseif ($_GET['page'] == 'profil') {
                        include 'profil.php';
                    } elseif ($_GET['page'] == 'ubah_profil') {
                        include 'ubah_profil.php';
                    } elseif ($_GET['page'] == 'hapus_member') {
                        include 'hapus_member.php';
                    }
                } else {
                    include 'home.php';
                }
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
        <footer class="ftco-footer bg-light ftco-section">
            <div class="container mt-5">
                    <div class="col-md-12 social text-center">
                        <div class="mb-4 ml-md-5">
                            <h2 class="pb-4">Social Account</h2>
                            <ul class="list-unstyled pt-3" id="menu">
                                <li><a href="http://twitter.com" class="d-inline"><i class="fa fa-twitter-square fa-3x p-1 mr-4"></i></a></li>
                                <li><a href="http://Facebook.com" class="d-inline"><i class="fa fa-facebook-square fa-3x p-1"></i></a></li>
                                <li><a href="http://Instagram.com" class="d-inline"><i class="fa fa-instagram fa-3x p-1 ml-4"></i></a></li>
                            </ul>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-2">
                        <p class="lead">
                            &copy;Copyright MARVEL COLLECTION with Bootstrap 4 theme 2019 design by <i class="fa fa-heart"></i> Sri Adi Cahyono
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /. WRAPPER  -->
 

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>


</body>

</html> 