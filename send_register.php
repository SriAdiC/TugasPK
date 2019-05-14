<?php
if (isset($_POST['nickname']) && $_POST['nickname']) {
    // memasukan file koneksi ke database
    require_once 'config.php';
    // menyimpan variable yang dikirim Form
    $nama = $_POST['nickname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    // $level = $_POST['level'];
    // cek nilai variable
    if (empty($nama)) {
        header('location: ./register.php?error=' .base64_encode('tidak boleh kosong'));
    } else
    if (empty($username)) {
        header('location: ./register.php?error=' .base64_encode('tidak boleh kosong'));
    } elseif (empty($password)) {
        header('location: ./register.php?error=' .base64_encode('tidak boleh kosong'));
    }
    // if (empty($level)) {
    //     header('location: ./register.php?error=' .base64_encode('Level tidak boleh kosong'));
    // }
    // if ($level == 'admin') {
    //     header('location: ./login.php?success=' .base64_encode('Anda telah menjadi ' .$level));   
    // } else if ($level == 'member'){
    //    
    // }
    // validasi apakah password dengan repassword sama
    if ($password != $repassword) { // jika tidak sama
        header('location: ./register.php?error=' .base64_encode('Re-Password harus sama dengan Password'));   
    }
    
    // encryption dengan md5
    $password = md5($password);
    $level = 'member'; // default, 
    // SQL Insert
    $sql = "INSERT INTO users (nama, username, password, level_user) VALUES ('$nama', '$username', '$password', '$level')";
    $insert = $dbconnect->query($sql);
    // jika gagal
    if (! $insert) {
        echo "<script>alert('".$dbconnect->error."'); window.location.href = './register.php';</script>";
    } else {
         header('location: ./login.php?success=' .base64_encode('Anda telah menjadi member'));
    }
}
?>