<?php 
include "../koneksi.php";
if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_stok Y ON y.id_barang = x.id_barang WHERE X.id_barang = '".$id."'");
	while ($data = mysqli_fetch_array($sql)) {
?>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>ID Stok</label>
			<input type="text" name="id_stok" class="form-control" value="<?= $data['id_stok']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>ID Barang</label>
			<input type="text" name="id_barang" class="form-control" value="<?= $data['id_barang']; ?>" readonly>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang']; ?>" readonly>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Tgl Perubahan</label>
					<input type="text" name="tgl_input" class="form-control" value="<?= $data['tgl_input']; ?>" readonly>
				</div>		
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Edit Jumlah Stok</label>
					<input type="text" name="jumlah_stok" class="form-control" value="<?= $data['jumlah_stok']; ?>">
				</div>		
			</div>
		</div>
	</div>
</div>

<?php
	}
}
?>