<?php 
include "../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = '".$id."'");
	if ($sql) {
		echo "<script>
		alert('Data User Berhasil dihapus');
		document.location.href = '../../?page=data_user';
		</script>";
	}else{
		echo "<script>
		alert('Data User Gagal dihapus');
		document.location.href = '../../?page=data_user';
		</script>";
	}
}
?>