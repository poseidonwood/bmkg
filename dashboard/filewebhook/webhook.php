<?php
require_once('../helper/koneksi.php');
// ------------------------------------------------------------------//
header('content-type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
file_put_contents('whatsapp.txt', '[' . date('Y-m-d H:i:s') . "]\n" . json_encode($data) . "\n\n", FILE_APPEND);
$message = $data['message']; // ini menangkap pesan masuk
$from = $data['from']; // ini menangkap nomor pengirim pesan


if (strtolower($message) == 'mau tanya') {
    $result = [
        'mode' => 'chat', // mode chat = chat biasa
        'pesan' => 'gunakan formatnya'
    ];
} else if (strtolower($message) == 'hallo') {
    $result = [
        'mode' => 'reply', // mode reply = reply pessan
        'pesan' => 'Halo juga'
    ];
} else if (strtolower($message) == 'gambar') {
    $result = [
        'mode' => 'picture', // type picture = kirim pesan gambar
        'data' => [
            'caption' => 'webhook picture',
            'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZ2Ox4zgP799q86H56GbPMNWAdQQrfIWD-Mw&usqp=CAU'
        ]
    ];
} else {
    $result = [
        'mode' => 'chat', // mode chat = chat biasa
        'pesan' => 'Selamat datang di Wa-Center Satgas Covid 19 Kota Tegal Silahkan-Ketikan Angka Info yang dibutuhkan : 1.Vaksin, 2. RS, 3.Puskesmas, 4.Plasma Darah, 5. Bansos, 6. Ambulance,  7.PSC 119 Pertolongan Lainnya'
    ];
}
print json_encode($result);
