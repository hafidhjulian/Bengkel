<?php
include_once("koneksi.php");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Angkutan & Bengkel Akademi Kepolisian</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	</head>
	<body>
        <div class="container-fluid">
                <div class="row sidnav">                
                    <div class="col-md-4 text-center">
                        <nav class="navbar navbar-expand-md flex-column">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#beranda">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="beranda">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item top">
                                        <span class="fa-stack fa-lg doc">
                                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                <i class="fa fa-wrench fa-stack-1x"></i>
                                        </span>
                                        <h1 class="display-4 textdoc">Angkel</h1>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#bengkel">Bengkel</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active container" id="bengkel">
                                <h1 class="display-4">Bengkel</h1>
                                <hr>
                                <form action="upload.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="ang">Nomor angkutan:</label>
                                        <select class="form-control" id="ang" name="no">
                                            <option class="active">Pilih Nomor Kendaraan</option>
                                            <option>XII-04</option>
                                            <option>XI-04</option>
                                            <option>X-04</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rusak">Kerusakan:</label>
                                        <textarea class="form-control" rows="5" id="rusak" name="rusak"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="ket">Keterangan:</label>
                                        <textarea class="form-control" rows="5" id="ket" name="ket"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="optradio">Status:</label>
                                        <div class="radio">
                                            <label><input type="radio" name="status" value="Sudah diperbaiki"> Sudah diperbaiki</label>
                                            <label><input type="radio" name="status" value="Belum diperbaiki" checked> Belum diperbaiki</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="inputFile">File Upload</label>
                                        <input type="file" class="form-control-file text-primary font-weight-bold" id="inputFile" name="file" accept=".jpg, .png" onchange="readUrl(this)" data-title="Drag and drop a file">
                                    </div>
                                    <p>*Apabila status sudah diperbaiki upload bukti pembayaran</p>
                                    <button type="submit" class="btn btn-primary" name="kirim">Kirim</button> 
                                </form>
                                <hr>
                                <div class="table-responsive" id="tabdata">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th>Nomor Angkutan</th>
                                            <th>Kerusakan</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Files</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $sql = "SELECT * FROM bengkel";
                                            $query = mysqli_query($db, $sql);

                                            while($dok = mysqli_fetch_array($query)){

                                                ?>
                                                <tr>

                                                <td><?php echo $dok['nomor'] ?></td>
                                                <td><?php echo $dok['kerusakan']?></td>
                                                <td><?php echo $dok['keterangan']?></td>
                                                <td><?php echo $dok['status']?></td>

                                                <td>
                                                <a href="tampung/<?php echo $dok["file"] ?>" target="_blank">View</a>
                                                </td>

                                                <td>
                                                <a href="update.php?id=<?php echo $dok['id']?>">Update |</a>
                                                <a href="cetak.php?id=<?php echo $dok['id']?>">Cetak</a>
                                                </td>

                                                 </tr>
                                                 <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
	</body>
</html>

