<?php
include '../koneksi.php';

$nomor_daftar = $_POST['nomor_daftar'];
$nama = $_POST['nama'];
$jekel = $_POST['jekel'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tanggal_lahir = date('Y-m-d',strtotime($tanggal_lahir));
$agama = $_POST['agama'];
$anak_dari = $_POST['anak_dari'];
$nisn = $_POST['nisn'];
$asal_sekolah = $_POST['asal_sekolah'];
$alamat_sekolah = $_POST['alamat_sekolah'];
$nilai_mm = $_POST['nilai_mm'];
$nilai_indo = $_POST['nilai_indo'];
$nilai_eng = $_POST['nilai_eng'];
$nilai_ipa = $_POST['nilai_ipa'];
$nilai_ips = $_POST['nilai_ips'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$alamat_ortu = $_POST['alamat_ortu'];
$notelp = $_POST['notelp'];

// update data ke database
$query = "UPDATE daftar SET dfr_nama='$nama', dfr_jekel='$jekel', dfr_tmp_lahir='$tempat_lahir', dfr_tgl_lahir='$tanggal_lahir', dfr_agama='$agama', dfr_anak_dr='$anak_dari', dfr_nisn='$nisn', dfr_asal_sekolah='$asal_sekolah', dfr_almt_sekolah='$alamat_sekolah',
dfr_nilai_mm='$nilai_mm', dfr_nilai_indo='$nilai_indo', dfr_nilai_eng='$nilai_eng', dfr_nilai_ipa='$nilai_ipa', dfr_nilai_ips='$nilai_ips', dfr_ayah='$nama_ayah', dfr_ibu='$nama_ibu', dfr_alamat='$alamat_ortu', dfr_hp_ortu='$notelp' WHERE dfr_no= '$nomor_daftar'";
$result = mysqli_query($connect, $query);

if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($connect).
         " - ".mysqli_error($connect));
} else {
  //tampil alert dan akan redirect ke halaman index.php
  //silahkan ganti index.php sesuai halaman yang akan dituju
  echo "<script>alert('Update Data Peserta Berhasil..!');window.location='adm_all_peserta.php';</script>";
}
?>
