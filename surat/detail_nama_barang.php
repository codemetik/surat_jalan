<?php 
include "../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	// $cs = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer = '".$id."'");
	// $csdata = mysqli_fetch_array($cs);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Nama Barang</label>
			<select class="form-control-sm select2" name="id_barang_keluar">
				<option>--pilih ID Atau Nama--</option>
				<?php 
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_rols_barang_keluar X INNER JOIN tb_barang_keluar z ON z.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_customer Y ON y.id_customer = x.id_customer INNER JOIN tb_barang a ON a.id_barang = x.id_barang WHERE x.id_customer = '".$id."' AND status != 'Ok'");
				while ($dat = mysqli_fetch_array($sql)) {
					$cekmasal = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan_masal WHERE id_barang_keluar = '".$dat['id_barang_keluar']."'");
					$cm  = mysqli_fetch_array($cekmasal);
					if ($cm['id_barang_keluar'] == $dat['id_barang_keluar']) {
							
					}else{
						echo "<option value='".$dat['id_barang_keluar']."'>".$dat['id_barang'].", ".$dat['nama_barang'].", Jml : ".$dat['barang_keluar']." Pcs".", Tgl Keluar : ".$dat['tgl_barang_keluar']."</option>";
					}
					
				}
				?>
			</select>
		</div>
		
	</div>
</div>

<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script>
$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})
</script>

<?php
}
?>