<?php
if (isset($_POST['submit'])) {
    $kode_mk = $_POST['kode_mk'];
    $mata_mk = $_POST['mata_mk'];
    $sks = $_POST['sks'];

    $url = 'http://127.0.0.1:8000/api/matakuliah';

    $data = array(
        'kode_mk' => $kode_mk,
        'mata_mk' => $mata_mk,
        'sks' => $sks,
    );

    $data_string = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        )
    );

    $response = curl_exec($ch);
    $result = json_decode($response, true);
    curl_close($ch);
    var_dump($result);

    // header('Location: ../matkul.php');
}
