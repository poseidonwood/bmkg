<?php
include_once("../helper/koneksi.php");
include_once("../helper/function.php");
// script by mpedia.id , email ilmansunannudin2@gmail.com or whatsapp 082298859671 for support.
$count = 0;
$now = strtotime(date("Y-m-d H:i:s"));
$chunk = 100;
$q = mysqli_query($koneksi, "SELECT * FROM pesan WHERE UNIX_TIMESTAMP(jadwal) <= '$now' AND status='MENUNGGU JADWAL' ORDER BY id ASC LIMIT 100 ");
//var_dump($q->fetch_assoc()); die;
$i = 0;
while ($data = $q->fetch_assoc()) {
    $sender = $data['sender'];
    $nomor = $data['nomor'];
    $pesan = $data['pesan'];
    if ($data['media'] == null) {
        $send = sendMsg($nomor, $pesan, $sender);
        if ($send['status'] == "true") {
            $i++;
            $this_id = $data['id'];
            $q3 = mysqli_query($koneksi, "UPDATE pesan SET status = 'TERKIRIM' WHERE id='$this_id'");
        } else {
            $s = false;
        }
        sleep(2);
    }
}
echo 'succes kirim ke' . $i . 'Nomor';
