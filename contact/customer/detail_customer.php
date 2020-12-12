<?php 
include "../../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer = '".$id."'");
	$data = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>ID Customer</label>
			<input type="text" name="id_customer" class="form-control" value="<?= $data['id_customer']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Nama Customer</label>
			<input type="text" name="nama_customer" class="form-control" value="<?= $data['nama_customer']; ?>">
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