<?php 
include "../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = mysqli_query($koneksi, "DELETE FROM tb_customer WHERE id_customer = '".$id."'");

	if ($sql) {
		echo "<script>
		alert('Data Customer berhasil dihapus');
		document.location.href = '../../?page=customer';
		</script>";
	}else{
		echo "<script>
		alert('Data Customer gagal dihapus');
		document.location.href = '../../?page=customer';
		</script>";
	}
}
?>