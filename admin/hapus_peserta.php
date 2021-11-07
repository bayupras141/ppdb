<?php
include 'adm_header.php';
include '../koneksi.php';
// $username = $_SESSION['username'];

$username = $_GET['id'];
$result = mysqli_query($connect, "DELETE FROM daftar WHERE dfr_no = '$username'");

if($result){
    header('location: adm_all_peserta.php');
}
?>