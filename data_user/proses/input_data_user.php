<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_user'])) {
	$id_user = $_POST['id_user'];
	$id_rols_user = $_POST['id_rols_user'];
	$nama_user = $_POST['nama_user'];
	$id_bagian = $_POST['id_bagian'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$tgl_masuk_user = $_POST['tgl_masuk_user'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_user(id_user, nama_user, username, password, confirm_password, tgl_masuk_user) VALUES('$id_user','$nama_user','$username','$pass','$confirm_password','$tgl_masuk_user')");

	$sql1 = mysqli_query($koneksi, "INSERT INTO tb_rols_user(id_rols_user, id_user, id_bagian) VALUES('$id_rols_user','$id_user','$id_bagian')");

	if ($sql && $sql1) {
		echo "<script>
		alert('Data User Berhasil dinput');
		document.location.href = '../../?page=data_user';
		</script>";
	}else{
		echo "<script>
		alert('Data User Gagal diinput');
		document.location.href = '../../?page=data_user';
		</script>";
	}
}
?>