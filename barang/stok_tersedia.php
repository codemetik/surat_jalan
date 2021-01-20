<?php 
$cari_kd=mysqli_query($koneksi, "SELECT max(id_stok)as kode from tb_stok");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=(int)substr($tm_cari['kode'], 3,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="STK000".$tambah;
	}else{
		$id="STK00".$tambah;
	}
?>
<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Barang</a></li>
      <li class="breadcrumb-item active">Stok Tersedia</li>
    </ol>
  </div>
</div>
<div class="card bg-gray">
	<div class="card-body">
    <?php 
    if ($dc['id_bagian'] == 'BG0001') { ?>
      <a href="#myModal" class="btn bg-blue" data-toggle="modal" data-target="#modal-sm"><i class="fa fa-edit"></i> Input New Stok</a>
      <a href="#addstokbarang" class="btn bg-blue" data-toggle="modal" data-target="#addstokbarang"><i class="fa fa-plus"></i> Add Stok</a> 
    <?php }else if($dc['id_bagian'] == 'BG0002'){

    }else if($dc['id_bagian'] == 'BG0003'){

    }else if($dc['id_bagian'] == 'BG0004'){

    }
    ?>
	</div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<h5 class="card-title">Table Stok Tersedia Saat ini</h5>
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
		<table class="table table-sm table-hover table-bordered table-head-fixed text-nowrap">
			<thead>
				<tr>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
          <th>Harga Satuan</th>
          <th>Nilai</th>
					<th>Tgl Input</th>
          <?php 
          if ($dc['id_bagian'] == 'BG0001') {
          echo "<th>Action</th>";    
          }else if($dc['id_bagian'] == 'BG0002'){

          }else if($dc['id_bagian'] == 'BG0003'){

          }else if($dc['id_bagian'] == 'BG0004'){

          }
          ?>
				</tr>
			</thead>
			<tbody>
			<?php
			if (isset($_POST['tampil'])) {
				$search = $_POST['search'];
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_stok Y ON y.id_barang = x.id_barang WHERE x.id_barang LIKE '%".$search."%' OR nama_barang LIKE '%".$search."%' ");
			}else{
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_stok Y ON y.id_barang = x.id_barang GROUP BY id_stok DESC");
			}
			while ($data = mysqli_fetch_array($sql)) {
				echo "<tr>
				<td>".$data['id_barang']."</td>
				<td>".$data['nama_barang']."</td>
				<td>".$data['jumlah_stok']."</td>
        <td>".rupiah($data['harga_satuan'])."</td>
        <td>".rupiah($data['jumlah_stok'] * $data['harga_satuan'])."</td>
				<td>".$data['tgl_input']."</td>";
				if ($dc['id_bagian'] == 'BG0001') { ?>
          <td>
            <a href="#editStok" class="btn bg-blue" data-toggle="modal" data-id="<?= $data['id_barang']; ?>"><i class="fa fa-edit"></i></a> || <a href="barang/proses/delete_stok_barang.php?id=<?= $data['id_stok']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data stok ini?')"><i class="fa fa-trash-alt"></i></a>
          </td>
        <?php }else if($dc['id_bagian'] == 'BG0002'){

        }else if($dc['id_bagian'] == 'BG0003'){

        }else if($dc['id_bagian'] == 'BG0004'){

        }
				echo "</tr>";
			}
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Input New Stok Barang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="barang/proses/tambah_stok_barang.php" method="POST">
        <div class="modal-body">
          <div class="row">
          	<div class="col-sm-6">
          		<div class="form-group">
          			<div class="form-group" hidden>
          				<input type="text" name="id_stok" class="form-control" value="<?= $id; ?>">
          			</div>
          			<label>ID Barang / Nama Barang</label>
          			<select class="form-control-sm select2" name="id_barang" required>
          				<option>--Pilih--</option>
          				<?php 
          				$brg = mysqli_query($koneksi, "SELECT * FROM tb_barang GROUP BY id_barang DESC");
          				while ($dbrg = mysqli_fetch_array($brg)) {
          					$cekdistok = mysqli_query($koneksi, "SELECT * FROM tb_stok WHERE id_barang = '".$dbrg['id_barang']."'");
          					$cek = mysqli_num_rows($cekdistok);
          					if ($cek > 0) {
          						
          					}else{
          						echo "<option value='".$dbrg['id_barang']."'>".$dbrg['id_barang']." ".$dbrg['nama_barang']."</option>";
          					}
          				}
          				?>
          			</select>
          		</div>
          		<div class="form-group">
          			<label>Jumlah Stok</label>
          			<input type="text" name="jumlah_stok" class="form-control" required placeholder="Jumlah New Stok ..">
          		</div>
          	</div>
          	<div class="col-sm-6">
          		<div class="form-group">
          			<label>Tgl Input</label>
          			<input type="text" name="tgl_input" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
          		</div>
          	</div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="simpan_stok" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- modal update stok barang -->
	<div class="modal fade" id="editStok">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Edit Stok Barang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="barang/proses/edit_stok_barang.php" method="POST">
        <div class="modal-body">
        	<div class="fetched-dataStok"></div>
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

<!-- Menambah stok pada tb_stok -->
  <div class="modal fade" id="addstokbarang">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Add Stok</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="barang/proses/proses_add_stokbarang.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama Barang</label>
                <select class="form-control-sm select2" name="id_barang" style="width: 100%;" required>
                  <option>--Pilih Barang--</option>
                  <?php 
                  $brg = mysqli_query($koneksi, "SELECT * FROM tb_barang GROUP BY id_barang DESC");
                  while ($db = mysqli_fetch_array($brg)) {
                    echo "<option value='".$db['id_barang']."'>".$db['id_barang'].", ".$db['nama_barang']."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="text" name="jumlah_stok" class="form-control" placeholder="Jumlah Stok ..">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Tgl Input</label>
                <input type="text" name="tgl_add_stok" class="form-control" readonly value="<?= date('Y-m-d'); ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="simpanstokbarang" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->