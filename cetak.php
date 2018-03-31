<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse; 
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
	
<h1 style="text-align: center;">Data Bengkel</h1>
<table border="1" width="100%">
<tr>
	<th>Nomor</th>
	<th>Kerusakan</th>
	<th>Keterangan</th>
	<th>Status</th>
</tr>
<?php
// Load file koneksi.php
include "koneksi.php";
if(!isset($_GET['id'])){
	header('location: index.php');
}
$id = $_GET['id'];
$query = "SELECT nomor,kerusakan,keterangan,status FROM bengkel WHERE id=$id"; // Tampilkan semua data gambar
$sql = mysqli_query($db, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($dok = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td>".$dok['nomor']."</td>";
        echo "<td>".$dok['kerusakan']."</td>";
        echo "<td>".$dok['keterangan']."</td>";
        echo "<td>".$dok['status']."</td>";
        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>
<p>Selamat Liburan</p>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Bengkel.pdf', 'D');
?>
