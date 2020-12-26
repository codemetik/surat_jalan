<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Print</a></li>
      <li class="breadcrumb-item active">Laporan</li>
    </ol>
  </div>
</div>
<?php 
$sqlc = mysqli_query($koneksi, "SELECT count(*) as con FROM tb_customer");
$dc = mysqli_fetch_array($sqlc);

$sqlb = mysqli_query($koneksi, "SELECT count(*) as bar FROM tb_barang");
$dbar = mysqli_fetch_array($sqlb);

$sqls = mysqli_query($koneksi, "SELECT SUM(jumlah_stok) AS st FROM tb_stok");
$dstok = mysqli_fetch_array($sqls);

$sqlk = mysqli_query($koneksi, "SELECT count(*) as k, sum(barang_keluar) as bk, sum(nilai) as n FROM tb_barang_keluar");
$dk = mysqli_fetch_array($sqlk);

$sqlsj = mysqli_query($koneksi, "SELECT count(*) as sj FROM tb_surat_jalan_final");
$dsj = mysqli_fetch_array($sqlsj);

?>
<div class="card card-body">
	<div class="row">
	<div class="col-5 col-sm-3">
	    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
	      <a class="nav-link" id="vert-tabs-customer-tab" data-toggle="pill" href="#vert-tabs-customer" role="tab" aria-controls="vert-tabs-customer" aria-selected="true">Data Customer</a>
	      <a class="nav-link" id="vert-tabs-daftar-tab" data-toggle="pill" href="#vert-tabs-daftar" role="tab" aria-controls="vert-tabs-daftar" aria-selected="false">Daftar Nama Barang</a>
	      <a class="nav-link" id="vert-tabs-stok-tab" data-toggle="pill" href="#vert-tabs-stok" role="tab" aria-controls="vert-tabs-stok" aria-selected="false">Stok Barang Tersedia</a>
	      <a class="nav-link" id="vert-tabs-barang-tab" data-toggle="pill" href="#vert-tabs-barang" role="tab" aria-controls="vert-tabs-barang" aria-selected="false">Barang Keluar</a>
	      <a class="nav-link active" id="vert-tabs-surat-tab" data-toggle="pill" href="#vert-tabs-surat" role="tab" aria-controls="vert-tabs-surat" aria-selected="false">Surat Jalan</a>
	    </div>
	  </div>
	  <div class="col-7 col-sm-9">
	    <div class="tab-content" id="vert-tabs-tabContent">
	      <div class="tab-pane text-left fade" id="vert-tabs-customer" role="tabpanel" aria-labelledby="vert-tabs-customer-tab">
	         <!-- Data Customer -->
	         <h5>Data customer sebanyak : <i><?= $dc['con']; ?> Data</i></h5>
	         <a href="laporan/data/customer.php" target="_blank"><i class="fa fa-print"></i> Download</a>
	      </div>
	      <div class="tab-pane fade" id="vert-tabs-daftar" role="tabpanel" aria-labelledby="vert-tabs-daftar-tab">
	         <!-- Daftar Barang -->
	         <h5>Daftar nama barang sebanyak : <i><?= $dbar['bar']; ?> Data</i></h5>
	         <a href="laporan/data/daftar_nama_barang.php" target="_blank"><i class="fa fa-print"></i> Download</a>
	      </div>
	      <div class="tab-pane fade" id="vert-tabs-stok" role="tabpanel" aria-labelledby="vert-tabs-stok-tab">
	         <!-- Stok Barang Tersedia -->
	         <h5>Stok barang seluruhnya sebanyak : <i><?= angka($dstok['st'])." Pcs"; ?></i></h5>
	         <a href="laporan/data/stok_tersedia.php" target="_blank"><i class="fa fa-print"></i> Download</a>
	      </div>
	      <div class="tab-pane fade" id="vert-tabs-barang" role="tabpanel" aria-labelledby="vert-tabs-barang-tab">
	         <!-- Barang Keluar  -->
	         <table class="table table-responsive table-hover">
	         	<tr><th>Barang keluar sebanyak</th><th>: <i><?= $dk['k']; ?> Data</i></th></tr>
	         	<tr><th>Sub Total</th><th>: <i><?= angka($dk['bk']); ?> Pcs</i></th></tr>
	         	<tr><th>Sub Nilai</th><th>: <i><?= rupiah($dk['n']); ?></i></th></tr>
	         </table>
	         <a href="laporan/data/barang_keluar.php" target="_blank"><i class="fa fa-print"></i> Download</a>
	      </div>
	      <div class="tab-pane fade show active" id="vert-tabs-surat" role="tabpanel" aria-labelledby="vert-tabs-surat-tab">
	         <!-- Surat Jalan -->
	         <h5>Data Surat Jalan sebanyak : <i><?= $dsj['sj']." Data"; ?></i></h5>
	         <a href="laporan/data/lap_surat_jalan.php"><i class="fa fa-print"></i> Download</a>
	      </div>
	    </div>
	  </div>
	</div>
</div>
</div>