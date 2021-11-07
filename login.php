<?php
// include 'koneksi.php';
include 'header.php';
?>
<div class="row clearfix">
  <div class="col-md-8 column">
    <h3>Login</h3>
  </div>
  <div class="col-md-4 column">
    <div class="well">
      <?php
      	if(isset($_GET['pesan'])){
      		if($_GET['pesan']=="gagal"){
      			echo "<div class='alert' style='color:red;'>Username dan Password tidak sesuai !</div>";
      		}
      	}
      ?>
      <form action="cek_login.php" method="post">
        <div style="color: red;"></div>
        <div style="color: red;"></div>
        <div style="color: red;"></div>
        <div style="color: red;"></div>
        <table>
          <tbody>
            <tr>
              <td width="125" style="text-align:right;">No. Pendaftaran &nbsp;&nbsp;</td>
              <td width="300"><input type="text" name="username" id="username" maxlength="80" size="30" class="form-control" required="required"></td>
            </tr>
          <tr>
            <td style="text-align:right;">Password &nbsp;&nbsp;</td>
            <td><input type="password" name="password" id="password" size="30" class="form-control" required="required"></td>
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
          </tbody>
        </table>
        <div class="pull-right"><button type="submit" name="login" class="btn btn-primary">Masuk</button></div>
        <br><br>
      </form>
      <p>Username : admin | Password : 123</p>
    </div>
  </div>
</div>
<div class="col-md-8 column">
    
</div>
<?php include 'footer.php'; ?>
