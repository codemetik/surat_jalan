<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_supplier'])) {
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$no_telpn = $_POST['no_telpn'];
	$alamat = $_POST['alamat'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_supplier(id_supplier, nama_supplier, no_telpn, alamat) VALUES('$id_supplier','$nama_supplier','$no_telpn','$alamat')");

	if ($sql) {
		echo "<script>
		alert('Data Supplier berhasil disimpan');
		document.location.href = '../../?page=supplier';
		</script>";
	}else{
		echo "<script>
		alert('Data Supplier gagal disimpan');
		document.location.href = '../../?page=supplier';
		</script>";
	}
}
?>