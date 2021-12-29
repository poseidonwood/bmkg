<?php

include("../../config.php");
if($mode == "production"){
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "bmkg_tuban";
}else{
	$host = "localhost";
	$username = "cuacatu1_wp670";
	$password = "Met96939";
	$db = "cuacatu1_wp670";

}

$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");
date_default_timezone_set('Asia/Jakarta');
