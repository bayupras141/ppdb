<?php
include 'adm_header.php';
include '../koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$username = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM daftar WHERE dfr_no = '$username'");
$d = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>
<div class="row clearfix">
  <div class="col-md-9 column">
    <h3>Ubah Data Pendaftar</h3>
    Form ini digunakan untuk mengubah data pendaftar jika terjadi kesalahan peng-inputan oleh pelamar.
    <a href="adm_all_peserta.php" class="btn btn-primary pull-right"> Kembali</a>
    <br><br><br>
    <form action="adm_pendaftar_update.php" onsubmit="return validation(this)" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="has-validation-callback">
      <table>
        <tbody>
      	<tr>
      		<td width="250"><b>No. Pendaftaran</b></td>
      		<td colspan="2"><input type="text" name="nomor_daftar" value="<?php echo $d['dfr_no']; ?>" size="50" class="form-control" readonly></td>
      	</tr>
      	<tr>
          <td>
      			<br><strong>Data Pribadi</strong>
      		</td>
        </tr>
      	<tr>
      		<td>Nama Lengkap</td>
      		<td colspan="2"><input class="form-control" name="nama" data-validation="required" type="text" value="<?php echo $d['dfr_nama']; ?>"></td>
      	</tr>
  			<tr>
  				<td>Jenis Kelamin</td>
  				<td colspan="2"><p><br><input type="radio" name="jekel" value="1" <?php if($d['dfr_jekel']=='1'){echo 'checked';}?> /> Laki-laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="jekel" value="0" <?php if($d['dfr_jekel']=='0'){echo 'checked';}?> /> Perempuan </p></td>
  			</tr>
  			<tr>
  				<td>Tempat, Tanggal Lahir</td>
  				<td width="250"><input class="form-control" name="tempat_lahir" type="text" value="<?php echo $d['dfr_tmp_lahir']; ?>">
           </td>
          <td width="400"><input id="tanggal" class="form-control" name="tanggal_lahir" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text" value="<?php echo date('d-m-Y', strtotime($d['dfr_tgl_lahir'])); ?>"></td>
  			</tr>
  			<tr>
  				<td>Agama</td>
  				<td colspan="2">
    				<select class="form-control" name="agama" data-validation="required" type="text">
      				<option value="1" <?php if ($d['dfr_agama']=="1") { echo "selected=\"selected\""; } ?>>Islam</option>
      				<option value="2" <?php if ($d['dfr_agama']=="2") { echo "selected=\"selected\""; } ?>>Protestan</option>
              <option value="3" <?php if ($d['dfr_agama']=="3") { echo "selected=\"selected\""; } ?>>Katolik</option>
              <option value="4" <?php if ($d['dfr_agama']=="4") { echo "selected=\"selected\""; } ?>>Hindu</option>
              <option value="5" <?php if ($d['dfr_agama']=="5") { echo "selected=\"selected\""; } ?>>Budha</option>
              <option value="6" <?php if ($d['dfr_agama']=="6") { echo "selected=\"selected\""; } ?>>Konghu Cho</option>
    				</select>
          </td>
  			</tr>
  			<tr>
  				<td>Anak Dari</td>
  				<td colspan="2">
            <p><br><input type="radio" name="anak_dari" value="1" <?php if($d['dfr_anak_dr']=='1'){echo 'checked';}?> /> Umum &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="anak_dari" value="2" <?php if($d['dfr_anak_dr']=='2'){echo 'checked';}?> /> PA-AD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="anak_dari" value="3" <?php if($d['dfr_anak_dr']=='3'){echo 'checked';}?> /> BA TA SIP-AD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="anak_dari" value="4" <?php if($d['dfr_anak_dr']=='4'){echo 'checked';}?> /> WK-AD</p>
  				</td>
  			</tr>
        <tr>
  				<td>NISN</td>
  				<td colspan="2">
  				  <input class="form-control" name="nisn" type="text" value="<?php echo $d['dfr_nisn']; ?>">
  				</td>
  			</tr>
        <tr>
  				<td>Asal Sekolah</td>
  				<td colspan="2">
  				  <input class="form-control" name="asal_sekolah" type="text" value="<?php echo $d['dfr_asal_sekolah']; ?>">
  				</td>
  			</tr>
        <tr>
  				<td>Alamat Sekolah</td>
  				<td colspan="2">
  				  <textarea rows="2" class="form-control" name="alamat_sekolah" type="text"><?php echo $d['dfr_almt_sekolah']; ?></textarea>
  				</td>
  			</tr>
  			<!-- <tr>
          <td><strong>Nilai Ijazah</strong></td>
          <td colspan="2"><input class="form-control" name="nilai_ijazah" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;" value="<?php echo $d['dfr_nilai_ijazah']; ?>"></td>
  			</tr> -->
        <tr>
  				<td><strong>Nilai Ujian Sekolah</strong></td>
  				<td colspan="2"><br>
  					<div class="alert alert-warning">Skala nilai ujian : 1 sampai dengan 100<br>Nilai desimal dapat dilambangkan dengan tanda titik (.)<br> misal : 70.51</div>
  				</td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai Matematika</td>
          <td><input class="form-control" name="nilai_mm" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;" value="<?php echo $d['dfr_nilai_mm']; ?>"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai Bahasa Indonesia</td>
          <td><input class="form-control" name="nilai_indo" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;" value="<?php echo $d['dfr_nilai_indo']; ?>"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai Bahasa Inggris</td>
          <td><input class="form-control" name="nilai_eng" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;" value="<?php echo $d['dfr_nilai_eng']; ?>"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai IPA</td>
          <td><input class="form-control" name="nilai_ipa" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;" value="<?php echo $d['dfr_nilai_ipa']; ?>"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai IPS</td>
          <td><input class="form-control" name="nilai_ips" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;" value="<?php echo $d['dfr_nilai_ips']; ?>"></td>
  			</tr>
  			<tr>
  				<td><br>
  					<strong>Keterangan Orang Tua / Wali</strong>
  				</td>
  				<td>
  				</td>
  			</tr>
  			<tr>
  				<td><br>
  					Nama Orang Tua / Wali
  				</td>
  				<td>
  				</td>
  			</tr>
  			<tr>
  				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ayah</td>
  				<td colspan="2"><input class="form-control" name="nama_ayah" type="text" value="<?php echo $d['dfr_ayah']; ?>"></td>
  			</tr>
  			<tr>
  				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ibu</td>
  				<td colspan="2"><input class="form-control" name="nama_ibu" type="text" value="<?php echo $d['dfr_ibu']; ?>"></td>
  			</tr>
  			<tr><td><br></td></tr>
  			<tr>
  				<td>Alamat Orang Tua / Wali</td>
  				<td colspan="2"><textarea class="form-control" rows="2" name="alamat_ortu" type="text"><?php echo $d['dfr_alamat']; ?></textarea></td>
  			</tr>
  			<tr>
  				<td>No Telp / HP Orang Tua / Wali</td>
  				<td colspan="2"><input class="form-control" name="notelp" type="text" value="<?php echo $d['dfr_hp_ortu']; ?>"></td>
  			</tr>
        <tr><td><br></td></tr>
        <tr>
          <td></td>
          <td colspan="2"><input type="submit" name="register" value="Simpan" class="btn btn-primary btn-block"></td>
        </tr>
  			</tbody>
      </table>
  </form>
  </div>
  <!-- <div class="col-md-15 column">
    <div class="well">
      <img src="assets/img/hotlinenew.png" height="77px">
      <h3>
        <ul>
          <li>0813 xxxx xxxx</li>
          <li>0852 xxxx xxxx</li>
        </ul>
      </h3>
    </div>
  </div> -->
</div>
<?php
include 'adm_footer.php';
?>
