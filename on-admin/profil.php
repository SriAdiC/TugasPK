<?php
$query = mysqli_query($dbconnect,"SELECT foto_profil FROM users WHERE id_user = '$_GET[id]'");
$row = mysqli_fetch_assoc($query);

$foto = $row['foto_profil'];

?>
<link rel="stylesheet" href="profil.css">

<div class="col-md-12 text-center">
    <h2>Profil</h2>
    <hr>
</div>

<div class="jumbotron text-center">
    <img src="../foto_profil/<?= $foto ?>" class="img-circle" width="250" name="foto">
    <h3 class="title">Nama : <?= $_SESSION['nama'] ?></h2>
    <p>Siswa | SMKN 8 JEMBER | RPL2</p>
    <div class="sosmed" >
        <ul class="list-unstyled sosmed" id='menu'>
            <li><a href="https://facebook.com" class="prof"><i class="fa fa-facebook-square fa-3x"></i></a></li>
            <li><a href="#" class="prof"><i class="fa fa-twitter-square fa-3x "></i></a></li>
            <li><a href="#" class="prof"><i class="fa fa-instagram fa-3x "></i></a></li>
        </ul>
    </div>
    <a href="index.php?page=ubah_profil&id=<?= $_SESSION['sess_id'] ?>">
        <button class="btn btn-success">Ubah Profil</button>
    </a>
</div> 
