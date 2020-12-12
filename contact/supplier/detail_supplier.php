<?php 
include "../../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier = '".$id."'");
	$data = mysqli_fetch_array($sql);

?>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>ID Supplier</label>
			<input type="text" name="id_supplier" class="form-control" value="<?= $data['id_supplier']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Nama Supplier</label>
			<input type="text" name="nama_supplier" class="form-control" value="<?= $data['nama_supplier']; ?>">
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>No Telpn</label>
			<input type="text" name="no_telpn" class="form-control" value="<?= $data['no_telpn']; ?>">
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?= $data['alamat']; ?>">
		</div>
	</div>
</div>
<?php
}
?>