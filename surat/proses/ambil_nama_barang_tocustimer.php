<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_barang'])) {
	$idcustom = $_POST['id_custom'];
	$id_barang_keluar = $_POST['id_barang_keluar'];

	$cek = mysqli_query($koneksi, "SELECT * FROM tb_barang_keluar WHERE id_barang_keluar = '$id_barang_keluar'");
	$dcek = mysqli_fetch_array($cek);

	$sql = mysqli_query($koneksi, "INSERT INTO tb_surat_jalan_masal(id_barang_keluar, jumlah_barang) VALUES('".$dcek['id_barang_keluar']."','".$dcek['barang_keluar']."')");
	if ($sql) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href= '../../?page=detail_surat_jalan&idcustomer=$idcustom';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href= '../../?page=detail_surat_jalan&idcustomer=$idcustom';
		</script>";
	}
}

?>