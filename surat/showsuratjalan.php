<?php 
include "../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$jln = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan_final X INNER JOIN tb_customer Y ON y.id_customer = x.id_customer WHERE id_surat_jalan = '".$id."'");
	$dj = mysqli_fetch_array($jln);
?>
<div class="row">
	<div class="col-sm-6 bg-gray">
		<table class="table table-responsive">
			<tr>
				<th>SURAT JALAN NO</th><th>:</th>
				<td><?= $dj['surat_jalan_no']; ?></td>
			</tr>
			<tr>
				<th>NO PO CUSTOMER</th><th>:</th>
				<td><?= $dj['no_po_customer']; ?></td>
			</tr>
			<tr>
				<th>TANGGAL</th><th>:</th>
				<td><?= $dj['tgl_surat_jalan']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-sm-6 bg-gray">
		<table class="table table-responsive">
			<tr>
				<th>KEPADA</th><th>:</th>
				<td style="height: 50px; width: 100%;"><?= $dj['nama_customer'].", No Telpn : ".$dj['no_telpn'].", ".$dj['alamat']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-sm-12 mt-2">
		<div class="card-body table-responsive p-0" style="height: 250px;">
			<table class="table table-hover table-thead-fixed table-nowrap">
				<thead class="bg-info">
					<tr>
						<th>Banyaknya Barang</th>
						<th>Nama Barang</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan X INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_barang z ON z.id_barang = y.id_barang WHERE id_surat_jalan = '".$id."'");
					while ($data = mysqli_fetch_array($sql)) {
						echo "<tr>
						<td>".$data['jumlah_barang']." Pcs"."</td>
						<td>".$data['nama_barang']."</td>
						</tr>";
					}
					?>
				</tbody>
			</table>
		</div>		
	</div>
</div>

<?php 
}
?>