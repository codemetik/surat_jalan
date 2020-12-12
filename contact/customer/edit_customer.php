<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_customer = $_POST['id_customer'];
	$nama_customer = $_POST['nama_customer'];
	$no_telpn = $_POST['no_telpn'];
	$alamat = $_POST['alamat'];

	$sql = mysqli_query($koneksi, "UPDATE tb_customer SET nama_customer = '".$nama_customer."', no_telpn = '".$no_telpn."', alamat = '".$alamat."' WHERE id_customer = '".$id_customer."'");

	if ($sql) {
		echo "<script>
		alert('Data Customer berhasil di edit');
		document.location.href = '../../?page=customer';
		</script>";
	}else{
		echo "<script>
		alert('Data Customer berhasil di edit');
		document.location.href = '../../?page=customer';
		</script>";
	}
}
?>