<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$qty = $_POST['qty'];
	$harga_satuan = $_POST['harga_satuan'];
	$tgl_barang = $_POST['tgl_barang'];

	$id_jenis = $_POST['id_jenis'];

	$sql = mysqli_query($koneksi, "UPDATE tb_barang SET nama_barang = '".$nama_barang."', qty = '".$qty."', harga_satuan = '".$harga_satuan."' WHERE id_barang = '".$id_barang."'");
	$sql1 = mysqli_query($koneksi, "UPDATE tb_rols_jenis SET id_jenis = '".$id_jenis."' WHERE id_barang = '".$id_barang."'");

	if ($sql && $sql1) {
		echo "<script>
		alert('Data Barang berhasil diupdate');
		document.location.href = '../../?page=daftar_barang';
		</script>";	
	}else{
		echo "<script>
		alert('Data Barang gagal diupdate');
		document.location.href = '../../?page=daftar_barang';
		</script>";
	}

	
}
?>