<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Surat Jalan</a></li>
      <li class="breadcrumb-item active">History Surat Jalan</li>
    </ol>
  </div>
</div>
<div class="card bg-gray">
	<div class="card-body">
		
	</div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<h5 class="card-title">History Surat Jalan</h5>
		<form action="" method="POST">
        <div class="input-group input-group-sm float-right" style="width: 250px;">
          <input type="text" name="search" class="form-control float-right" placeholder="Search Name" autofocus>

          <div class="input-group-append">
            <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
	</div>
	<div class="card-body table-responsive p-0" style="height: 450px;">
		<table class="table table-hover table-thead-fixed table-nowrap">
			<thead>
				<tr>
					<th>ID Surat Jalan</th>
					<th>No Surat Jalan</th>
					<th>ID Customer</th>
					<th>No Po Customer</th>
					<th>Tgl Surat Jalan</th>
					<th>Show Table</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (isset($_POST['tampil'])) {
				$search = $_POST['search'];
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan_final WHERE id_surat_jalan LIKE '%".$search."%' OR surat_jalan_no LIKE '%".$search."%' OR no_po_customer LIKE '%".$search."%'");
			}else{
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_surat_jalan_final GROUP BY id_surat_jalan DESC");
			}
			while ($data = mysqli_fetch_array($sql)) { ?>
				<tr>
					<td><?= $data['id_surat_jalan']; ?></td>
					<td><?= $data['surat_jalan_no']; ?></td>
					<td><?= $data['id_customer']; ?></td>
					<td><?= $data['no_po_customer']; ?></td>
					<td><?= $data['tgl_surat_jalan']; ?></td>
					<td>
						<a href="#showsuratjalan" data-toggle="modal" data-id="<?= $data['id_surat_jalan']; ?>" class="btn bg-gray"><i class="fa fa-table"></i></a> || <a href="laporan/data/surat_jalan.php?idsurat=<?= $data['id_surat_jalan']; ?>" target="_blank" class="btn bg-gray"><i class="fa fa-print"></i></a>
					</td>
				</tr>
			<?php }
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="showsuratjalan">
<div class="modal-dialog modal-xl">
<form action="" ></form>
  <div class="modal-content">
    <div class="modal-header bg-info">
      <h4 class="modal-title">Table Surat Jalan</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <form action="" method="POST">
    <div class="modal-body">
      <div class="fetched-showsuratjalan"></div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <!-- <button type="submit" name="simpan_barang" class="btn btn-primary">Save changes</button> -->
    </div>
  </form>
  </div>
  <!-- /.modal-content -->

</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->