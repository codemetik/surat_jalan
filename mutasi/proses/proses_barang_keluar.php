<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_mutasi'])) {
	$id_barang_keluar = $_POST['id_barang_keluar'];
	$id_barang = $_POST['id_barang'];
	$stok_awal = $_POST['stok_awal'];
	$barang_keluar = $_POST['barang_keluar'];
	$sisa_stok = $_POST['sisa_stok'];
	$nilai = $_POST['nilai'];
	$tgl_barang_keluar = $_POST['tgl_barang_keluar'];
	$id_customer = $_POST['id_customer'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_barang_keluar(id_barang_keluar, id_barang, stok_awal, barang_keluar, sisa_stok, nilai, tgl_barang_keluar) VALUES('$id_barang_keluar','$id_barang','$stok_awal','$barang_keluar','$sisa_stok','$nilai','$tgl_barang_keluar')");

	$sql1 = mysqli_query($koneksi, "INSERT INTO tb_rols_barang_keluar(id_barang_keluar, id_barang, id_customer) VALUES('$id_barang_keluar','$id_barang','$id_customer')");

	if ($sql && $sql1) {
		echo "<script>
		alert('Data Mutasi berhasil disimpan');
		document.location.href = '../../?page=barang_keluar';
		</script>";
	}else{
		echo "<script>
		alert('Data Mutasi gagal disimpan');
		document.location.href = '../../?page=barang_keluar';
		</script>";
	}
}
?>