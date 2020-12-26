<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_stok = $_POST['id_stok'];
	$id_barang = $_POST['id_barang'];
	$jumlah_stok = $_POST['jumlah_stok'];
	$tgl_input = $_POST['tgl_input'];

	$sql = mysqli_query($koneksi, "UPDATE tb_stok SET jumlah_stok = '".$jumlah_stok."' WHERE id_barang = '".$id_barang."'");

	if ($sql) {
		echo "<script>
		alert('Data Stok Barang berhasil diupdate');
		document.location.href = '../../?page=stok_tersedia';
		</script>";	
	}else{
		echo "<script>
			alert('Data Stok Barang gagal diupdate');
			document.location.href = '../../?page=stok_tersedia';
			</script>";	
	}
}
?>