<?php 
$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '".$_SESSION['id_user']."'");
$data = mysqli_fetch_array($sql);
?>
<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Profile</a></li>
    </ol>
  </div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<div class="card-title">Profile <?= $_SESSION['username']; ?>, Bagian : <?= $_SESSION['nama_bagian']; ?></div>
	</div>
<form action="" method="POST">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>ID User</label>
					<input type="text" name="id_user" class="form-control" readonly value="<?= $data['id_user']; ?>">
				</div>
				<div class="form-group">
					<label>Nama User</label>
					<input type="text" name="nama_user" class="form-control" value="<?= $data['nama_user']; ?>">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?= $data['username']; ?>">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?= $data['password']; ?>">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" class="form-control" value="<?= $data['confirm_password']; ?>">
				</div>
				<div class="form-group">
					<label>Tgl Masuk User</label>
					<input type="text" name="tgl_masuk_user" class="form-control" value="<?= $data['tgl_masuk_user']; ?>" readonly>
				</div>
			</div>
			<div class="col-sm-12">
				<button type="submit" name="simpan_perubahan" class="btn bg-blue">Simpan Perubahan</button>
			</div>
		</div>
	</div>
</form>
</div>

<?php 

if (isset($_POST['simpan_perubahan'])) {
	$id_user = $_POST['id_user'];
	$nama_user = $_POST['nama_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$tgl_masuk_user = $_POST['tgl_masuk_user'];

	$sqli = mysqli_query($koneksi, "UPDATE tb_user SET nama_user = '".$nama_user."', username = '".$username."', password = '".$password."', confirm_password = '".$confirm_password."', tgl_masuk_user = '".$tgl_masuk_user."' WHERE id_user = '".$id_user."'");

	if ($sqli) {
		echo "<script>
		alert('Perubahan Profile berhasil disimpan');
		document.location.href = '?page=profile';
		</script>";
	}else{
		echo "<script>
		alert('Perubahan Profile gagal disimpan');
		document.location.href = '?page=profile';
		</script>";
	}
}
?>