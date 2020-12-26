<?php 
$cari_kd=mysqli_query($koneksi, "SELECT max(id_barang)as kode from tb_barang");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=(int)substr($tm_cari['kode'], 3,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="BRG000".$tambah;
	}else{
		$id="BRG00".$tambah;
	}
?>
<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Barang</a></li>
      <li class="breadcrumb-item active">Daftar Barang</li>
    </ol>
  </div>
</div>
<div class="card bg-gray">
  <div class="card-body"><a href="" class="btn bg-blue mb-2" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i> Add Barang</a></div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<h5 class="card-title">Daftar Barang</h5>
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
      <table class="table table-sm table-hover table-bordered table-head-fixed text-nowrap font-12">
        <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Jenis</th>
            <th>Nama Barang</th>
            <th>QTY</th>
            <th>Harga Satuan</th>
            <th>Tanggal Barang</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_POST['tampil'])) {
          $search = $_POST['search'];
          $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_rols_jenis Y ON y.id_barang = x.id_barang INNER JOIN tb_jenis z ON z.id_jenis = y.id_jenis WHERE x.id_barang = '".$search."' OR nama_barang LIKE '%".$search."%'");
        }else{
          $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_rols_jenis Y ON y.id_barang = x.id_barang INNER JOIN tb_jenis z ON z.id_jenis = y.id_jenis GROUP BY x.id_barang DESC");
        }

        while ($data = mysqli_fetch_array($sql)) {
          echo "<tr>
          <td>".$data['id_barang']."</td>
          <td>".$data['nama_jenis']."</td>
          <td>".$data['nama_barang']."</td>
          <td>".$data['qty']."</td>
          <td>".rupiah($data['harga_satuan'])."</td>";
          ?>
          <td><?= $data['tgl_barang']; ?></td>
          <td>
            <a href="#myModal" class="btn bg-blue" data-toggle="modal" data-id="<?= $data['id_barang']; ?>"><i class="fa fa-edit"></i></a> || <a href="barang/proses/delete_barang.php?id=<?= $data['id_barang']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data barang ini?')"><i class="fa fa-trash-alt"></i></a>
          </td>
          <?php "</tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
</div>

<div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
    <form action="barang/proses/proses_input_barang.php" method="POST">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Add Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
              	<div class="col-sm-4">
              		<div class="form-group">
              			<label>ID Barang</label>
              			<input type="text" name="id_barang" class="form-control" value="<?= $id; ?>" readonly>
              		</div>
              		<div class="form-group">
              			<label>Jenis</label>
              			<select class="form-control-sm select2" name="id_jenis" required>
              				<option>--Pilih--</option>
              				<?php 
              				$sjn = mysqli_query($koneksi, "SELECT * FROM tb_jenis");
              				while ($djn = mysqli_fetch_array($sjn)) {
              					echo "<option value='".$djn['id_jenis']."'>".$djn['nama_jenis']."</option>";
              				}
              				?>
              			</select>
              		</div>
              	</div>
              	<div class="col-sm-4">
              		<div class="form-group">
              			<label>Nama Barang</label>
              			<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang .." required>
              		</div>
              		<div class="form-group">
              			<label>Qty Per Pak</label>
              			<input type="text" name="qty" class="form-control" placeholder="Qty ..">
              		</div>
              	</div>
              	<div class="col-sm-4">
              		<div class="form-group">
              			<label>Harga Satuan</label>
              			<input type="text" name="harga_satuan" class="form-control" placeholder="Harga Satuan ..">
              		</div>
              		<div class="form-group">
              			<label>Tgl Barang</label>
              			<input type="text" name="tgl_barang" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
              		</div>	
              	</div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="simpan_barang" class="btn btn-primary">Save changes</button>
            </div>
          </div>
    </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- modal untuk edit barang sekalin inser -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Edit Barang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="barang/proses/edit_barang.php" method="POST">
        <div class="modal-body">
          <div class="fetched-data"></div>
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