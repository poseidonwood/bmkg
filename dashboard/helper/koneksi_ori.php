<?php
// source code by ilman sunanuddin
// documentasi https:/m-pedia.id
$host = "localhost";
$username = "bmkg_tuban";
$password = "bmkg_tuban";
$db = "bmkg";

$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");
date_default_timezone_set('Asia/Jakarta');
$isSSL = function () {
  if (!empty($_SERVER['https']))
    return true;

  if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
    return true;

  if (!isset($_SERVER['SERVER_PORT']))
    return false;

  if ($_SERVER['SERVER_PORT'] == 443)
    return true;

  return false;
};

$prot = $isSSL() ? 'https://' : 'http://';
$dashboard_url  = $prot ."localhost/bmkg/dashboard/";
