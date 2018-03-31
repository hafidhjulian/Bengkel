<?php
    include_once("koneksi.php");

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $no = $_POST['no'];
        $rusak = $_POST['rusak'];
        $ket= $_POST['ket'];
        $status= $_POST['status'];

        if (isset($_POST['ubah'])) {
            $file = $_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $path = "tampung/";
            $new_file_name = strtolower($file);
    
            $final_file=str_replace(' ','-',$new_file_name);

            if (move_uploaded_file($file_loc, $path.$final_file)) {
                $sql="UPDATE bengkel SET nomor='$no', kerusakan='$rusak', keterangan='$ket', status='$status',file='$final_file' WHERE id=$id";
                $query = mysqli_query($db,$sql);

                if($query){
                    header('location:index.php');
                }else{
                    die("Gagal update data");
                }
            }
        
        }else{
            $sql="UPDATE bengkel SET nomor='$no', kerusakan='$rusak', keterangan='$ket', status='$status' WHERE id=$id";
                $query = mysqli_query($db,$sql);

                if($query){
                    header('location:index.php');
                }else{
                    die("Gagal update data");
                }
        }

        
    }

?>