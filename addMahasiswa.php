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
                <h1>Tambah Mahasiswa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="do/insertMahasiswa.php" method="post">
                    <div class="form-group row" style="margin: 10px;">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nim" name="nim" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <a href="mahasiswa.php" class="btn btn-outline-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>