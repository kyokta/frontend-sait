<?php
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $kode_mk = $_POST['matkul'];
    $nilai = $_POST['nilai'];

    $url = 'http://127.0.0.1:8000/api/perkuliahan';

    $data = array(
        'nim' => $nim,
        'kode_mk' => $kode_mk,
        'nilai' => $nilai
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

    header('Location: ../detailNilai.php?nim=' . $nim);
}
?>