<?php
// define endpoint api
$url = 'http://127.0.0.1/sait-backend/matkul-api.php';
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
                <h1>Data Mata Kuliah</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
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
                                <td><?= $row['kode_mk']; ?></td>
                                <td><?= $row['mata_mk']; ?></td>
                                <td><?= $row['sks']; ?></td>
                                <td>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <a href="do/deleteMatkul.php?kode_mk=<?= $row['kode_mk']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="addMatkul.php" class="btn btn-primary">Tambah Mata Kuliah</a>
                <a href="viewAll.php" class="btn btn-outline-danger">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>