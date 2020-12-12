<?php 
include "../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang = '".$id."'");

	if ($sql) {
		echo "<script>
		alert('Data Barang berhasil dihapus');
		document.location.href = '../../?page=daftar_barang';
		</script>";
	}else{
		echo "<script>
		alert('Data Barang berhasil dihapus');
		document.location.href = '../../?page=daftar_barang';
		</script>";
	}
}
?>