<?php
$kode_mk = $_GET['kode_mk'];

$url = 'http://127.0.0.1/sait-backend/matkul-api.php?kode_mk=' . $kode_mk;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

if ($result['status'] == 1) {
    success();
} else {
    failed();
}
function success()
{
    header('Location: ../matkul.php');
    exit();
}

function failed()
{
    echo "Gagal menghapus data";
}
