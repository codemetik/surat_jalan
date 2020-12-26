<?php 
include "../../koneksi.php";

if (isset($_GET['idmasal'])) {
	$idmasal = $_GET['idmasal'];
	$idcustom = $_GET['idcustom'];

	$sql = mysqli_query($koneksi, "DELETE FROM tb_surat_jalan_masal WHERE id_masal = '".$idmasal."'");
	if ($sql) {
		echo "<script>
		alert('Data Berhasil dihapus');
		document.location.href= '../../?page=detail_surat_jalan&idcustomer=$idcustom';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal dihapus');
		document.location.href= '../../?page=detail_surat_jalan&idcustomer=$idcustom';
		</script>";
	}
}
?>