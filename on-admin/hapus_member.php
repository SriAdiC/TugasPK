<?php

$query = $dbconnect->query("SELECT id_user, nama,username FROM users WHERE id_user = '$_GET[id]'");
$row = $query->fetch_assoc();

$dbconnect->query("DELETE FROM users WHERE id_user = '$_GET[id]'");

echo "<script>alert('member telah dihapus')</script>";
echo "<script>location ='?page=pelanggan'</script>";

?>