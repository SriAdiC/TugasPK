<h2>Ubah Produk</h2>
<?php
$query = $dbconnect->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$row = $query->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $row['nama_produk'] ?>">
    </div>
    <div class="form-group">
        <label>Harga (Rp.)</label>
        <input type="number" name="harga" class="form-control" value="<?= $row['harga_produk'] ?>">
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?= $row['gambar_produk'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto">
    </div>
    <button class="btn btn-primary" onClick="return konfirmasi();" name="ubah"><i class="fa fa-pencil"></i> ubah</button>
    <button class="btn btn-danger" name="batal">batal</button>

</form>

<?php

if (isset($_POST['ubah'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    // jk foto diubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

        $dbconnect->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', gambar_produk='$namafoto' WHERE id_produk ='$_GET[id]'");
    } else {
        $dbconnect->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]' WHERE id_produk ='$_GET[id]'");
    }



    echo "<script>alert('data diubah')</script>";
    echo "<script>location= 'index.php?page=produk'</script>";
}

if (isset($_POST['batal'])) {
    echo "<script>
           location = 'index.php?page=produk';
        </script>";
}

?> 