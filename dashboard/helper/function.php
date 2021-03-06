<?php
include_once("koneksi.php");
session_start();
$name_web = getSingleValDB("setting_web","id","1","name");
$mode = getSingleValDB("setting_web","id","1","mode");
$path_img = getSingleValDB("setting_web","id","1","path_img");
$filename = '../../../asset/logs/counter.txt';	//mendefinisikan nama file untuk menyimpan counter

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
$main_url = $prot.getSingleValDB("setting_web","id","1","main_url");
$dashboard_url = $prot.getSingleValDB("setting_web","id","1","dashboard_url");

function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array(
    1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );

  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split     = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}


function curldata($url)
{
  //  Initiate curl
  $ch = curl_init();
  // Will return the response, if false it print the response
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // Set the url
  curl_setopt($ch, CURLOPT_URL,$url);
  // Execute
  $result=curl_exec($ch);
  // Closing
  curl_close($ch);

  // Will dump a beauty json :3
  // var_dump(json_decode($result, true));
  return $result;
}
function counter(){		//function counter
  global $filename;	//set global variabel $filename

  if(file_exists($filename)){		//jika file counter.txt ada
    $value = file_get_contents($filename);
    // $value = curldata1($filename);	//set value = nilai di notepad
  }else{		//jika file counter.txt tidak ada maka akan membuat file counter.txt
    $value = 0;		//kemudian set value = 0
  }

  file_put_contents($filename, ++$value);		//menuliskan kedalam file counter.txt value+1
}

function get($param)
{
  global $koneksi;
  $d = isset($_GET[$param]) ? $_GET[$param] : null;
  $d = mysqli_real_escape_string($koneksi, $d);
  $d = filter_var($d, FILTER_SANITIZE_STRING);
  return $d;
}

function post($param)
{
  global $koneksi;
  $d = isset($_POST[$param]) ? $_POST[$param] : null;
  $d = mysqli_real_escape_string($koneksi, $d);
  $d = filter_var($d, FILTER_SANITIZE_STRING);
  return $d;
}

function login($u, $p)
{
  global $koneksi;
  $p = sha1($p);
  $q = mysqli_query($koneksi, "SELECT * FROM account WHERE username='$u' AND password='$p'");

  if (mysqli_num_rows($q)) {
    $status = getSingleValDB("account","username",$u,"status");
    if($status == "0"){
      $data = array(
        'status' => false,
        'message' => "Akun anda tidak aktif, Hub admin"
      );
      return $data;
    }else{
      $_SESSION['login'] = true;
      $_SESSION['username'] = $u;
      $_SESSION['level'] = getSingleValDB("account", "username", $u, "level");
      return true;
    }
  } else {
    return false;
  }
}

function cekSession()
{
  $login = isset($_SESSION['login']) ? $_SESSION['login'] : null;
  if ($login == true) {
    return 1;
  } else {
    return 0;
  }
}

function getSingleValDB($table, $where, $param, $target)
{
  global $koneksi;
  $q = mysqli_query($koneksi, "SELECT * FROM `$table` WHERE `$where`='$param'");
  $row = mysqli_fetch_assoc($q);
  return $row[$target];
}
function getSingleRowDB($table, $where, $param)
{
  global $koneksi;
  $q = mysqli_query($koneksi, "SELECT * FROM `$table` WHERE `$where`='$param'");
  $row = mysqli_fetch_assoc($q);
  return $row;
}

function countDB($table, $where = null, $param = null)
{
  global $koneksi;
  if ($where == null && $param == null) {
    $q = mysqli_query($koneksi, "SELECT * FROM `$table`");
  } else {
    $q = mysqli_query($koneksi, "SELECT * FROM `$table` WHERE `$where`='$param'");
  }
  $row = mysqli_num_rows($q);
  return $row;
}

