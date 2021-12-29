<?php
// source code by ilman sunanuddin
// documentasi https:/m-pedia.id
$host = "localhost";
$username = "root";
$password = "";
$db = "bmkg_tuban";

$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");
date_default_timezone_set('Asia/Jakarta');
