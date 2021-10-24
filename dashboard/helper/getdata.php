<?php

/*Get Data Cuaca */
function getcuaca($kota = null)
{
  $data = array(
    'lamongan' => '501285',
    'bojonegoro' => '501277',
    'tuban' => '501308'
  );
  $urlget = "https://ibnux.github.io/BMKG-importer/cuaca/";
  $lamongan = file_get_contents($urlget . $data['lamongan'] . ".json");
  $tuban = file_get_contents($urlget . $data['tuban'] . ".json");
  $bojonegoro = file_get_contents($urlget . $data['bojonegoro'] . ".json");
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
    $icondata = str_replace(" ", "_", strtolower($icon));
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
            $datafinal[] = "<div class='col-width-full id-501397'>
            <div class='carousel-block-table prakicu-kota'>
              <div class='service-block bg-cuaca cerah-berawan-" . getzone($jam) . "'>
                <h2 class='kota'>" . strtoupper($kota) . "</h2>
                <p>$jam&nbsp;WIB</p>
                <img src='./asset/cuaca/" . geticon($datanya['cuaca']) . "' alt='berawan'>
                <p>" . $datanya['cuaca'] . "</p>
                <h2 class='heading-md'>" . $datanya['tempC'] . "&deg;C</h2>
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
  return getcard('bojonegoro');
}
function tuban()
{
  return getcard('tuban');
}
function lamongan()
{
  return getcard('lamongan');
}


/* End Get Data Cuaca */
//Start Get data gempa
//Source API : https://gempa-api.herokuapp.com/
/* Response : {"sumberData":"BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)","gempaTerkini":{"detail":"Gempa Bumi yang baru saja terjadi","url":"http://gempa-api.herokuapp.com/gempa/terkini","shakemapBaseUrl":"https://data.bmkg.go.id/DataMKG/TEWS/[:idShakemap]"},"gempaDirasakan":{"detail":"15 gempa bumi terbaru yang dirasakan","url":"http://gempa-api.herokuapp.com/gempa/dirasakan"},"gempaMag5":{"detail":"15 gempa bumi dengan magnitudo > 5.0","url":"http://gempa-api.herokuapp.com/gempa/magnitudo"}} */
function getgempaterkini()
{
  $datagempaterkini = file_get_contents("https://gempa-api.herokuapp.com/gempa/terkini");
  return $datagempaterkini;
}
//End Get Data Gempa
//Get Peringatan Dini gelombang
function gelombangdini()
{
  $getdata = file_get_contents("https://peta-maritim.bmkg.go.id/public_api/perairan/I.06_Perairan%20Tuban%20-%20Lamongan.json");
  return json_decode($getdata,true);
}
