<?php 
include "../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

$sql = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_rols_jenis Y ON y.id_barang = x.id_barang WHERE x.id_barang = '".$id."'");
$data = mysqli_fetch_array($sql); 

// $customer = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_rols_customer Y ON y.id_barang = x.id_barang WHERE x.id_barang = '".$id."'");
// $dcustomer = mysqli_fetch_array($customer);

?>

<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>ID Barang</label>
			<input type="text" name="id_barang" class="form-control" value="<?= $data['id_barang']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Janis</label>
			<select class="form-control-sm select2" name="id_jenis">
				<option>--Pilih</option>
				<?php 
				$sjenis = mysqli_query($koneksi, "SELECT * FROM tb_jenis");
				while ($dj = mysqli_fetch_array($sjenis)) {
					if ($data['id_jenis'] == $dj['id_jenis']) {
						$select = "selected";
					}else{
						$select = "";
					}

					echo "<option value='".$dj['id_jenis']."' ".$select.">".$dj['nama_jenis']."</option>";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Tanggal Barang</label>
			<input type="text" name="tgl_barang" class="form-control" value="<?= $data['tgl_barang']; ?>" readonly>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="form-group">
			<label>Nama Barang</label>
			<input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang']; ?>">
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Qty</label>
					<input type="text" name="qty" class="form-control" value="<?= $data['qty']; ?>">
				</div>
				<div class="form-group">
					<label>Harga Satuan</label>
					<input type="text" name="harga_satuan" class="form-control" value="<?= $data['harga_satuan']; ?>">
				</div>			
			</div>
			<div class="col-sm-6">
			
			</div>
		</div>
	</div>
</div>


<?php }
?>

<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script>
$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})
</script>