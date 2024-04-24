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
$kode_mk = $_GET['kode_mk'];

$url = 'http://127.0.0.1:8000/api/perkuliahan/'. $nim .'/'. $kode_mk;
$data = fetchData($url);
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
                <h1>Update Nilai Mahasiswa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="do/updateNilai.php" method="post">
                    <?php 
                    foreach ($data['data'] as $row) {
                    ?>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control-plaintext" name="nim" value="<?= $row['nim']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control-plaintext" name="nama" value="<?= $row['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="alamat" class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-4">
                            <input type="hidden" class="form-control-plaintext" name="kode_mk" value="<?= $row['kode_mk']?>">
                            <input type="text" class="form-control-plaintext" name="mata_mk" value="<?= $row['mata_mk']?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="nilai" name="nilai" value="<?= $row['nilai']; ?>">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <a href="detailNilai.php" class="btn btn-outline-danger">Kembali</a>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>