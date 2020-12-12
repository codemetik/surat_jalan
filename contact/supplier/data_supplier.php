<?php 
$cari_kd=mysqli_query($koneksi, "SELECT max(id_supplier)as kode from tb_supplier");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=(int)substr($tm_cari['kode'], 2,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="SP000".$tambah;
	}else{
		$id="SP00".$tambah;
	}
?>
<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Contact</a></li>
      <li class="breadcrumb-item active">Supplier</li>
    </ol>
  </div>
</div>
<div class="card bg-gray">
	<div class="card-body"><a href="" class="btn bg-primary" data-toggle="modal" data-target="#modal-lg">Tambah Supplier</a></div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<div class="card-title">Data Supplier</div>
		<form action="" method="POST">
			  <div class="input-group input-group-sm float-right" style="width: 250px;">
			    <input type="text" name="search" class="form-control float-right" placeholder="Search Supplier">

			    <div class="input-group-append">
			      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
			    </div>
			  </div>
			</form>
	</div>
	<div class="card-body table-responsive p-0" style="height: 450px;">
		<table class="table table-head-fixed text-nowrap font-10">
			<thead>
				<tr>
					<th>ID Supplier</th>
					<th>Nama Supplier</th>
					<th>No Telp</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if (isset($_POST['tampil'])) {
				$search = $_POST['search'];
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier LIKE '%".$search."%' OR nama_supplier LIKE '%".$search."%'");
			}else{
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
			}
			
			while ($data = mysqli_fetch_array($sql)) { ?>
				<tr>
					<td><?= $data['id_supplier']; ?></td>
					<td><?= $data['nama_supplier']; ?></td>
					<td><?= $data['no_telpn']; ?></td>
					<td><?= $data['alamat']; ?></td>
					<td>
						<a href="#editSupplier" class="btn bg-blue" data-toggle="modal" data-id="<?= $data['id_supplier']; ?>"><i class="fa fa-edit"></i></a> || <a href="contact/supplier/delete_supplier.php?id=<?= $data['id_supplier']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus siswa dari kelas ini?')"><i class="fa fa-trash-alt"></i></a>
					</td>
				</tr>
			<?php }
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="modal-lg">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header bg-info">
	      <h4 class="modal-title">Input Data Supplier</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	<form action="contact/supplier/proses_input_supplier.php" method="POST">
	    <div class="modal-body">
	      <div class="row">
	      	<div class="col-sm-6">
	      		<div class="form-group">
	      			<label>ID Supplier</label>
	      			<input type="text" name="id_supplier" class="form-control" readonly value="<?= $id; ?>">
	      		</div>
	      		<div class="form-group">
	      			<label>Nama Supplier</label>
	      			<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier ..">
	      		</div>
	      	</div>
	      	<div class="col-sm-6">
	      		<div class="form-group">
	      			<label>No Telpn</label>
	      			<input type="text" name="no_telpn" class="form-control" placeholder="No Telpn ..">
	      		</div><div class="form-group">
	      			<label>Alamat</label>
	      			<input type="text" name="alamat" class="form-control" placeholder="Alamat ..">
	      		</div>
	      	</div>
	      	<div class="col-sm-4">
	      		
	      	</div>
	      </div>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      <button type="submit" name="simpan_supplier" class="btn btn-primary">Save changes</button>
	    </div>
	</form>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- modal edit supplier -->
	<div class="modal fade" id="editSupplier">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Supplier</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="contact/supplier/edit_supplier.php" method="POST">
        <div class="modal-body">
        	<div class="fetched-dataSupplier"></div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="simpan_perubahan" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->