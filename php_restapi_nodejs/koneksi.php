<?php
$hostname = "localhost";
$database = "db_crud";
$username = "root";
$password = "admindatabase";
$connect = mysqli_connect($hostname, $username, $password, $database);
// script cek koneksi   
if (!$connect) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}