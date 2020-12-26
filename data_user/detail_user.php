<?php 
include "../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_bagian X INNER JOIN tb_rols_user Y ON y.id_bagian = x.id_bagian INNER JOIN tb_user z ON z.id_user = y.id_user WHERE y.id_user = '".$id."'");
	$data = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>ID User</label>
			<input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Nama User</label>
			<input type="text" name="nama_user" class="form-control" value="<?= $data['nama_user']; ?>">
		</div>
		<div class="form-group">
			<label>Jabatan</label>
			<select class="form-control-sm select2" name="id_bagian">
				<?php 
				$bg = mysqli_query($koneksi, "SELECT * FROM tb_bagian");
				while ($dg = mysqli_fetch_array($bg)) {
					if ($data['id_bagian'] == $dg['id_bagian']) {
						$select = 'selected';
					}else{
						$select = '';
					}
					echo "<option value='".$dg['id_bagian']."' ".$select.">".$dg['nama_bagian']."</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" value="<?= $data['username']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="confirm_password" class="form-control" value="<?= $data['confirm_password']; ?>" readonly>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>Tanggal Masuk User</label>
			<input type="text" name="tgl_masuk_user" class="form-control" value="<?= $data['tgl_masuk_user']; ?>" readonly>
		</div>
	</div>
</div>
<?php 
}
?>

<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script>
$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})
</script>