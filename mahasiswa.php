<?php
// define endpoint api
$url = 'http://127.0.0.1:8000/api/mahasiswa';
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
        <div class="row">
            <div class="col-md-12">
                <h1>Data Mahasiswa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
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
                                <td>
                                    <a href="detailNilai.php?nim=<?= $row['nim']; ?>" class="btn btn-success">Detail Nilai</a>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <a href="do/deleteMahasiswa.php?nim=<?= $row['nim']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="addMahasiswa.php" class="btn btn-primary">Tambah Mahasiswa</a>
                <a href="viewAll.php" class="btn btn-outline-danger">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>