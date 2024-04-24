<?php
function fetchData($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

$nim = $_GET['nim'];

$url = 'http://127.0.0.1:8000/api/perkuliahan/' . $nim;
$data = fetchData($url);

$url_mahasiswa = 'http://127.0.0.1:8000/api/mahasiswa/' . $nim;
$data_mahasiswa = fetchData($url_mahasiswa);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>UTS SAIT</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Nilai</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table style="width: 25%;">
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $data_mahasiswa['data'][0]['nim']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $data_mahasiswa['data'][0]['nama']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table" style="width: 75%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>SKS</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data['data'] as $row) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?= $row['kode_mk']; ?></td>
                                <td><?= $row['mata_mk']; ?></td>
                                <td><?= $row['sks']; ?></td>
                                <td><?= $row['nilai']; ?></td>
                                <td>
                                    <a href="updateNilai.php?nim=<?= $data['data'][0]['nim']; ?>&kode_mk=<?= $row['kode_mk'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="do/deleteNilai.php?nim=<?= $data['data'][0]['nim']; ?>&kode_mk=<?= $row['kode_mk'] ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="addNilai.php?nim=<?= $data_mahasiswa['data'][0]['nim']; ?>" class="btn btn-primary">Tambah Nilai</a>
                <a href="mahasiswa.php" class="btn btn-outline-danger">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>