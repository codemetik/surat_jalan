<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_surat_jalan'])) {

	//untuk insert ke tb_surat_jalan_final
	$id_surat_jalan = $_POST['id_surat_jalan'];
	$no_surat_jalan = $_POST['no_surat_jalan'];
	$no_po_customer = $_POST['no_po_customer'];
	$id_customer = $_POST['id_customer'];
	$tgl_surat_jalan = $_POST['tgl_surat_jalan'];

	$sqlfinal = mysqli_query($koneksi, "INSERT INTO tb_surat_jalan_final(id_surat_jalan,surat_jalan_no,id_customer,no_po_customer,tgl_surat_jalan) VALUES('$id_surat_jalan','$no_surat_jalan','$id_customer','$no_po_customer','$tgl_surat_jalan')");

	if ($sqlfinal) {
		//untuk insert ke tb_surat_jalan
		$jml_brg = $_POST['jumlah_barang'];
		$id_surat_jln = $_POST['id_surat_jln'];
		$id_brg_keluar = $_POST['id_barang_keluar'];

		$isi = count($jml_brg);
		
		//membuat perulangan untuk table barang yang keluar
		for ($i=0; $i < $isi ; $i++) { 
			$sql = mysqli_query($koneksi, "INSERT INTO tb_surat_jalan(id_surat_jalan,id_barang_keluar,jumlah_barang) VALUES('$id_surat_jln[$i]','$id_brg_keluar[$i]','$jml_brg[$i]')");
			$sqlup = mysqli_query($koneksi, "UPDATE tb_barang_keluar SET status = 'Ok' WHERE id_barang_keluar = '$id_brg_keluar[$i]'");

			$del = mysqli_query($koneksi, "DELETE FROM tb_surat_jalan_masal WHERE id_barang_keluar = '$id_brg_keluar[$i]'");

			if ($sql && $sqlup && $del) {
				echo "<script>
				alert('Data Berhasil disimpan ke History');
				document.location.href= '../../?page=history_surat_jalan';
				</script>";
			}else{
				echo "<script>
				alert('Data Gagal disimpan ke History');
				document.location.href= '../../?page=detail_surat_jalan&idcustomer=$id_customer';
				</script>";
			}

		}//tutup perulangan

	}else{
		echo "<script>
		alert('Data Final Gagal disimpan ke History');
		document.location.href= '../../?page=detail_surat_jalan&idcustomer=$id_customer';
		</script>";
	}

}
?>