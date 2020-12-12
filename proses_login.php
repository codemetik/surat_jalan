<?php 
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_user X INNER JOIN tb_rols_user Y ON y.id_user = x.id_user INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian WHERE username = '".$username."' AND password = '".$password."'");
	$data = mysqli_fetch_array($sql);
	$dcek = mysqli_num_rows($sql);
	if ($dcek > 0) {

		$_SESSION['username'] = $data['username'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['id_bagian'] = $data['id_bagian'];
		$_SESSION['nama_bagian'] = $data['nama_bagian'];
		$_SESSION['nama_bagian'] = $data['nama_bagian'];
		echo "<script>
		alert('Anda Berhasil Login sebagai ".$data['nama_bagian']."');
		document.location.href = 'index.php';
		</script>";
	}else{
		echo "<script>
		alert('Anda Gagal Login');
		document.location.href = 'login.php';
		</script>";
	}

}
?>