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
      <li class="breadcrumb-item"><a href="#">Contact</a></li>
      <li class="breadcrumb-item active">Customer</li>
    </ol>
  </div>
</div>
<div class="card bg-gray">
	<div class="card-body"><a href="" class="btn bg-primary" data-toggle="modal" data-target="#modal-lg">Tambah Customer</a></div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<div class="card-title">Data Customer</div>
		<form action="" method="POST">
		  <div class="input-group input-group-sm float-right" style="width: 250px;">
		    <input type="text" name="search" class="form-control float-right" placeholder="Search Customer">

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
					<th>ID Customer</th>
					<th>Nama Customer</th>
					<th>No Telp</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if (isset($_POST['tampil'])) {
				$search = $_POST['search'];
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer LIKE '%".$search."%' OR nama_customer LIKE '%".$search."%'");
			}else{
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_customer");
			}
			
			while ($data = mysqli_fetch_array($sql)) { ?>
				<tr>
					<td><?= $data['id_customer']; ?></td>
					<td><?= $data['nama_customer']; ?></td>
					<td><?= $data['no_telpn']; ?></td>
					<td><?= $data['alamat']; ?></td>
					<td>
						<a href="#editCustomer" class="btn bg-blue" data-toggle="modal" data-id="<?= $data['id_customer']; ?>"><i class="fa fa-edit"></i></a> || <a href="contact/customer/delete_customer.php?id=<?= $data['id_customer']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus siswa dari kelas ini?')"><i class="fa fa-trash-alt"></i></a>
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
	      <h4 class="modal-title">Input Data Customer</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	<form action="contact/customer/proses_input_customer.php" method="POST">
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
	<div class="modal fade" id="editCustomer">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Customer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="contact/customer/edit_customer.php" method="POST">
        <div class="modal-body">
        	<div class="fetched-dataCsutomer"></div>
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