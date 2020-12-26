<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_rols_barang_keluar = $_POST['id_rols_barang_keluar'];
	$id_barang_keluar = $_POST['id_barang_keluar'];
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$stok_awal = $_POST['stok_awal'];
	$harga_satuan = $_POST['harga_satuan'];
	$barang_keluar = $_POST['barang_keluar'];
	$id_customer = $_POST['id_customer'];

	$sisa_stok = $stok_awal - $barang_keluar;
	$nilai = $harga_satuan * $barang_keluar;

	$sql = mysqli_query($koneksi, "UPDATE tb_rols_barang_keluar SET id_customer = '".$id_customer."' WHERE id_rols_barang_keluar = '".$id_rols_barang_keluar."'");
	$sql1 = mysqli_query($koneksi, "UPDATE tb_barang_keluar SET stok_awal = '".$stok_awal."', barang_keluar = '".$barang_keluar."', sisa_stok = '".$sisa_stok."', nilai = '".$nilai."' WHERE id_barang_keluar = '".$id_barang_keluar."'");
	if ($sql && $sql1) {
		echo "<script>
		alert('Data Mutasi Barang Keluar berhasil diedit');
		document.location.href = '../../?page=barang_keluar';
		</script>";
	}else{
		echo "<script>
		alert('Data Mutasi Barang Keluar gagal diedit');
		document.location.href = '../../?page=barang_keluar';
		</script>";
	}

	//akan lanjut lagi
}
?>