<?php 
include "../../koneksi.php"; 

$id = $_GET['idsurat'];
$jln = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan_final X INNER JOIN tb_customer Y ON y.id_customer = x.id_customer WHERE id_surat_jalan = '".$id."'");
  $dj = mysqli_fetch_array($jln);
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PBU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <!-- <i class="fas fa-globe"></i> <u>PT. PURNAMAJAYA BHAKTI UTAMA</u> -->
          <!-- <small class="float-right">Date: <?= date('Y/m/d'); ?></small> -->
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <address>
          <!-- Head Office : Jl. Raya Buaran Gardu No. 165 Serpong - Tangerang Selatan Phone : (021)75872217, 756722670 Fax : (021)75872138<br>
          Factory: Jl. Nibanrimin No. 33 Buaran Gardu Serpong - Tangerang Selatan Phone : (021)7561988, 7561983<br>
          Branch Office : Jl. Rasamala Elok No. 35 Jakarta Timur Phone : (021)4807744<br>
          Email: pbu.marketing@yahoo.com pbu.1988@yahoo.com -->
        </address>
      </div>
      <div class="col-sm-6 invoice-col">
        <div class="row">
          <div class="col-6">
            <h5>SURAT JALAN NO </h5>
          </div>
          <div class="col-6">
            <P>: <?= $dj['surat_jalan_no']; ?></P>
          </div>
          <div class="col-6">
            <h5>NO PO CUSTOMER </h5>
          </div>
          <div class="col-6">
            <P>: <?= $dj['no_po_customer']; ?></P>
          </div>
          <div class="col-6">
            <h5>TANGGAL </h5>
          </div>
          <div class="col-6">
            <P>: <?= $dj['tgl_surat_jalan']; ?></P>
          </div>
        </div>
  </div>
  <div class="col-sm-6 invoice-col">
    <div class="row">
      <div class="col-2">
        <h5>Kepada</h5>
      </div>
      <div class="col-8">
        <p class="text-justify"> : <?= $dj['nama_customer'].", No Telpn : ".$dj['no_telpn'].", ".$dj['alamat']; ?></p>
      </div>
    </div>
  </div>
      <!-- /.col -->
      <!-- <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div> -->
      <!-- /.col -->
      <!-- <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <hr>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive mb-5">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Banyaknya</th>
              <th>Nama Barang</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan X INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_barang z ON z.id_barang = y.id_barang WHERE id_surat_jalan = '".$id."'");
            while ($data = mysqli_fetch_array($sql)) {
              echo "<tr>
                <td>".$data['jumlah_barang']."</td>
                <td width='450px'>".$data['nama_barang']."</td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <h6 class="text-center" style="margin-bottom: 120px;">DITERIMA</h6>
        <h6 class="text-center">( . . . . . . . . . . . . . . . . . . . . )</h6>
      </div>
      <div class="col-4">
        <h6 class="text-center" style="margin-bottom: 120px;">NOMOR KENDARAAN</h6>
        <h6 class="text-center">( . . . . . . . . . . . . . . . . . . . . )</h6>
      </div>
      <div class="col-4">
        <h6 class="text-center" style="margin-bottom: 120px;">DIKIRIM</h6>
        <h6 class="text-center">( . . . . . . . . . . . . . . . . . . . . )</h6>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
