<?php
//variabel koneksi mysql server
$hostname = "localhost";
$username = "root";
$password = "";
$database = "ppdb2";

//konek ke mysql server
$connect = new mysqli($hostname, $username, $password, $database);

//mengecek jika terjadi gagal koneksi
if(mysqli_connect_errno()) {
    echo "Error: Could not connect to database. ";
    exit;
}

//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
$date= date("Y-m-d");

// NOMOR URUT ORDER
$query =mysqli_query($connect, "SELECT max(dfr_no) as maxKode FROM daftar");
$data = mysqli_fetch_array($query);
$noOrder = $data['maxKode'];
$noUrut = (int) substr($noOrder, 11, 3);
$noUrut++;
$char = "REG";
$tahun=substr($date, 0, 4);
$bulan=substr($date, 5, 2);
$tgl=substr($date, 8,2);
$id_reg = $char .$tahun .$bulan .$tgl . sprintf("%03s", $noUrut);

function date_indo($orderdate)
{
# code...
	if(isset($orderdate)){
		$orderdate = explode('-', $orderdate);
		$year = $orderdate[0];
		$month   = $orderdate[1];
		$day  = $orderdate[2];
		echo $day.'-'.$month.'-'.$year;
	}
}

function tanggal_Indo($orderdate)
{
# code...
	if(isset($orderdate)){
		$orderdate = explode('-', $orderdate);
		$year = $orderdate[0];
		$month   = $orderdate[1];
		$day  = $orderdate[2];
		echo $day.'-'.$month.'-'.$year;
	}
}
?>
