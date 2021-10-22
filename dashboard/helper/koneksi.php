<?php
// source code by ilman sunanuddin
// documentasi https:/m-pedia.id
$host = "localhost";
$username = "root";
$password = "";
$db = "bmkg_tuban";

$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");

// $base_url = "http://localhost/company-master/dashboard/";
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
// $config['base_url'] = $prot . $host . "/";
$base_url  = $prot . $_SERVER['HTTP_HOST'] .
  str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
