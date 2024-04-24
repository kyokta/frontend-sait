<?php
// define endpoint api
$url = 'http://127.0.0.1:8000/api/perkuliahan';
$headers = array(
    'Content-Type: application/json'
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
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
        <div class="row" style="margin-top: 20px;">
            <div class="col-12">
                <h1>DATA NILAI MAHASISWA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="mahasiswa.php" class="btn btn-outline-success">Data Mahasiswa</a>
                <a href="matkul.php" class="btn btn-outline-success">Data Mata Kuliah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>SKS</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data['data'] as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?= $row['nim']; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= date('d F Y', strtotime($row['tanggal_lahir'])); ?></td>
                                <td><?= $row['kode_mk']; ?></td>
                                <td><?= $row['mata_mk']; ?></td>
                                <td><?= $row['sks']; ?></td>
                                <td><?= $row['nilai']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>