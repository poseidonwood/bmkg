<?php
date_default_timezone_set("Asia/Jakarta");
$filename = './asset/logs/counter.txt';	//mendefinisikan nama file untuk menyimpan counter

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

function counter(){		//function counter
  global $filename;	//set global variabel $filename

  if(file_exists($filename)){		//jika file counter.txt ada
    $value = file_get_contents($filename);	//set value = nilai di notepad
  }else{		//jika file counter.txt tidak ada maka akan membuat file counter.txt
    $value = 0;		//kemudian set value = 0
  }

  file_put_contents($filename, ++$value);		//menuliskan kedalam file counter.txt value+1
}

// echo tanggal_indo('2016-03-20'); // Hasil: 20 Maret 2016;
// echo tanggal_indo('2016-03-20', true); // Hasil: Minggu, 20 Maret 2016
