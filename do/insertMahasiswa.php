<?php
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $url = 'http://127.0.0.1:8000/api/mahasiswa';

    $data = array(
        'nim' => $nim,
        'nama' => $nama,
        'alamat' => $alamat,
        'tanggal_lahir' => $tanggal_lahir,
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

    header('Location: ../mahasiswa.php');
}
