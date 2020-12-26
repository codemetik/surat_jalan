<?php 
include "../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_bagian WHERE id_bagian = '".$id."'");
	$data = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>ID Bagian</label>
			<input type="text" name="id_bagian" class="form-control" value="<?= $data['id_bagian']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Nama Bagian</label>
			<input type="text" name="nama_bagian" class="form-control" value="<?= $data['nama_bagian']; ?>">
		</div>
	</div>
</div>
<?php 
}
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