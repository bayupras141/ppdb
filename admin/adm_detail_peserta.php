<?php
include 'adm_header.php';
include '../koneksi.php';
//$username = $_SESSION['username'];
$username = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM daftar WHERE dfr_no = '$username'");
$d = mysqli_fetch_array($result,MYSQLI_ASSOC);

$mm = $d['dfr_nilai_mm'];
$indo = $d['dfr_nilai_indo'];
$eng = $d['dfr_nilai_eng'];
$ipa = $d['dfr_nilai_ipa'];
$ips = $d['dfr_nilai_ips'];
$total = ($mm + $indo + $eng + $ipa + $ips) / 5;

?>

<link rel="stylesheet" type="text/css" href="../assets/source/jquery.fancybox.css" media="screen">
<div class="row clearfix">
  <div class="row">
    <div class="col-md-8 column">
      <h3>Detail Data Peserta</h3>
      Penerimaan Peserta Didik Baru (PPDB) Online Tahun <?php echo date('Y'); ?>
      <a href="adm_all_peserta.php" class="btn btn-primary pull-right"> Kembali</a>
      <br><br><br>
      <!-- <div class="alert alert-success">Selamat Anda sudah berhasil melakukan pengajuan Pendaftaran Penerimaan Peserta Didik Baru (PPDB) Secara Online. Anda wajib membawa kartu bukti pendaftaran saat melakukan registrasi ulang.</div> -->
    </div>
    <div class="col-md-3 column">
      <br><br>
      <table width="100%">
        <tbody>
          <tr>
            <td width="50%"><a href="adm_opsi_lulus.php?id=<?php echo $d['dfr_no'];?>" class="btn btn-success btn-block"><b>LULUS</b></a></td>
            <td width="50%"><a href="adm_opsi_gagal.php?id=<?php echo $d['dfr_no'];?>" class="btn btn-danger btn-block"><b>TIDAK</b></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
  <div class="col-md-8 column">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td><strong>Informasi Pendaftaran</strong></td>
          <td></td>
          <td align="center"><strong>Pas Photo</strong></td>
        </tr>
        <tr>
          <td width="200">No. Pendaftaran</td>
          <td>: <?php echo $d['dfr_no']; ?></td>
          <td width="175" rowspan="6"><img width="175" src="../gambar/<?php echo $d['dfr_pas_photo']; ?>"></td>
        </tr>
        <tr>
          <td>Tgl. Pendaftaran</td>
          <td>: <?php echo $d['dfr_tanggal']; ?></td>
        </tr>
        <tr>
          <td colspan="2"><strong>Informasi Siswa</strong></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td>: <?php echo $d['dfr_nama']; ?></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal Lahir</td>
          <td>: <?php echo $d['dfr_tmp_lahir'].", ". $d['dfr_tgl_lahir'] ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <?php  
            if ($d['dfr_jekel'] == 1) {
              # code...
              echo ": Laki-laki";
            } else {
              # code...
              echo ": Perempuan";
            }
          ?>
          </td>
        </tr>
        <tr>
          <td>Anak dari</td>
          <td>
          : <?php
            if($d['dfr_anak_dr'] == '1'){
              echo "UMUM";
            }elseif ($d['dfr_anak_dr'] == '2'){
              echo "PA-AD";
            }elseif($d['dfr_anak_dr'] == '3'){
              echo "BA TA SIP-AD";
            }elseif ($d['dfr_anak_dr'] == '4'){
              echo "WK-AD";
            }else{
              echo "Tidak Terdaftar";
            }
          ?>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3"><strong>Asal Sekolah</strong></td>
        </tr>
        <tr>
          <td>NISN</td>
          <td>: <?php echo $d['dfr_nisn']; ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Asal Sekolah</td>
          <td>: <?php echo $d['dfr_asal_sekolah']; ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Nilai Rata-rata</td>
          <td>: <?php echo $total; ?></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3"><strong>Orang Tua Siswa / Wali</strong></td>
        </tr>
        <tr>
          <td>Nama Ayah</td>
          <td>: <?php echo $d['dfr_ayah']; ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Nama Ibu</td>
          <td>: <?php echo $d['dfr_ibu']; ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>: <?php echo $d['dfr_alamat']; ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Handphone</td>
          <td>: <?php echo $d['dfr_hp_ortu']; ?></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    </div>
    <div class="col-md-3 column">
      <!-- <div class="well"> -->
      <table class="table table-bordered">
        <tr style="background-color:#f9f9f9;">
          <td colspan="2" align="center"><strong>NILAI UJIAN SEKOLAH</strong></td>
        </tr>
        <tr>
          <td width="60%">Matematika</td>
          <td>: &nbsp;&nbsp;<?php echo $mm; ?></td>
        </tr>
        <tr>
          <td>Bahasa Indonesia</td>
          <td>: &nbsp;&nbsp;<?php echo $indo; ?></td>
        </tr>
        <tr>
          <td>Bahasa Inggris</td>
          <td>: &nbsp;&nbsp;<?php echo $eng; ?></td>
        </tr>
        <tr>
          <td>IPA</td>
          <td>: &nbsp;&nbsp;<?php echo $ipa; ?></td>
        </tr>
        <tr>
          <td>IPS</td>
          <td>: &nbsp;&nbsp;<?php echo $ips; ?></td>
        </tr>
        <tr>
          <td><strong>NILAI RATA2</strong></td>
          <td>: &nbsp;&nbsp;<strong><?php echo $total; ?></strong></td>
        </tr>
      </table>
      <table width="100%" class="table table-striped table-bordered">
        <tbody>
          <tr>
            <td width="100%" align="center"><b>BUKTI BAYAR</b></td>
          </tr>
          <tr>
            <td width="100%" align="center"><a href="#" id="perbesar"><img src="../bukti/<?php echo $d['filetf'];?>" width="210"></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<!-- </div> -->
</div>
<?php include 'adm_footer.php'; ?>
<script type="text/javascript" src="../assets/source/jquery.fancybox.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#perbesar').fancybox();
  });
</script>
