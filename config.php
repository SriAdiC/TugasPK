<?php
/**
 * $dbconnect : koneksi kedatabase
 */
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'adi'); //NAMA DATABASE


$dbconnect = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
    die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}
