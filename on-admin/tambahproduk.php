<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">

<div class="form-group">
    
    <label>Nama</label>
    <input type="text" class="form-control" name="nama">
    
</div>
<div class="form-group">
    
    <label>Harga (Rp.)</label>
    <input type="number" class="form-control" name="harga">
    
</div>
<div class="form-group">
    
    <label>Foto</label>
    <input type="file" name="foto">
    
</div>
    <button class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
    <a href="?page=produk" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>

    
</form>
<?php 
if(isset($_POST['save'])){
    $nama = $_FILES['foto']['name'];
    $lokasi =$_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../foto_produk/".$nama);
    $isi = $dbconnect->query("INSERT INTO produk (nama_produk, harga_produk, gambar_produk) VALUES ('$_POST[nama]','$_POST[harga]','$nama')");

    if(!$isi){
        echo "<script>alert('".$dbconnect->error."'); window.location.href = '?page=produk.php';</script>";
    }
    else{
        echo "<meta http-equiv='refresh' content='1;url=index.php?page=produk&success='>";

    }

}

?>
