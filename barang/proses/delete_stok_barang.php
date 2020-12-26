<?php 
include "../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "DELETE FROM tb_stok WHERE id_stok = '".$id."'");
	if ($sql) {
		echo "<script>
		alert('Data Stok Barang berhasil dihapus');
		document.location.href = '../../?page=stok_tersedia';
		</script>";
	}else{
		echo "<script>
		alert('Data Stok Barang gagal dihapus');
		document.location.href = '../../?page=stok_tersedia';
		</script>";
	}
}
?>