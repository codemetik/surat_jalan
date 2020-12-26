<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Surat Jalan</a></li>
      <li class="breadcrumb-item active">Kelola Surat Jalan</li>
    </ol>
  </div>
</div>
<?php 
//buka post
if (isset($_POST['detail']) && isset($_POST['id_customer'])) {
	$id_customer = $_POST['id_customer'];
	$detail_penerima = $_POST['detail_penerima'];
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer= '".$id_customer."'");
	$data = mysqli_fetch_array($sql);

	//cari_id
	$isi = explode(" ", $data['nama_customer']);
	$ex = $isi[1];
	$cari_kd=mysqli_query($koneksi, "SELECT max(id_surat_jalan)as jln, max(no_po_customer)as po, max(surat_jalan_no)as no_surat from tb_surat_jalan_final");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kode=(int)substr($tm_cari['jln'], 3,4);
	$po=(int)substr($tm_cari['po'], 2,4);
	$no_surat=(int)substr($tm_cari['no_surat'], 0, 4);
	$tambah=$kode+1;
	$pluspo=$po+1;
	$nosurat = $no_surat+1;
	if ($tambah<10 && $pluspo<10 && $nosurat) {
		$id="ISJ000".$tambah;
		$idpo = "NP000".$pluspo.$ex;
		$no = "000".$nosurat."/PBU/".date('Y');
	}else{
		$id="ISJ00".$tambah;
		$idpo = "NP00".$pluspo.$ex;
		$no = "00".$nosurat."/PBU/".date('Y');
	}
?>

<div class="card">
	<div class="card-header bg-info">
		<h5><?= $data['nama_customer']; ?></h5>
		<a href="#tambahnamabarang" data-toggle="modal" data-id="<?= $id_customer; ?>" class="btn bg-danger text-dark"><i class="fa fa-plus"></i> Tambah Barang</a>
	</div>
	<div class="card-body bg-gray">
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Surat Jalan No :</label>
							<input type="text" name="no_surat_jalan" class="form-control" value="<?= $no; ?>" readonly>
						</div>		
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>No Po Customer :</label>
							<input type="text" name="no_po_customer" class="form-control" value="<?= $idpo; ?>" readonly>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Tanggal</label>
					<input type="text" name="tgl_surat_jalan" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Detail Penerima / Kepada :</label>
					<textarea class="form-control" name="kepada" value="<?= $detail_penerima; ?>" readonly><?= $detail_penerima; ?></textarea>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-hover table-bordered able-head-fixed table-nowrap">
						<thead>
							<tr>
								<th>Banyaknya</th>
								<th>ID Barang Keluar</th>
								<th>Nama Barang</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan_masal X INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_barang z ON z.id_barang = y.id_barang");
							while ($data = mysqli_fetch_array($sql)) {
								echo "<tr>
								<td>
								<input type='text' name='jumlah_barang[]' class='form-control bg-white' value='".$data['jumlah_barang']."' readonly>
								</td>
								<td hidden>
								<input type='text' name='id_surat_jln[]' class='form-control bg-white' value='".$id."' readonly>
								</td>
								<td>
								<input type='text' name='id_barang_keluar[]' class='form-control bg-white' value='".$data['id_barang_keluar']."' readonly>
								</td>
								<td>
								<input type='text' name='nama_barang[]' class='form-control bg-white' value='".$data['nama_barang']."' readonly>
								</td>";
								?>
								<td>
								<a href="surat/proses/delete_brg.php?idmasal=<?= $data['id_masal']; ?>&idcustom=<?= $id_customer; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data barang ini?')"><i class="fa fa-trash-alt"></i></a>
								</td>
								<?php
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
} //tutup POST

if(isset($_GET['idcustomer'])){
	$id_customer = $_GET['idcustomer'];
	// $detail_penerima = $_POST['detail_penerima'];
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer= '".$id_customer."'");
	$data = mysqli_fetch_array($sql);
	$isipenerima = $data['nama_customer'].", No Telpn : ".$data['no_telpn'].", ".$data['alamat'];

	//cari_id
	$isi = explode(" ", $data['nama_customer']);
	$ex = $isi[1];
	$cari_kd=mysqli_query($koneksi, "SELECT max(id_surat_jalan)as jln, max(no_po_customer)as po, max(surat_jalan_no)as no_surat from tb_surat_jalan_final");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kode=(int)substr($tm_cari['jln'], 3,4);
	$po=(int)substr($tm_cari['po'], 2,4);
	$no_surat=(int)substr($tm_cari['no_surat'], 0, 4);
	$tambah=$kode+1;
	$pluspo=$po+1;
	$nosurat = $no_surat+1;
	if ($tambah<10 && $pluspo<10 && $nosurat) {
		$id="ISJ000".$tambah;
		$idpo = "NP000".$pluspo.$ex;
		$no = "000".$nosurat."/PBU/".date('Y');
	}else{
		$id="ISJ00".$tambah;
		$idpo = "NP00".$pluspo.$ex;
		$no = "00".$nosurat."/PBU/".date('Y');
	}

?>

<div class="card">
	<div class="card-header bg-info">
		<h5><?= $data['nama_customer']; ?></h5>
		<a href="#tambahnamabarang" data-toggle="modal" data-id="<?= $id_customer; ?>" class="btn bg-danger text-dark"><i class="fa fa-plus"></i> Tambah Barang</a>
	</div>
	<div class="card-body bg-gray">
	<form action="surat/proses/proses_input_surat_jalan.php" method="POST">
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group" hidden>
							<label>ID Surat Jalan</label>
							<input type="text" name="id_surat_jalan" class="form-control" value="<?= $id; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Surat Jalan No :</label>
							<input type="text" name="no_surat_jalan" class="form-control" value="<?= $no; ?>" readonly>
						</div>		
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>No Po Customer :</label>
							<input type="text" name="no_po_customer" class="form-control" value="<?= $idpo; ?>" readonly>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Tanggal</label>
					<input type="text" name="tgl_surat_jalan" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Detail Penerima / Kepada :</label>
					<input type="text" name="id_customer" hidden value="<?= $id_customer; ?>">
					<textarea class="form-control" name="isipenerima" value="<?= $isipenerima; ?>" readonly><?= $isipenerima; ?></textarea>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-hover table-bordered table-head-fixed table-nowrap">
						<thead>
							<tr>
								<th class="text-dark">Banyaknya</th>
								<th class="text-dark">ID Barang Keluar</th>
								<th class="text-dark">Nama Barang</th>
								<th class="text-dark">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan_masal X INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_barang z ON z.id_barang = y.id_barang");
							while ($data = mysqli_fetch_array($sql)) {
								echo "<tr>
								<td>
								<input type='text' name='jumlah_barang[]' class='form-control bg-white' value='".$data['jumlah_barang']."' readonly>
								</td>
								<td hidden>
								<input type='text' name='id_surat_jln[]' class='form-control bg-white' value='".$id."' readonly>
								</td>
								<td>
								<input type='text' name='id_barang_keluar[]' class='form-control bg-white' value='".$data['id_barang_keluar']."' readonly>
								</td>
								<td>
								<input type='text' name='nama_barang[]' class='form-control bg-white' value='".$data['nama_barang']."' readonly>
								</td>";
								?>
								<td>
								<a href="surat/proses/delete_brg.php?idmasal=<?= $data['id_masal']; ?>&idcustom=<?= $id_customer; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data barang ini?')"><i class="fa fa-trash-alt"></i></a>
								</td>
								<?php
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-12">
				<button type="submit" class="btn bg-blue" name="simpan_surat_jalan"><i class="fa fa-save"></i> Simpan Surat Jalan</button>
			</div>
		</div>
	</form>
	</div>
</div>

<?php
}
?>

<!-- menampilkan modal untuk mengambil data barnag -->
<div class="modal fade" id="tambahnamabarang">
<div class="modal-dialog modal-xl">
<form action="" ></form>
  <div class="modal-content">
    <div class="modal-header bg-info">
      <h4 class="modal-title">Ambil Barang Untuk Costomer : </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <form action="surat/proses/ambil_nama_barang_tocustimer.php" method="POST">
    <div class="modal-body">
    	<div><input type="text" class="form-control" name="id_custom" value="<?= $id_customer; ?>" readonly></div>
      <div class="fetched-datatambahnamabarang"></div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan_barang" class="btn btn-primary">Save changes</button>
    </div>
  </form>
  </div>
  <!-- /.modal-content -->

</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->