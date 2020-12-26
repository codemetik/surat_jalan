<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_user = $_POST['id_user'];
	$nama_user = $_POST['nama_user'];
	$id_bagian = $_POST['id_bagian'];

	$sql = mysqli_query($koneksi, "UPDATE tb_user SET nama_user = '".$nama_user."' WHERE id_user = '".$id_user."' ");
	$sql1 = mysqli_query($koneksi, "UPDATE tb_rols_user SET id_bagian = '".$id_bagian."' WHERE id_user = '".$id_user."'");

	if ($sql && $sql1) {
		echo "<script>
		alert('Data User Berhasil diubah');
		document.location.href = '../../?page=data_user';
		</script>";
	}else{
		echo "<script>
		alert('Data User Gagal diubah');
		document.location.href = '../../?page=data_user';
		</script>";
	}
}
?>