<?php 
$cari_kd=mysqli_query($koneksi, "SELECT max(id_customer)as kode from tb_customer");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=(int)substr($tm_cari['kode'], 2,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="CS000".$tambah;
	}else{
		$id="CS00".$tambah;
	}
?>
<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Data User</a></li>
      <li class="breadcrumb-item active">Jabatan</li>
    </ol>
  </div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<div class="card-title">Data Jabatan</div>
		<form action="" method="POST">
		  <div class="input-group input-group-sm float-right" style="width: 250px;">
		    <input type="text" name="search" class="form-control float-right" placeholder="Search Customer" autofocus>

		    <div class="input-group-append">
		      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
		    </div>
		  </div>
		</form>
	</div>
	<div class="card-body table-responsive p-0" style="height: 450px;">
		<table class="table table-sm table-head-fixed text-nowrap font-10">
			<thead>
				<tr>
					<th>ID Bagian</th>
					<th>Nama Bagian</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if (isset($_POST['tampil'])) {
				$search = $_POST['search'];
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_bagian WHERE id_bagian LIKE '%".$search."%' OR nama_bagian LIKE '%".$search."%'");
			}else{
				$sql = mysqli_query($koneksi, "SELECT* FROM tb_bagian");
			}
			
			while ($data = mysqli_fetch_array($sql)) { ?>
				<tr>
					<td><?= $data['id_bagian']; ?></td>
					<td><?= $data['nama_bagian']; ?></td>
					<td>
						<a href="#datajabatan" class="btn bg-blue" data-toggle="modal" data-id="<?= $data['id_bagian']; ?>"><i class="fa fa-edit"></i></a>
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
	      <h4 class="modal-title">Input Data Customer</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	<form action="data_user/proses/input_jabatan.php" method="POST">
	    <div class="modal-body">
	      <div class="row">
	      	<div class="col-sm-6">
	      		<div class="form-group">
	      			<label>ID Customer</label>
	      			<input type="text" name="id_customer" class="form-control" value="<?= $id; ?>" readonly>
	      		</div>
	      		<div class="form-group">
	      			<label>Nama Customer</label>
	      			<input type="text" name="nama_customer" class="form-control" placeholder="Nama Customer .." required>
	      		</div>
	      	</div>
	      	<div class="col-sm-6">
	      		<div class="form-group">
	      			<label>No Telpn</label>
	      			<input type="text" name="no_telpn" class="form-control" placeholder="No Telpn ..">
	      		</div>
	      		<div class="form-group">
	      			<label>Alamat Customer</label>
	      			<input type="text" name="alamat" class="form-control" placeholder="Alamat Customer ..">
	      		</div>
	      	</div>
	      </div>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      <button type="submit" name="simpan_customer" class="btn btn-primary">Save changes</button>
	    </div>
	</form>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- modal update customer -->
	<div class="modal fade" id="datajabatan">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Edit Data Jabatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="data_user/proses/edit_jabatan.php" method="POST">
        <div class="modal-body">
        	<div class="fetched-datajabatan"></div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->