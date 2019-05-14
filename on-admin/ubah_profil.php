<style>
    form {
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        text-decoration: none;
        color: white;
    }
</style>
<h2>Ubah Profil</h2>
<?php
$query = mysqli_query($dbconnect, "SELECT * FROM users WHERE id_user = '$_GET[id]'");
$row = mysqli_fetch_assoc($query);
?>

<form method="post" enctype="multipart/form-data" role="form">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" readonly>
    </div>
    <div class="form-group">
        <img src="../foto_profil/<?= $row['foto_profil'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto">
    </div>
    <button class="btn btn-primary" onClick="return konfirmasi();" name="ubah"><i class="fa fa-pencil"></i> ubah</button>
    <a href="?page=profil&id=<?= $row['id_user'] ?>"><span class="btn btn-danger ">batal</></a>
</form>

<?php

if (isset($_POST['ubah'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];

    // jk foto diubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../foto_profil/$namafoto");

        $dbconnect->query("UPDATE users SET nama = '$nama', username = '$username', foto_profil = '$namafoto' WHERE id_user ='$_GET[id]'");
    } else {
        $dbconnect->query("UPDATE users SET nama = '$nama', username = '$username' WHERE id_user ='$_GET[id]'");
    }



    echo "<script>alert('data berhasil diubah, Data akan berubah setelah anda login kembali')</script>";
    echo "<script>location= 'index.php'</script>";
}

?> 