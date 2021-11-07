<?php
include 'adm_header.php';
include '../koneksi.php';

$tgl = mysqli_query($connect, "SELECT * FROM waktu");
$d = mysqli_fetch_array($tgl,MYSQLI_ASSOC);
?>    
<style>
  .datepicker{z-index:1151;}
</style>
<!--some script for datepicker-->
<div class="row clearfix">
	<div class="col-md-8 column">
		<h3>Pengaturan</h3>
    <div class="alert alert-warning">Pengaturan Jadwal Pembukaan Pendaftaran dan Penutupan Pendaftaran Penerimaan Peserta Didik Baru (PPDB) serta Tahun Ajaran Pendidikan.</div>
    <form method="post" action="adm_jadwal_act.php" class="form-horizontal">
      <input type="hidden" name="tgl_id" value="<?php echo $d['waktu_id']; ?>">
      <table>
  			<tbody>
          <tr>
            <td width="200">Tahun Ajaran</td>
    				<td width="400"><input id="ta" class="form-control" name="ta" data-validation="ta" type="text" value="<?php echo $d['ta']; ?>"></td>
          </tr>
          <tr>
    				<td><br></td>
    			</tr>
          <tr>
            <td width="200">Pendaftaran dibuka</td>
    				<td width="400"><input id="tanggal" class="form-control" name="tglbuka" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text" value="<?php //echo date('d-m-Y',strtotime($d['waktu_mulai'])); ?>"></td>
          </tr>
          <tr>
            <td>Pendaftaran ditutup <br>(hari terakhir)</td>
    				<td><input id="tanggal2" class="form-control" name="tgltutup" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text" value="<?php //echo date('d-m-Y',strtotime($d['waktu_akhir'])); ?>"></td>
          </tr>
          <?php if (isset($_GET['msg'])): ?>
            <script>
                var type = "<?php echo $_GET['type']?>"
                var title = "<?php echo $_GET['title']?>"
                var msg = "<?php echo $_GET['msg']?>"
                Swal.fire({
                    icon: type,
                    title: title,
                    text: msg,
                })
            </script>
        <?php endif ?>
          <tr>
    				<td></td>
    				<td><br><button type="submit" class="btn btn-primary">Simpan</button></td>
    			</tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
<?php include 'adm_footer.php'; ?>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>
<script>
$(function(){
  $("#tanggal").datepicker({
format:'dd-mm-yyyy'
  });
  $("#tanggal2").datepicker({
format:'dd-mm-yyyy'
  });
  $("#tanggal3").datepicker({
format:'dd-mm-yyyy'
  });
});
</script>
<!-- <script type="text/javascript">
  var elem = document.getElementById("tanggal");
  elem.value = "10-04-2020";
  var elem = document.getElementById("tanggal2");
  elem.value = "20-04-2020";
</script> -->
