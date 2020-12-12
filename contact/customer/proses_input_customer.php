<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_customer'])) {
	$id_customer = $_POST['id_customer'];
	$nama_customer = $_POST['nama_customer'];
	$no_telpn = $_POST['no_telpn'];
	$alamat = $_POST['alamat'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_customer(id_customer, nama_customer, no_telpn, alamat) VALUES('$id_customer','$nama_customer','$no_telpn','$alamat')");

	if ($sql) {
		echo "<script>
		alert('Data Customer berhasil disimpan');
		document.location.href = '../../?page=customer';
		</script>";
	}else{
		echo "<script>
		alert('Data Customer Gagal disimpan');
		document.location.href = '../../?page=customer';
		</script>";
	}
}
?>