function countPresentase()
{
  $a = countDB("pesan", "status", "TERKIRIM");
  $b = countDB("pesan");
  if ($a > 0) {
    return (countDB("pesan", "status", "TERKIRIM") / countDB("pesan")) * 100;
  } else {
    return 0;
  }
}
//Query Function
function getDataByTable($table = NULL,$limit = NULL,$condition = NULL)
{
  if($table == null){
    $data = array(
      'status' => false,
      'message' => "table is null"
    );
  }else{
    global $koneksi;
    $datalist = [];
    if($limit !== NULL){
      $limit = "limit $limit";
    }
    if($condition !== NULL){
      $condition = "where ".$condition;
    }
    $query = "SELECT * FROM `$table` $condition order by `id` DESC $limit";
    $q = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_assoc($q)) {
      array_push($datalist, $row);
    }
    $data = array(
      'status' => true,
      'message' => $datalist
    );
  }
  return $data;
}
//
function getAllNumberandmessage()
{
  global $koneksi;
  $q = mysqli_query($koneksi, "SELECT * FROM `nomor`");
  $arr = [];
  while ($row = mysqli_fetch_assoc($q)) {
    array_push($arr, $row);
  }
  return $arr;
}

function getLastID($table)
{
  global $koneksi;
  $q = mysqli_query($koneksi, "SELECT * FROM `$table` ORDER BY id DESC LIMIT 1");
  $row = mysqli_fetch_assoc($q);
  return $row['id'];
}

function url_wa()
{
  global $dashboard_url;
  return $dashboard_url; // untuk di hosting
  //return 'http://localhost:3000/'; // untuk di local
}

function api_key($username)
{
  return getSingleValDB("account", "username", "$username", "api_key");
}

function redirect($target)
{
  echo '
  <script>
  window.location = "' . $target . '";
  </script>
  ';
  exit;
}

function toastr_set($status, $msg)
{
  $_SESSION['toastr'] = true;
  $_SESSION['toastr_status'] = $status;
  $_SESSION['toastr_msg'] = $msg;
}

function toastr_show()
{
  $t = isset($_SESSION['toastr']) ? $_SESSION['toastr'] : null;
  $t_s = isset($_SESSION['toastr_status']) ? $_SESSION['toastr_status'] : null;
  $t_m = isset($_SESSION['toastr_msg']) ? $_SESSION['toastr_msg'] : null;
  if ($t == true) {
    if ($t_s == "success") {
      echo "
      toastr.success('Sukses', '" . $t_m . "');
      ";
    }

    if ($t_s == "error") {
      echo "
      toastr.error('Kesalahan', '" . $t_m . "');
      ";
    }

    unset($_SESSION['toastr']);
    unset($_SESSION['toastr_status']);
    unset($_SESSION['toastr_msg']);
  }
}

function sendMSG($number, $msg, $sender)
{
  $url = "http://localhost:3000/send-message";  // jika instal di local
  // $url = url_wa() . 'send-message';
  $data = [
    "sender" => $sender,
    "number" => $number,
    "message" => $msg
  ];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_URL, $url);
  //  curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $result = curl_exec($ch);
  curl_close($ch);
  return json_decode($result, true);
}

function sendMedia($number, $message, $sender, $filetype, $filename, $urll)
{
  $url = "http://localhost:3000/send-media";  // jika instal di local
  // $url = url_wa() . 'send-media';
  $data = [
    'sender' => $sender,
    'number' => $number,
    'caption' => $message,
    'url' => $urll,
    'filename' => $filename,
    'filetype' => $filetype,
  ];
  //var_dump($data); die;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $result = curl_exec($ch);
  curl_close($ch);
  return json_decode($result, true);
}

function cekStatusWA()
{
  $url = url_wa() . "/status";

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  //curl_setopt($curl, CURLOPT_POST, 1);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
  $response = curl_exec($curl);
  return json_decode($response, true);
}

