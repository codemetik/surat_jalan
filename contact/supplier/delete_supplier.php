<?php 
include "../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "DELETE FROM tb_supplier WHERE id_supplier = '".$id."'");

	if ($sql) {
		echo "<script>
		alert('Data Supplier berhasil dihapus');
		document.location.href = '../../?page=supplier';
		</script>";
	}else{
		echo "<script>
		alert('Data Supplier gagal dihapus');
		document.location.href = '../../?page=supplier';
		</script>";
	}
}
?>