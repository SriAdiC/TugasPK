<?php 
$query = 'SELECT * FROM users WHERE level_user = "admin"';
$put = $dbconnect->query($query);
$row = $put ->fetch_assoc();
 ?>
<div class="jumbotron text-center">
    <img src="../foto_profil/<?= $row['foto_profil'] ?>" alt="Foto Profil" class="img-circle" width="250">
    <p>Siswa | SMKN 8 JEMBER | RPL2</p>
    <h2>Selamat Datang Admin</h2>
</div>

<section class="about">
    <div class="col-sm-12 text-center">
        <h2>About</h2>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet inventore, rerum dicta quod dolor est fuga ratione provident maiores aperiam, non illo error autem nisi minus in, facilis. Incidunt, eum.</p>
        </div>
        <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet inventore, rerum dicta quod dolor est fuga ratione provident maiores aperiam, non illo error autem nisi minus in, facilis. Incidunt, eum.</p>
        </div>
    </div>
</section>

<?php 
    $sql = "SELECT * FROM produk";
    $mysql = mysqli_query($dbconnect,$sql);
 ?>
<section class="portfolio">
    <div class="col-md-12 text-center">
        <h2>Produk</h2>
        <hr>
    </div>
    <div class="row text-center">        
        <?php while ($rows = $mysql->fetch_assoc()) : ?>
        <div class="col-sm-3">
            <div class="img-thumbnail">
                <img src="../foto_produk/<?= $rows['gambar_produk'] ?>" alt="" width="180">
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</section>