<?php
include '../koneksi.php';

$id = $_GET['id'];
// update data ke database
mysqli_query($connect,"update daftar set status='Y' where dfr_no='$id'");

// mengalihkan halaman kembali ke index.php
header("location:adm_all_peserta.php");
?>
