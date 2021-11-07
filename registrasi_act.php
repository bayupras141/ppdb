<?php
include 'koneksi.php';

$nomor_daftar = $_POST['nomor_daftar'];
$tgl_daftar= date('Y-m-d H:i:s');
//$password = $_POST['password'];
$password = '123456';
// $confirm_password = $_POST['confirm_password'];
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
$userfile = $_FILES['userfile']['name'];
$nilai_mm = $_POST['nilai_mm'];
$nilai_indo = $_POST['nilai_indo'];
$nilai_eng = $_POST['nilai_eng'];
$nilai_ipa = $_POST['nilai_ipa'];
$nilai_ips = $_POST['nilai_ips'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$alamat_ortu = $_POST['alamat_ortu'];
$notelp = $_POST['notelp'];
$status = 'R';
$bukti = $_FILES['buktitf']['name'];

$cek_nisn = "SELECT * FROM daftar WHERE dfr_nisn='$nisn'";
$result = $connect->query($cek_nisn);
$row = $result->fetch_array();

$nisnLama = $row['dfr_nisn'];

if($nisnLama != $nisn){
//cek dulu jika ada gambar produk jalankan coding ini
if($userfile != "") {
  $ekstensi_diperbolehkan = array('jpg'); //ekstensi file gambar yang bisa diupload
  $x = explode('.', $userfile); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['userfile']['tmp_name'];
  $file_tmp2 = $_FILES['buktitf']['tmp_name'];
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$userfile; //menggabungkan angka acak dengan nama file sebenarnya
  $nama_gambar_baru2 = $angka_acak.'-'.$bukti; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                move_uploaded_file($file_tmp2, 'bukti/'.$nama_gambar_baru2); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO daftar (dfr_no, dfr_tanggal, dfr_password,
                    dfr_nama, dfr_jekel, dfr_tmp_lahir, dfr_tgl_lahir, dfr_agama, dfr_anak_dr, dfr_nisn, dfr_asal_sekolah, dfr_almt_sekolah, dfr_pas_photo,
                    dfr_nilai_mm, dfr_nilai_indo, dfr_nilai_eng, dfr_nilai_ipa, dfr_nilai_ips, dfr_ayah, dfr_ibu, dfr_alamat, dfr_hp_ortu, status, filetf)
                    VALUES ('$nomor_daftar', '$tgl_daftar', '$password', '$nama','$jekel', '$tempat_lahir',
                    '$tanggal_lahir', '$agama', '$anak_dari', '$nisn', '$asal_sekolah', '$alamat_sekolah',
                    '$userfile', '$nilai_mm', '$nilai_indo', '$nilai_eng', '$nilai_ipa', '$nilai_ips', '$nama_ayah', '$nama_ibu', '$alamat_ortu', '$notelp', '$status', '$bukti')";
                  $result = mysqli_query($connect, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($connect).
                           " - ".mysqli_error($connect));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Pendaftaran Anda Berhasil..! Silahkan Cetak Kartu Bukti Pendaftaran Anda.');window.location='pendaftar.php?id=$nomor_daftar';</script>";
                  }
            } else {
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg.');window.location='register.php';</script>";
            }
      }
}else {
	header("location: register.php?op=GAGAL");
}
?>
