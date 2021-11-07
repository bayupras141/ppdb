<?php
include '../koneksi.php';

// if($_POST['upload']){
  $id = $_POST['alur_id'];

	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['filealur']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['filealur']['size'];
	$file_tmp = $_FILES['filealur']['tmp_name'];

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 1044070){
			move_uploaded_file($file_tmp, '../alur/'.$nama);
			$query = mysqli_query($connect,"UPDATE alur SET alur_nama = '$nama' WHERE alur_id = '$id'");
			if($query){
				$success = 'true';
				$title = 'Success';
				$message = 'FILE BERHASIL DI UPLOAD!';
				$type = 'success';
				header('location: adm_alur.php?msg='.$message.'&type='.$type.'&title='.$title);
			}else{
				$success = 'true';
				$title = 'Gagal';
				$message = 'GAGAL MENGUPLOAD GAMBAR!';
				$type = 'error';
				header('location: adm_alur.php?msg='.$message.'&type='.$type.'&title='.$title);
			}
		}else{
			$success = 'true';
			$title = 'Gagal';
			$message = 'UKURAN FILE TERLALU BESAR!';
			$type = 'error';
			header('location: adm_alur.php?msg='.$message.'&type='.$type.'&title='.$title);
		}
	}else{
		$success = 'true';
		$title = 'Gagal';
		$message = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
		$type = 'error';
		header('location: adm_alur.php?msg='.$message.'&type='.$type.'&title='.$title);
		
	}
?>