function updateStatusMSG($id, $a)
{
  global $koneksi;
  $q = mysqli_query($koneksi, "UPDATE pesan SET status='$a' WHERE id='$id'");
}

function base64upload($base64_string, $output_file)
{
  $file = fopen($output_file, "wb");

  $data = explode(',', $base64_string);

  fwrite($file, base64_decode($data[1]));
  fclose($file);

  return $output_file;
}

function phoneToStandard($nomor)
{
  $nomor = explode("@", $nomor)[0];
  $nomor = substr($nomor, 2);
  $nomor = "0" . $nomor;

  return $nomor;
}

function sendApiUrl()
{
  global $dashboard_url;
  return $dashboard_url . "api/send.php?key=" . getSingleValDB("pengaturan", "id", "1", "api_key");
}

function syncMSG()
{
  global $koneksi;
  $url = url_wa() . "/getChat";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($curl);
  $res = json_decode($response, true);
  $final = [];
  $arr_p = [];
  foreach ($res['response'] as $sender) {
    foreach ($sender as $s) {
      $id_pesan = $s['id']['id'];
      if (checkExist("receive_chat", "id_pesan", $id_pesan) == false) {
        if ($s["fromMe"] == true) {
          $nomor = phoneToStandard($s['to']);
          $fromme = "1";
        } else {
          $nomor = phoneToStandard($s['from']);
          $fromme = "0";
        }
        if (in_array($nomor, $arr_p)) {
        } else {
          $final[$nomor] = [];
          array_push($arr_p, $nomor);
        }
        $pesan = $s['body'];
        $tanggal = date("Y-m-d H:i:s", $s['timestamp']);
        $ret = [
          'id' => $id_pesan,
          'nomor' => $nomor,
          'pesan' => $pesan,
          'fromMe' => $fromme,
          'tanggal' => $tanggal
        ];

        $nomor_saya = getSingleValDB("pengaturan", "id", "1", "nomor");

        $q = mysqli_query($koneksi, "INSERT INTO receive_chat(`id_pesan`, `nomor`, `pesan`, `tanggal`, `from_me`, `nomor_saya`)
        VALUE('$id_pesan', '$nomor', '$pesan', '$tanggal', '$fromme', '$nomor_saya')");

        array_push($final[$nomor], $ret);
      }
    }
  }
}

function getContact()
{
  global $koneksi;

  $nomor_saya = getSingleValDB("pengaturan", "id", "1", "nomor");
  $q = mysqli_query($koneksi, "SELECT DISTINCT nomor, MAX(tanggal) FROM receive_chat WHERE nomor_saya='$nomor_saya' GROUP BY nomor ORDER BY MAX(tanggal) DESC");
  return $q;
}

function getLastMsg($nomor)
{
  global $koneksi;

  $nomor_saya = getSingleValDB("pengaturan", "id", "1", "nomor");
  $q = mysqli_query($koneksi, "SELECT * FROM receive_chat WHERE nomor='$nomor' AND nomor_saya='$nomor_saya' ORDER BY tanggal DESC LIMIT 1");
  $row = mysqli_fetch_assoc($q);
  if (date("Y-m-d", strtotime($row['tanggal'])) == date("Y-m-d")) {
    $row['tanggal'] = date("H:i", strtotime($row['tanggal']));
  } else {
    $row['tanggal'] = date("d M y H:i", strtotime($row['tanggal']));
  }
  return $row;
}

function checkExist($table, $where, $param)
{
  global $koneksi;
  $q = mysqli_query($koneksi, "SELECT * FROM `$table` WHERE `$where`='$param' LIMIT 1");
  $row = mysqli_num_rows($q);
  if ($row == 0) {
    return false;
  } else {
    return true;
  }
}

function callback($id_pesan, $nomor, $pesan, $tanggal, $nomor_saya)
{
  $url = getSingleValDB("pengaturan", "id", "1", "callback");

  if ($url != null) {
    $data = [
      "id_pesan" => $id_pesan,
      "nomor" => $nomor,
      "pesan" => $pesan,
      "tanggal" => $tanggal,
      "nomor_saya" => $nomor_saya
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    return json_decode($response, true);
  }
}

function cekNomorWhatsapp($number)
{
  $url = url_wa() . "/cek-nomor";
  $data = [
    "number" => $number
  ];

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($curl);
  $r = json_decode($response, true);
  return $r['status'];
}
/*Get Data Cuaca */
function getcuaca($kota = null)
{
  $data = array(
    'lamongan' => '501285',
    'bojonegoro' => '501277',
    'tuban' => '501308'
  );
  $urlget = "https://ibnux.github.io/BMKG-importer/cuaca/";
  // $lamongan = file_get_contents($urlget . $data['lamongan'] . ".json");
  // $tuban = file_get_contents($urlget . $data['tuban'] . ".json");
  // $bojonegoro = file_get_contents($urlget . $data['bojonegoro'] . ".json");
  $lamongan = curldata($urlget . $data['lamongan'] . ".json");
  $tuban = curldata($urlget . $data['tuban'] . ".json");
  $bojonegoro = curldata($urlget . $data['bojonegoro'] . ".json");

  if (strtolower($kota) == "lamongan") {
    return $lamongan;
  } else if (strtolower($kota) == "tuban") {
    return $tuban;
  } else if (strtolower($kota) == "bojonegoro") {
    return $bojonegoro;
  } else {
    return json_encode(array('status' => false, 'message' => 'fail'));
  }
}
function getzone($jamv = null)
{
  //ambil jam dan menit
  if ($jamv == null) {
    $jam = date('H:i');
  } else {
    $jam = $jamv;
  }
  if ($jam > '05:30' && $jam < '18:00') {
    $zone = "siang";
  } else {
    $zone = "malam";
  }
  return $zone;
}
function geticon($icon = null)
{
  if ($icon == null) {
    return json_encode(array('status' => false, 'message' => 'Cant Null'));
  } else {
    if($icon == "Berkabut"){
      $icondata = "asap_kabut";
    }else{
      $icondata = str_replace(" ", "_", strtolower($icon));
    }
    $img = "ic_$icondata" . "_" . getzone() . ".png";
    return $img;
  }
}
function getcard($kota = null)
{
  $datenow = date('Y-m-d');
  if ($kota == null) {
    echo json_encode(array('status' => false, 'message' => 'Kota NULL'));
  } else {
    //get data
    $dataraw = json_decode(getcuaca($kota), true);
    if (!isset($dataraw['status'])) {
      if (is_array($dataraw)) {
        foreach ($dataraw as $datanya) {
          // {"jamCuaca":"2021-10-20 18:00:00","kodeCuaca":"1","cuaca":"Cerah Berawan","humidity":"90","tempC":"24","tempF":"75"}
          if (date('Y-m-d', strtotime($datanya['jamCuaca'])) == $datenow || $datanya['cuaca'] !== "") {
            $jam = date('H:i', strtotime($datanya['jamCuaca']));
            // $datafinal = array();

            if($datanya['kodeCuaca'] == "0"){
              $datafinal[] = NULL;
            }else{
              $datafinal[] = "<div class='col-width-full id-501397'>
              <div class='carousel-block-table prakicu-kota'>
              <div class='service-block bg-cuaca cerah-berawan-" . getzone($jam) . "'>
              <h2 class='kota'>" . strtoupper($kota) . "</h2>
              <p>$jam&nbsp;WIB</p>
              <img src='./asset/cuaca/" . geticon($datanya['cuaca']) . "' alt='{$datanya['cuaca']}'>
              <p>" . $datanya['cuaca'] . "</p>
              <h2 class='heading-md'>{$datanya['tempC']}&deg;C</h2>
              <a class='link-block' href='#'></a>
              <svg class='more-arrow' width='20px' height='20px' viewBox='0 0 54 54' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
              <g id='right-arrow-svgrepo-com'>
              <g id='Group' fill='#FFA500'>
              <path d='M27,53 C12.641,53 1,41.359 1,27 C1,12.641 12.641,1 27,1 C41.359,1 53,12.641 53,27 C53,41.359 41.359,53 27,53 Z' id='Path'></path>
              <path d='M27,54 C12.112,54 0,41.888 0,27 C0,12.112 12.112,0 27,0 C41.888,0 54,12.112 54,27 C54,41.888 41.888,54 27,54 Z M27,2 C13.215,2 2,13.215 2,27 C2,40.785 13.215,52 27,52 C40.785,52 52,40.785 52,27 C52,13.215 40.785,2 27,2 Z' id='Shape' fill-rule='nonzero'></path>
              </g>
              <path d='M22.294,40 C22.038,40 21.782,39.902 21.587,39.707 C21.196,39.316 21.196,38.684 21.587,38.293 L32.88,27 L21.587,15.707 C21.196,15.316 21.196,14.684 21.587,14.293 C21.978,13.902 22.61,13.902 23.001,14.293 L34.499,25.791 C35.166,26.458 35.166,27.542 34.499,28.209 L23.001,39.707 C22.806,39.902 22.55,40 22.294,40 Z' id='Path' stroke='#FFFFFF' stroke-width='3' fill='#FFFFFF'></path>
              </g>
              </g>
              </svg>
              </div>
              </div>
              </div>";
            }
          }
        }
        return implode("", $datafinal);
        // echo json_encode($datafinal);
        // echo json_encode($datanya);
      } else {
        echo json_encode(array('status' => false, 'message' => 'Kota Salah'));
      }
    } else {
      echo json_encode($dataraw);
    }
  }
}
function bojonegoro()
{
  global $mode;
  if($mode == "developt"){
    return null;
  }else{
    return getcard('bojonegoro');
  }
}
function tuban()
{
  global $mode;
  if($mode == "developt"){
    return null;
  }else{
    return getcard('tuban');
  }
}
function lamongan()
{
  global $mode;
  if($mode == "developt"){
    return null;
  }else{
    return getcard('lamongan');
  }
}


/* End Get Data Cuaca */
//Start Get data gempa
//Source API : https://gempa-api.herokuapp.com/
/* Response : {"sumberData":"BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)","gempaTerkini":{"detail":"Gempa Bumi yang baru saja terjadi","url":"http://gempa-api.herokuapp.com/gempa/terkini","shakemapBaseUrl":"https://data.bmkg.go.id/DataMKG/TEWS/[:idShakemap]"},"gempaDirasakan":{"detail":"15 gempa bumi terbaru yang dirasakan","url":"http://gempa-api.herokuapp.com/gempa/dirasakan"},"gempaMag5":{"detail":"15 gempa bumi dengan magnitudo > 5.0","url":"http://gempa-api.herokuapp.com/gempa/magnitudo"}} */
function getgempaterkini()
{
  global $mode;
  if($mode == "developt"){
    return null;
  }else{
    $datagempaterkini = curldata("https://gempa-api.herokuapp.com/gempa/terkini");
    return $datagempaterkini;
  }

}
function listgempadirasakan()
{
  global $mode;
  if($mode == "developt"){
    return null;
  }else{
    $datagempadirasakan = curldata("http://gempa-api.herokuapp.com/gempa/dirasakan");
    return $datagempadirasakan;
  }
}
//End Get Data Gempa
//Get Peringatan Dini gelombang
function gelombangdini()
{
  global $mode;
  if($mode == "developt"){
    return null;
  }else{
    $getdata = curldata("https://peta-maritim.bmkg.go.id/public_api/perairan/I.06_Perairan%20Tuban%20-%20Lamongan.json");
    return json_decode($getdata,true);
  }
}
