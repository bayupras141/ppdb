<?php
include 'adm_header.php';
//TAMBAHKAN QUERY UNTUK MENAMPIKAN DATA YANG LOLOS DISINI
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<div class="row clearfix">
  <div class="col-lg-12 column">
    <h3>Peringkat Lolos</h3>
    Data diurutkan bersadarkan Tanggal Pendaftaran
  <br><br>
  <H3>TAMPILKAN YANG LOLOS SELEKSI DISINI</H3>

  <!-- TAMPILKAN DATA PESERTA YANG TIDAK LOLOS DI AREA INI DENGAN BENTUK TABEL -->


  
  </div>
</div>
<?php
include 'adm_footer.php';
?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5',
          'print'
      ]
  } );
} );
</script>
