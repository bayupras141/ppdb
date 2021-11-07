<?php
include 'header.php';
include 'koneksi.php';

$alur = mysqli_query($connect, "SELECT * FROM alur");
$d = mysqli_fetch_array($alur,MYSQLI_ASSOC);

?>
<div class="row clearfix">
  <div class="col-md-12">
  <div class="col-md-8">
    <h3>Alur Pendaftaran</h3>
    Skema Alur Pendaftaran Peserta Didik Baru Online Di SMKN 1 Jenangan Ponorogo.
    <div class="well">
      <img src="alur/<?php echo $d['alur_nama']; ?>" width="700px">
    </div>
  </div>
  <div class="col-md-15 column">
    <div class="well">
      <img src="assets/img/hotlinenew.png" height="77px">
      <h3>
        <ul>
            <li>0852 2345 6789</li>
            <li>(0352) 481236 </li>
        </ul>
      </h3>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>
