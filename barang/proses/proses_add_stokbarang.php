<?php 
include "../../koneksi.php";

if (isset($_POST['simpanstokbarang'])) {
	$id_barang = $_POST['id_barang'];
	$jumlah_stok = $_POST['jumlah_stok'];
	$tgl_input = $_POST['tgl_add_stok'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_add_stok(id_barang, jumlah_stok, tgl_add_stok) VALUES('$id_barang','$jumlah_stok','$tgl_input')");
	if ($sql) {
		echo "<script>
		alert('Data Stok Barang berhasil ditambah');
		document.location.href = '../../?page=stok_tersedia';
		</script>";	
	}else{
		echo "<script>
		alert('Data Stok Barang Gagal ditambah');
		document.location.href = '../../?page=stok_tersedia';
		</script>";	
	}
}
?>