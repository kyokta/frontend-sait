<?php

if (isset($_POST['submit'])) {

    $nim = $_POST['nim'];
    $kode_mk = $_POST['kode_mk'];
    $nilai = $_POST['nilai'];

    $url = 'http://127.0.0.1:8000/api/perkuliahan/'. $nim .'/'. $kode_mk;

    $ch = curl_init($url);
    $jsonData = array(
        'nilai' =>  $nilai,
    );

    $jsonDataEncoded = json_encode($jsonData);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $result = curl_exec($ch);
    $result = json_decode($result, true);
    curl_close($ch);

    header('Location: ../detailNilai.php?nim=' . $nim);
}
