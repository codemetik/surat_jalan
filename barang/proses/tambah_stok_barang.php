<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_stok'])) {
	$id_stok = $_POST['id_stok'];
	$id_barang = $_POST['id_barang'];
	$jumlah_stok = $_POST['jumlah_stok'];
	$tgl_input = $_POST['tgl_input'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_stok(id_stok, id_barang, jumlah_stok, tgl_input) VALUES('$id_stok','$id_barang','$jumlah_stok','$tgl_input')");
	if ($sql) {
		echo "<script>
		alert('Stok Barang berhasil disimpan');
		document.location.href = '../../?page=stok_tersedia';
		</script>";
	}else{
		echo "<script>
		alert('Stok Barang gagal disimpan');
		document.location.href = '../../?page=stok_tersedia';
		</script>";
	}
}
?>