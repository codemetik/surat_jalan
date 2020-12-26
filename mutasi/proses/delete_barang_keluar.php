<?php 
include "../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "DELETE FROM tb_barang_keluar WHERE id_barang_keluar = '".$id."'");
	if ($sql) {
		echo "<script>
		alert('Data Mutasi Barang Keluar berhasil dihapus');
		document.location.href = '../../?page=barang_keluar';
		</script>";
	}else{
		echo "<script>
		alert('Data Mutasi Barang Keluar gagal dihapus');
		document.location.href = '../../?page=barang_keluar';
		</script>";
	}
}
?>