<?php
include 'header.php';
include 'koneksi.php';

$tgl = mysqli_query($connect, "SELECT * FROM waktu");
$d = mysqli_fetch_array($tgl,MYSQLI_ASSOC);
?>
<div class="row clearfix">
  <div class="col-md-12">
  <div class="col-md-8">
    <h3>Jadwal Pendaftaran</h3>
    Jadwal Pendaftaran Penerimaan Peserta Didik Baru SMKN 1 Jenangan Ponorogo.
    <div class="well">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td width="180" align="left">Pembukaan Pendaftaran</td>
              <td width="250" align="left" style="color:red;"><strong>: &nbsp;<?php echo $d['waktu_mulai']; ?></strong></td>
            </tr>
            <tr>
              <td align="left">Penutupan Pendaftaran</td>
              <td align="left" style="color:red;"><strong>: &nbsp;<?php echo $d['waktu_akhir']; ?></strong></td>
            </tr>
          </tbody>
        </table>
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
