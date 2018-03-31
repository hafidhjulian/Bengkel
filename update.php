<?php

include_once("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM bengkel WHERE id=$id";
$query = mysqli_query($db, $sql);
$beng = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Data</h1>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $beng['id'] ?>">
                    <div class="form-group">
                        <label for="ang">Nomor angkutan:</label>
                        <?php $no = $beng['nomor']; ?>
                            <select class="form-control" id="ang" name="no">
                                <option class="active">pilih nomor bus</option>
                                <option <?php echo ($no == 'XII-04') ? "selected": "" ?>>XII-04</option>
                                <option <?php echo ($no == 'XI-04') ? "selected": "" ?>>XI-04</option>
                                <option <?php echo ($no == 'X-04') ? "selected": "" ?>>X-04</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="rusak">Kerusakan:</label>
                        <textarea class="form-control" rows="5" id="rusak" name="rusak"><?php echo $beng['kerusakan'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan:</label>
                        <textarea class="form-control" rows="5" id="ket" name="ket"><?php echo $beng['keterangan'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <div class="radio">
                            <?php $status = $beng['status']; ?>
                            <label><input type="radio" name="status" value="Sudah diperbaiki" <?php echo ($status == 'Sudah diperbaiki') ? "checked": "" ?>> Sudah diperbaiki</label>
                            <label><input type="radio" name="status" value="Belum diperbaiki" <?php echo ($status == 'Belum diperbaiki') ? "checked": "" ?>> Belum diperbaiki</label>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="cekbok" value="true" name="ubah" onclick="cek"> Ceklis jika ganti foto
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputFile">File Upload</label>
                        <input type="file" class="form-control-file text-primary font-weight-bold" id="inputFile" name="file" accept=".jpg, .png">
                    </div>
                    <p>*Apabila status sudah diperbaiki upload bukti pembayaran</p>
                    <button type="submit" class="btn btn-primary" name="update">Update</button> 
                </form>
            </div>
        </div>
    </div>
    

    </body>
</html>


