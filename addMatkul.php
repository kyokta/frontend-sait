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
                <h1>Tambah Mata Kuliah</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="do/insertMatkul.php" method="post">
                    <div class="form-group row" style="margin: 10px;">
                        <label for="kode_mk" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="mata_mk" class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="mata_mk" name="mata_mk" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 10px;">
                        <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="sks" name="sks" required>
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