<?php
$nim = $_GET['nim'];
$kode_mk = $_GET['kode_mk'];

$url = 'http://127.0.0.1:8000/api/perkuliahan/delete/' . $nim . '/' . $kode_mk;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

if ($response) {
    header('Location: ../detailNilai.php?nim=' . $nim);
}
