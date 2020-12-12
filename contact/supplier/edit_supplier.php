<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$no_telpn = $_POST['no_telpn'];
	$alamat = $_POST['alamat'];

	$sql = mysqli_query($koneksi, "UPDATE tb_supplier SET nama_supplier = '".$nama_supplier."', no_telpn = '".$no_telpn."', alamat = '".$alamat."' WHERE id_supplier = '".$id_supplier."'");

	if ($sql) {
		echo "<script>
		alert('Data Supplier berhasil di edit');
		document.location.href = '../../?page=supplier';
		</script>";
	}else{
		echo "<script>
		alert('Data Supplier berhasil di edit');
		document.location.href = '../../?page=supplier';
		</script>";
	}
}
?>