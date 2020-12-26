<?php 
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_bagian = $_POST['id_bagian'];
	$nama_bagian = $_POST['nama_bagian'];

	$sql = mysqli_query($koneksi, "UPDATE tb_bagian SET nama_bagian = '".$nama_bagian."' WHERE id_bagian = '".$id_bagian."' ");

	if ($sql) {
		echo "<script>
		alert('Data Jabatan Berhasil diubah');
		document.location.href = '../../?page=jabatan';
		</script>";
	}else{
		echo "<script>
		alert('Data User Berhasil diubah');
		document.location.href = '../../?page=jabatan';
		</script>";
	}
}
?>