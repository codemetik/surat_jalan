<?php 
$cari_kd=mysqli_query($koneksi, "SELECT max(id_user)as kode from tb_user");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=(int)substr($tm_cari['kode'], 2,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="US000".$tambah;
	}else{
		$id="US00".$tambah;
	}


$cari=mysqli_query($koneksi, "SELECT max(id_rols_user)as kod from tb_rols_user");
$tm=mysqli_fetch_array($cari);
$kod=(int)substr($tm['kod'], 2,4);
$tam=$kod+1;
if ($tam<10) {
		$idb="RL000".$tam;
	}else{
		$ibd="RL00".$tam;
	}

?>
<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Data User</a></li>
      <li class="breadcrumb-item active">Data User</li>
    </ol>
  </div>
</div>
<div class="card bg-gray">
	<div class="card-body"><a href="" class="btn bg-primary" data-toggle="modal" data-target="#userbaru"><i class="fa fa-plus"></i> Add User</a></div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<div class="card-title">Data User</div>
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
					<th>ID User</th>
					<th>Nama User</th>
					<th>Jabatan</th>
					<th>Username</th>
					<th>Password</th>
					<th>Confirm Password</th>
					<th>Tgl Masuk User</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if (isset($_POST['tampil'])) {
				$search = $_POST['search'];
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_bagian X INNER JOIN tb_rols_user Y ON y.id_bagian = x.id_bagian INNER JOIN tb_user z ON z.id_user = y.id_user WHERE y.id_user LIKE '%".$search."%' OR nama_user LIKE '%".$search."%'");
			}else{
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_bagian X INNER JOIN tb_rols_user Y ON y.id_bagian = x.id_bagian INNER JOIN tb_user z ON z.id_user = y.id_user");
			}
			
			while ($data = mysqli_fetch_array($sql)) { ?>
				<tr>
					<td><?= $data['id_user']; ?></td>
					<td><?= $data['nama_user']; ?></td>
					<td><?= $data['nama_bagian']; ?></td>
					<td><?= $data['username']; ?></td>
					<td><?= $data['password']; ?></td>
					<td><?= $data['confirm_password']; ?></td>
					<td><?= $data['tgl_masuk_user']; ?></td>
					<td>
						<a href="#datauser" class="btn bg-blue" data-toggle="modal" data-id="<?= $data['id_user']; ?>"><i class="fa fa-edit"></i></a> || <a href="data_user/proses/delete_user.php?id=<?= $data['id_user']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data customer ini?')"><i class="fa fa-trash-alt"></i></a>
					</td>
				</tr>
			<?php }
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="userbaru">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header bg-info">
	      <h4 class="modal-title">Input Data User Baru</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	<form action="data_user/proses/input_data_user.php" method="POST">
	    <div class="modal-body">
	      <div class="row">
	      	<div class="col-sm-6">
	      		<div class="form-group hidden">
	      			<label>ID User</label>
	      			<input type="text" name="id_user" class="form-control" value="<?= $id; ?>" readonly>
	      		</div>
	      		<div class="form-group hidden">
	      			<label>ID Rols User</label>
	      			<input type="text" name="id_rols_user" class="form-control" value="<?= $idb; ?>" readonly>
	      		</div>
	      		<div class="form-group">
	      			<label>Nama User</label>
	      			<input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Nama User ..">
	      		</div>
	      		<div class="form-group">
					<label>Jabatan</label>
					<select class="form-control-sm select2" name="id_bagian" required>
						<?php 
						$bg = mysqli_query($koneksi, "SELECT * FROM tb_bagian");
						while ($dg = mysqli_fetch_array($bg)) {
							echo "<option value='".$dg['id_bagian']."'>".$dg['nama_bagian']."</option>";
						}
						?>
					</select>
				</div>
	      		<div class="form-group">
	      			<label>Tgl Masuk User</label>
	      			<input type="text" name="tgl_masuk_user" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
	      		</div>
	      	</div>
	      	<div class="col-sm-6">
	      		<div class="form-group">
	      			<label>Username</label>
	      			<input type="text" name="username" id="username" onkeyup="otomatis();"  class="form-control" placeholder="Username .." required>
	      		</div>
	      		<div class="form-group">
	      			<label>Password</label>
	      			<input type="password" name="password" id="password" class="form-control" placeholder="Password .." readonly>
	      		</div>
	      		<div class="form-group">
	      			<label>Confirm Password</label>
	      			<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password .." readonly>
	      		</div>
	      	</div>
	      </div>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      <button type="submit" name="simpan_user" class="btn btn-primary">Save changes</button>
	    </div>
	</form>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- modal update customer -->
	<div class="modal fade" id="datauser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="data_user/proses/edit_user.php" method="POST">
        <div class="modal-body">
        	<div class="fetched-datauser"></div>
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

  <script type="text/javascript">
  	function otomatis(){
  		var nm_user = document.getElementById('username').value;

  		document.getElementById('password').value = nm_user;
  		document.getElementById('confirm_password').value = nm_user;
  	}
  </script>