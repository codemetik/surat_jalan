<?php 
include "../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_rols_barang_keluar X INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_barang z ON z.id_barang = y.id_barang INNER JOIN tb_customer a ON a.id_customer = x.id_customer WHERE x.id_barang_keluar = '".$id."'");
	$data = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>ID Rols Barang Keluar</label>
			<input type="text" name="id_rols_barang_keluar" class="form-control" value="<?= $data['id_rols_barang_keluar']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>ID Barang Keluar</label>
			<input type="text" name="id_barang_keluar" class="form-control" value="<?= $data['id_barang_keluar']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>ID Barang</label>
			<input type="text" name="id_barang" class="form-control" value="<?= $data['id_barang']; ?>" readonly>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Nama Barang</label>
			<input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Stok Awal</label>
			<input type="text" name="stok_awal" id="jumlah_stok" class="form-control" value="<?= $data['stok_awal']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Harga Satuan</label>
			<input type="text" name="harga_satuan" id="harga_satuan" class="form-control" value="<?= $data['harga_satuan']; ?>" readonly>
		</div>	
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Jml Barang Keluar</label>
			<input type="text" name="barang_keluar" id="jumlah_brg_keluar" class="form-control" onkeyup="htung();" value="<?= $data['barang_keluar']; ?>">
		</div>
		<div class="form-group">
			<label>Customer</label>
			<select class="form-control-sm select2" name="id_customer">
				<option>--Pilih--</option>
				<?php 
				$cus = mysqli_query($koneksi, "SELECT * FROM tb_customer");
				while ($dcus = mysqli_fetch_array($cus)) {
					if ($data['id_customer'] == $dcus['id_customer']) {
						$select = "selected";
					}else{
						$select = "";
					}
					echo "<option value='".$dcus['id_customer']."' ".$select.">".$dcus['nama_customer']."</option>";
				}
				?>
			</select>
		</div>
	</div>
</div>
<?php 
}
?>

<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script>
function htung() {
		var brg_keluar = document.getElementById('jumlah_brg_keluar').value;
		var jml_stok = document.getElementById('jumlah_stok').value;
		var hrg_satuan = document.getElementById('harga_satuan').value;

		var hasil = jml_stok - brg_keluar;
		var total = brg_keluar * hrg_satuan;
		document.getElementById('sisa_stok').value = hasil;
		document.getElementById('harga').value = total;
	}

$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})
</script>