<?php
include_once 'koneksi.php';
if(isset($_POST['kirim']))
{    
     
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="tampung/";
	$no = $_POST['no'];
	$rusak = $_POST['rusak'];
	$ket = $_POST['ket'];
	$status = $_POST['status'];
	
	// new file size in KB
	$new_size = $file_size/1044070;  

	$new_file_name = strtolower($file);
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO bengkel(nomor,kerusakan,keterangan,status,file) VALUES('$no','$rusak','$ket','$status','$final_file')";
		mysqli_query($db,$sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='index.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='index.php?fail';
        </script>
		<?php
	}
}
?>