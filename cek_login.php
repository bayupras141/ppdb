<?php
//echo session_save_path();
session_start();
// mengaktifkan session pada php
// var_dump($_SESSION);
//die;

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"select * from daftar where dfr_no='$username' and dfr_password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['dfr_nisn'] == NULL){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['dfr_nama'];
		// alihkan ke halaman dashboard admin
		header("location:admin/adm_beranda.php");

	// cek jika user login sebagai peserta
}else if($data['dfr_nisn'] !== NULL){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['dfr_nama'];
		// var_dump($username);
		// alihkan ke halaman dashboard peserta
		header("location:pendaftar.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
}else{
	header("location:login.php?pesan=gagal");
}
?>
