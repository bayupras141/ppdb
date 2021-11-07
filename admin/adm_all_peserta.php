<?php
include 'adm_header.php';
include '../koneksi.php';
date_default_timezone_set("Asia/Jakarta");

// QUERY UNTUK MENAMPILKAN DATA PESERTA
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<div class="row clearfix">
  <div class="col-lg-12 column">
    <h3>TAMPILKAN SELURUH DATA PESERTA DISINI</h3>
    <table class="table table-bordered thead-dark" id="table">
        <thead class>
            <tr class="table-primary">
                <td>No Pendaftaran</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>                
                <td>Tempat, Tgl lahir</td>                
                <td>Nisn</td>                
                <td>Foto</td>                
                <td>Aksi</td>                
            </tr>
        </thead>
        <tbody>
          <?php
              $query = mysqli_query($connect, "SELECT * FROM daftar WHERE dfr_no NOT IN ('admin')");
              while ($data = mysqli_fetch_array($query)) {
          ?>
              <tr>
                  <td><?php echo $data['dfr_no'] ?></td>
                  <td><?php echo $data['dfr_nama'] ?></td>
                  <td>
                  <?php  
                    if ($data['dfr_jekel'] == 1) {
                      # code...
                      echo "Laki-laki";
                    } else {
                      # code...
                      echo "Perempuan";
                    }
                  ?>
                  </td>
                  <td><?php echo $data['dfr_alamat'] ?></td>
                  <td><?php echo $data['dfr_tmp_lahir'].", ". $data['dfr_tgl_lahir'] ?></td>
                  <td><?php echo $data['dfr_nisn']?></td>
                  <td><img width="125" src="../gambar/<?php echo $data['dfr_pas_photo']; ?>"></td>
                  <td align="center">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="adm_edit_pendaftar.php?id=<?= $data['dfr_no']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-success">Edit</a>
                        <a href="adm_detail_peserta.php?id=<?= $data['dfr_no']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-primary">Detail</a>
                        <a href="hapus_peserta.php?id=<?= $data['dfr_no']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger">Hapus</a>
                      </div>
                  </td>
                </tr>
          
                <?php } ?> 
        </tbody>
    </table>
  </div>
</div>
<?php
include 'adm_footer.php';
?>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#data').DataTable();
  });
</script>
