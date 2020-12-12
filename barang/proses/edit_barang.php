<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$qty = $_POST['qty'];
	$harga_satuan = $_POST['harga_satuan'];
	$tgl_barang = $_POST['tgl_barang'];

	$id_jenis = $_POST['id_jenis'];
	$id_customer = $_POST['id_customer'];

	$cek = mysqli_query($koneksi, "SELECT * FROM tb_rols_customer WHERE id_barang = '".$id_barang."'");
	$dcek = mysqli_num_rows($cek);

	if ($dcek > 0) {
		//jika data customer sudah ada maka update data pada tb_barang, tb_jenis dan update juga tb_rols_customer
		$sql = mysqli_query($koneksi, "UPDATE tb_barang SET nama_barang = '".$nama_barang."', qty = '".$qty."', harga_satuan = '".$harga_satuan."' WHERE id_barang = '".$id_barang."'");
		$sql1 = mysqli_query($koneksi, "UPDATE tb_rols_jenis SET id_jenis = '".$id_jenis."' WHERE id_barang = '".$id_barang."'");
		$sql2 = mysqli_query($koneksi, "UPDATE tb_rols_customer SET id_customer = '".$id_customer."' WHERE id_barang = '".$id_barang."'");

		if ($sql && $sql1 && $sql2) {
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

	}else{
		//jika data customer belum ada maka update data pada tb_barang, tb_jenis namun insert table pada tb_rols_customer
		$sql = mysqli_query($koneksi, "UPDATE tb_barang SET nama_barang = '".$nama_barang."', qty = '".$qty."', harga_satuan = '".$harga_satuan."' WHERE id_barang = '".$id_barang."'");
		$sql1 = mysqli_query($koneksi, "UPDATE tb_rols_jenis SET id_jenis = '".$id_jenis."' WHERE id_barang = '".$id_barang."'");
		$sql2 = mysqli_query($koneksi, "INSERT INTO tb_rols_customer(id_barang, id_customer) VALUES('$id_barang','$id_customer')");

		if ($sql && $sql1 && $sql2) {
			echo "<script>
			alert('Data Barang berhasil diupdate dengan data customer baru');
			document.location.href = '../../?page=daftar_barang';
			</script>";	
		}else{
			echo "<script>
			alert('Data Barang gagal diupdate');
			document.location.href = '../../?page=daftar_barang';
			</script>";
		}
	}
}
?>