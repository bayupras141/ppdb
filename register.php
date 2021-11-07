<?php
include 'header.php';
include 'koneksi.php';
?>
<style>
  .datepicker{z-index:1151;}
</style>
<style media="screen" type="text/css">
	#sekolahlain{display:none;}
</style>

<?php
  $tgl = mysqli_query($connect, "SELECT * FROM waktu");
  $d = mysqli_fetch_array($tgl,MYSQLI_ASSOC);

  $skrg = date('Y-m-d');
  $mulai = $d['waktu_mulai'];
  $akhir = $d['waktu_akhir'];

  if($skrg < $mulai) {
?>

<div class="row clearfix">
  <div class="col-md-8 column">
    <h3>Formulir Pendaftaran</h3>
    <div class="alert alert-danger">Pendaftaran Belum Dibuka </div>
  </div>
</div>

<?php } elseif ($skrg >= $mulai and $skrg <= $akhir){ ?>
<!-- FORM PENDAFTARAN -->
<div class="row clearfix">
  <div class="col-md-8 column">
    <h3>Formulir Pendaftaran</h3>
    <div class="alert alert-warning">Data akun akan digunakan untuk login ke portal. Pastikan anda mengisi data di bawah ini dengan benar. </div>
    <form action="registrasi_act.php" onsubmit="return validation(this)" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="has-validation-callback">
      <table>
        <tbody>
        <!-- <tr>
            <td><strong>Data akun</strong></td>
            <td colspan="2">
            </td>
        </tr> -->
      	<tr>
          <?php
            if (isset($_GET['op'])) {
              if ($_GET['op'] == 'GAGAL') {
                echo "<div class='alert alert-danger'>NISN sudah terdaftar, coba cek kembali NISN Anda..!</div>";
              }
            }
          ?>
      		<td width="200"><b>No. Pendaftaran</b></td>
      		<td colspan="2"><input type="text" name="nomor_daftar" value="<?php echo $id_reg; ?>" size="50" class="form-control" readonly></td>
      	</tr>
      	<!-- <tr>
      		<td>Password</td>
      		<td colspan="2"><input type="password" name="password" value="" id="password" maxlength="20" size="30" class="form-control" data-validation="required length" data-validation-length="min8"></td>
      	</tr> -->
      	<!-- <tr>
      		<td>Konfirmasi password</td>
      		<td colspan="2"><input type="password" name="confirm_password" value="" id="confirm_password" maxlength="20" size="30" class="form-control" data-validation="confirmation"></td>
      	</tr> -->
      	<tr>
          <td>
      			<br><strong>Data Pribadi</strong>
      		</td>
        </tr>
      	<tr>
      		<td>Nama Lengkap</td>
      		<td colspan="2"><input class="form-control" name="nama" data-validation="required" type="text"></td>
      	</tr>
  			<tr>
  				<td>Jenis Kelamin</td>
  				<td colspan="2"><p><br><input type="radio" name="jekel" value="1"> Laki-laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="jekel" value="0"> Perempuan </p></td>
  			</tr>
  			<tr>
  				<td>Tempat, Tanggal Lahir</td>
  				<td width="200"><input class="form-control" name="tempat_lahir" type="text">
           </td>
           <td><input id="tanggal" class="form-control" name="tanggal_lahir" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text" placeholder="DD-MM-YYYY"></td>
  			</tr>
  			<tr>
  				<td>Agama</td>
  				<td colspan="2">
    				<select class="form-control" name="agama" data-validation="required" type="text">
      				<option selected="" disabled="">-- Pilih Agama --</option>
      				<option value="1">Islam</option>
      				<option value="2">Protestan</option>
              <option value="3">Katolik</option>
              <option value="4">Hindu</option>
              <option value="5">Budha</option>
              <option value="6">Konghu Cho</option>
    				</select>
          </td>
  			</tr>
  			<!-- <tr>
  				<td>Alamat Siswa</td>
  				<td colspan="2"><textarea row="2" class="form-control" name="alamat" data-validation="required" type="text"></textarea>
  				</td>
  			</tr> -->
  			<tr>
  				<td>Anak Dari</td>
  				<td colspan="2">
            <p><br><input type="radio" name="anak_dari" value="1"> Umum &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="anak_dari" value="2"> PA-AD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="anak_dari" value="3"> BA TA SIP-AD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="anak_dari" value="4"> WK-AD</p>
  				</td>
  			</tr>
        <tr>
  				<td>NISN</td>
  				<td colspan="2">
  				  <input class="form-control" name="nisn" data-validation="required" type="text">
  				</td>
  			</tr>
        <tr>
  				<td>Asal Sekolah</td>
  				<td colspan="2">
  				  <input class="form-control" name="asal_sekolah" data-validation="required" type="text">
  				</td>
  			</tr>
        <tr>
  				<td>Alamat Sekolah</td>
  				<td colspan="2">
  				  <textarea rows="2" class="form-control" name="alamat_sekolah" data-validation="required" type="text"></textarea>
  				</td>
  			</tr>
  			<tr>
  				<td>
  				</td>
  				<td colspan="2"><br>
  					<div class="alert alert-warning">Berkas foto rasio 3x4 dengan height minimal 500px, harus dalam format jpg dan  berukuran di bawah 500 KB</div>
  				</td>
  			</tr>
  			<tr>
  				<td>Pas foto</td>
  				<td colspan="2">Pilih berkas foto untuk diunggah : <input name="userfile" type="file" data-validation="required">
            <div id="valid_msg"></div><br>
          </td>
  			</tr>
  			<!-- <tr>
          <td><strong>Nilai Ijazah</strong></td>
          <td colspan="2"><input class="form-control" name="nilai_ijazah" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;"></td>
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
          <td><input class="form-control" name="nilai_mm" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai Bahasa Indonesia</td>
          <td><input class="form-control" name="nilai_indo" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai Bahasa Inggris</td>
          <td><input class="form-control" name="nilai_eng" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai IPA</td>
          <td><input class="form-control" name="nilai_ipa" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;"></td>
  			</tr>
        <tr>
          <td></td>
          <td>Nilai IPS</td>
          <td><input class="form-control" name="nilai_ips" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;100]" type="text" style="text-align:left;"></td>
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
  				<td colspan="2"><input class="form-control" name="nama_ayah" data-validation="required" type="text"></td>
  			</tr>
  			<tr>
  				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ibu</td>
  				<td colspan="2"><input class="form-control" name="nama_ibu" data-validation="required" type="text"></td>
  			</tr>
  			<tr><td><br></td></tr>
  			<tr>
  				<td>Alamat Orang Tua / Wali</td>
  				<td colspan="2"><textarea class="form-control" rows="2" name="alamat_ortu" data-validation="required" type="text"></textarea></td>
  			</tr>
  			<tr>
  				<td>No Telp / HP Orang Tua / Wali</td>
  				<td colspan="2"><input class="form-control" name="notelp" data-validation="required" type="text"></td>
  			</tr>
        <tr>
  				<td><br>
  					<strong>Bukti Pembayaran</strong>
  				</td>
  				<td colspan="2"><br><div class="alert alert-warning">Upload Berkas Bukti Transfer Pembayaran dalam format *.JPG</div>
  				</td>
  			</tr>
        <tr>
  				<td>Upload Bukti Pembayaran</td>
  				<td colspan="2">Pilih berkas Bukti Pembayaran untuk diunggah : <input name="buktitf" type="file" data-validation="required"><br>
          </td>
  			</tr>
        <tr><td><br></td></tr>
        <tr>
          <td colspan="3">
            <div class="alert alert-info">
              <input type="checkbox" name="agreement" data-validation="required" value="TRUE">
              Saya menyatakan bahwa informasi yang saya tulis dan unggah di atas adalah benar.
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td colspan="2"><input type="submit" name="register" value="Daftar" class="btn btn-primary btn-block"></td>
        </tr>
  			</tbody>
      </table>
  </form>
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
<!-- END FORM PENDAFTARAN -->
<?php } elseif ($skrg > $akhir) { ?>
<div class="row clearfix">
  <div class="col-md-8 column">
    <h3>Formulir Pendaftaran</h3>
    <div class="alert alert-danger">Pendaftaran Sudah Tutup </div>
  </div>
</div>
<?php } ?>
<?php include 'footer.php'; ?>
<script type="text/javascript" src="assets/js/validation.js"></script>
<script type="text/javascript">
$('p select[name=asal]').change(function(e){
  if ($('p select[name=asal]').val() == '0'){
    $('#sekolahlain').show();
    document.getElementById('sekolahlain').innerHTML = "<p><input class=\"form-control\" name=\"sekolahlain\" type=\"text\" placeholder=\"Nama Sekolah\" data-validation=\"required\" size=\"50\" /></p>";
    $.validate();

  }else{
    $('#sekolahlain').hide();
  }
});
</script>
<script type="text/javascript">
function validation(thisform)
{
   with(thisform)
   {
      if(validateFileExtension(userfile, "valid_msg", "Berkas foto harus dalam format *.jpg (ekstensi huruf kecil)",
      new Array("jpg")) == false)
      {
         return false;
      }
      if(validateFileSize(userfile,500000, "valid_msg", "Berkas foto harus lebih kecil dari 500 KB !")==false)
      {
         return false;
      }
   }
}
function validateFileExtension(component,msg_id,msg,extns)
{
   var flag=0;
   with(component)
   {
      var ext=value.substring(value.lastIndexOf('.')+1);
      for(i=0;i<extns.length;i++)
      {
         if(ext==extns[i])
         {
            flag=0;
            break;
         }
         else
         {
            flag=1;
         }
      }
      if(flag!=0)
      {
         document.getElementById(msg_id).innerHTML=msg;
         component.value="";
         component.style.backgroundColor="#eab1b1";
         component.style.border="thin solid #000000";
         component.focus();
         return false;
      }
      else
      {
         return true;
      }
   }
}
function validateFileSize(component,maxSize,msg_id,msg)
{
   if(navigator.appName=="Microsoft Internet Explorer")
   {
      if(component.value)
      {
         var oas=new ActiveXObject("Scripting.FileSystemObject");
         var e=oas.getFile(component.value);
         var size=e.size;
      }
   }
   else
   {
      if(component.files[0]!=undefined)
      {
         size = component.files[0].size;
      }
   }
   if(size!=undefined && size>maxSize)
   {
      document.getElementById(msg_id).innerHTML=msg;
      component.value="";
      component.style.backgroundColor="#eab1b1";
      component.style.border="thin solid #000000";
      component.focus();
      return false;
   }
   else
   {
      return true;
   }
}
</script>
<script>
  $.validate({
    modules : 'security','date','file'
  });
</script>

<script>
 var myLanguage = {
      requiredFields : 'Tidak boleh kosong',
      badInt : 'Format angka belum benar.',
      lengthTooShortStart : 'Minimal ',
      lengthTooLongStart : 'Maksimal ',
      };

    $.validate({
      language : myLanguage
  });
 </script>
