<?php
include '../koneksi.php';

$id = $_POST['tgl_id'];
$ta = $_POST['ta'];
$mulai = $_POST['tglbuka'];
$mulai = date('Y-m-d',strtotime($mulai));
$akhir = $_POST['tgltutup'];
$akhir = date('Y-m-d',strtotime($akhir));
$sql = "UPDATE waktu SET waktu_mulai='$mulai', waktu_akhir='$akhir' WHERE waktu_id=$id";

// update data ke database
if (mysqli_query($connect,$sql)) {
        $success = 'true';
        $title = 'Success';
        $message = 'Update berhasil!';
        $type = 'success';
        header('location: adm_jadwal.php?msg='.$message.'&type='.$type.'&title='.$title);
} else {
        $success = 'true';
        $title = 'Gagal';
        $message = 'Update gagal!';
        $type = 'error';
        header('location: adm_jadwal.php?msg='.$message.'&type='.$type.'&title='.$title);
}

// mysqli_query($connect,$sql);

// mengalihkan halaman kembali ke index.php
// header("location:adm_jadwal.php");
?>
