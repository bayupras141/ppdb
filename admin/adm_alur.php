<?php
include 'adm_header.php';
include '../koneksi.php';

$alur = mysqli_query($connect, "SELECT * FROM alur");
$d = mysqli_fetch_array($alur,MYSQLI_ASSOC);

?>
<div class="row clearfix">
	<div class="col-md-8 column">
		<h3>Pengaturan</h3>
    <div class="alert alert-warning">Upload diagram Alur yang akan digunakan sebagai panduan didalam proses penerimaan peserta didik baru.
    Diagram Alur dibuat dengan format *.JPG dengan demensi ukuran 865 x 555 pixels.</div>
    <form action="adm_alur_act.php" method="post" enctype="multipart/form-data" class="has-validation-callback">
			<input type="hidden" name="alur_id" value="<?php echo $d['alur_id']; ?>">
      <table>
  			<tbody>
          <tr>
            <td width="200">Upload Gambar Alur Diagram</td>
    				<td width="400"><input type="file" class="form-control" name="filealur"></td>
          </tr>
          <tr>
    				<td></td>
    				<td><br><button type="submit" class="btn btn-primary">Simpan</button></td>
    			</tr>
        </tbody>
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
      </table>
    </form>
  </div>
</div>
<?php include 'adm_footer.php'; ?>
