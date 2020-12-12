<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_barang'])) {
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$qty = $_POST['qty'];
	$harga_satuan = $_POST['harga_satuan'];
	$tgl_barang = $_POST['tgl_barang'];

	$id_jenis = $_POST['id_jenis'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_barang(id_barang, nama_barang, qty, harga_satuan, tgl_barang) VALUES('$id_barang','$nama_barang','$qty','$harga_satuan','$tgl_barang')");
	
	$jenis = mysqli_query($koneksi, "INSERT INTO tb_rols_jenis(id_barang, id_jenis) VALUES('$id_barang','$id_jenis')");
	
	if ($sql && $jenis) {
		echo "<script>
		alert('Data Barang berhasil disimpan');
		document.location.href = '../../?page=daftar_barang';
		</script>";
	}else{
		echo "<script>
		alert('Data Barang gagal disimpan');
		document.location.href = '../../?page=daftar_barang';
		</script>";
	}
}
?>