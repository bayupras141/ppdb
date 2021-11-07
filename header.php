<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>Selamat Datang - PPDB Online SMKN 1 Jenangan Ponorogo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ppdb online sma swasta kartika medan">
  <meta name="author" content="rumahangkasa.com">

	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/datepicker.css" rel="stylesheet">

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/img/favicon.png">
</head>

<body style="">
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<a href="#"> <h3 style="color:#428BCA;margin-top:5px;margin-bottom:0px;"><img src="assets/img/ppdbheader.png" style="max-width:100%;margin-bottom:0px;margin-left:10px;margin-right:10px;">
			</h3></a>
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header" style="padding-left:30px;">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">MENU</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					 <a href="https://smkn1jenpo.sch.id/" target="_blank"><img src="gambar/logo-stmj.png" alt=".." width="180px"></a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.php">Beranda</a>
						</li>
						<li>
							<a href="alur.php">Alur</a>
						</li>
						<li>
							<a href="jadwal.php">Jadwal</a>
						</li>
						<li>
							<a href="persyaratan.php">Persyaratan</a>
						</li>
						<li>
						  <a href="register.php">Pendaftaran</a>
						</li>
            <li>
						  <a href="biaya_masuk.php">Informasi Biaya Masuk</a>
						</li>
						<li></li>
						<li></li>
					</ul>
          <?php if(!isset($_SESSION['username'])){ ?>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#faq">FAQ</a>
						</li>
						<li style="padding-right:30px"> <a href="login.php">Login</a></li>
          </ul>
        <?php } else { ?>
          <ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#"><?php echo $_SESSION['nama']; ?></a>
						</li>
						<li style="padding-right:30px"> <a href="logout.php">Logout</a></li>
          </ul>
        <?php } ?>
				</div>
			</nav>
