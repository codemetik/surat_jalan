<?php 
$cari_kd=mysqli_query($koneksi, "SELECT max(id_barang_keluar)as kode from tb_barang_keluar");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=(int)substr($tm_cari['kode'], 2,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="BK000".$tambah;
	}else{
		$id="BK00".$tambah;
	}
?>
<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Mutasi</a></li>
      <li class="breadcrumb-item active">Barang Keluar</li>
    </ol>
  </div>
</div>
<div class="card bg-gray">
	<div class="card-body">
    <?php 
    if ($dc['id_bagian'] == 'BG0001') { ?>
      <a href="" class="btn bg-blue" data-toggle="modal" data-target="#addbarangkeluar"><i class="fa fa-plus"></i> Add Barang Keluar</a>
    <?php }else if($dc['id_bagian'] == 'BG0002'){

    }else if($dc['id_bagian'] == 'BG0003'){

    }else if($dc['id_bagian'] == 'BG0004'){

    }
    ?>
	</div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<h5 class="card-title">Data Barang Keluar</h5>
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
					<th>ID Barang Keluar</th>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Stok Awal</th>
					<th>Jml Brg Keluar</th>
					<th>Sisa Stok</th>
					<th>Harga Satuan</th>
					<th>Nilai</th>
          <th>Customer</th>
					<th>Tgl Brg Keluar</th>
          <th>Status SRT Jln</th>
          <?php 
          if ($dc['id_bagian'] == 'BG0001') { ?>
            <th>Action</th>
          <?php }else if($dc['id_bagian'] == 'BG0002'){

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
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_rols_barang_keluar X INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_barang z ON z.id_barang = y.id_barang INNER JOIN tb_customer a ON a.id_customer = x.id_customer WHERE y.id_barang LIKE '%".$search."%' OR nama_barang LIKE '%".$search."%'");
      }else{
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_rols_barang_keluar X INNER JOIN tb_barang_keluar Y ON y.id_barang_keluar = x.id_barang_keluar INNER JOIN tb_barang z ON z.id_barang = y.id_barang INNER JOIN tb_customer a ON a.id_customer = x.id_customer GROUP BY id_rols_barang_keluar DESC");
      }
			while ($data = mysqli_fetch_array($sql)) {
        if ($data['status'] == 'Ok') {
          $bg = 'bg-green';
          $bga = 'bg-gray';
          $link = '';
          $link1 = '';
        }else{
          $bg = '';
          $bga = 'bg-blue';
          $link = '#barangKeluar';
          $link1 = "mutasi/proses/delete_barang_keluar.php?id=".$data['id_barang_keluar'];
        }

				echo "<tr class='".$bg."'>
				<td>".$data['id_barang_keluar']."</td>
				<td>".$data['id_barang']."</td>
				<td>".$data['nama_barang']."</td>
				<td>".$data['stok_awal']."</td>
				<td>".$data['barang_keluar']."</td>
				<td>".$data['sisa_stok']."</td>
				<td>".$data['harga_satuan']."</td>
				<td>".$data['nilai']."</td>
        <td>".$data['nama_customer']."</td>
        <td>".$data['tgl_barang_keluar']."</td>
        <td>".$data['status']."</td>"; 
        if ($dc['id_bagian'] == 'BG0001') { ?>
          <td readonly>
          <a href="<?= $link; ?>" class="btn <?= $bga; ?>" data-toggle="modal" data-id="<?= $data['id_barang_keluar']; ?>"><i class="fa fa-edit"></i></a> || <a href="<?= $link1; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data barang keluar ini?"><i class="fa fa-trash-alt"></i></a>            
        </td>
          <?php }else if($dc['id_bagian'] == 'BG0002'){

          }else if($dc['id_bagian'] == 'BG0003'){

          }else if($dc['id_bagian'] == 'BG0004'){

          }
        ?>
				
          <?php echo "</tr>";
			}
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="addbarangkeluar">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Tambah Barang Keluar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="mutasi/proses/proses_barang_keluar.php" method="POST">
        <div class="modal-body">
        	<div class="row">
        		<div class="col-sm-4">
        			<div class="form-group">
        				<label>ID Barang Keluar</label>
        				<input type="text" name="id_barang_keluar" class="form-control" value="<?= $id; ?>" readonly>
        			</div>
        			<div class="form-group">
        				<label>Nama Barang</label>
        				<select class="form-control-sm select2" name="id_barang" onchange='changeVal(this.value)' required>
        					<option>--Pilih--</option>
        					<?php 
        					$brg = mysqli_query($koneksi, "SELECT * FROM tb_barang X INNER JOIN tb_stok Y ON y.id_barang = x.id_barang GROUP BY id_stok DESC");
        					$jsArr = "var brg = new Array();\n";
        					while ($dbrg = mysqli_fetch_array($brg)) {
        						echo "<option value='".$dbrg['id_barang']."'>".$dbrg['id_barang']." ".$dbrg['nama_barang']."</option>";
        						$jsArr .= "brg['" . $dbrg['id_barang'] . "'] = {harga_satuan:'" . addslashes($dbrg['harga_satuan'])."', stok:'" . addslashes($dbrg['jumlah_stok'])."'};\n";
        					}
        					?>
        				</select>
        			</div>
        			<div class="form-group">
        				<label>Jumlah Stok</label>
        				<input type="text" name="stok_awal" id="jumlah_stok" class="form-control" readonly>
        			</div>
        			<div class="form-group">
        				<label>Harga Satuan</label>
        				<input type="text" name="harga_satuan" id="harga_satuan" class="form-control" readonly>
        			</div>
        		</div>
        		<div class="col-sm-4">
        			<div class="form-group">
        				<label>Jumlah Barang Keluar</label>
        				<input type="text" name="barang_keluar" id="jumlah_brg_keluar" class="form-control" onkeyup="hitung();" required>
        			</div>
        			<div class="form-group">
        				<label>Sisa Stok</label>
        				<input type="text" name="sisa_stok" id="sisa_stok" class="form-control" readonly>
        			</div>
        			<div class="form-group">
        				<label>Total Harga</label>
        				<input type="text" name="nilai" id="harga" class="form-control" readonly>
        			</div>
        		</div>
        		<div class="col-sm-4">
        			<div class="form-group">
        				<label>Customer</label>
        				<select class="form-control-sm select2" name="id_customer" required>
        					<option>--Pilih--</option>
        					<?php 
        					$cs = mysqli_query($koneksi, "SELECT * FROM tb_customer");
        					while ($dcs = mysqli_fetch_array($cs)) {
        						echo "<option value='".$dcs['id_customer']."'>".$dcs['id_customer']." ".$dcs['nama_customer']."</option>";
        					}
        					?>
        				</select>
        			</div>
        			<div class="form-group">
        				<label>Tgl Barang Keluar</label>
        				<input type="text" name="tgl_barang_keluar" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="simpan_mutasi" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- modal untuk edit barang keluar -->
<div class="modal fade" id="barangKeluar">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header bg-info">
      <h4 class="modal-title">Edit Barang Keluar</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <form action="mutasi/proses/edit_barang_keluar.php" method="POST">
    <div class="modal-body">
      <div class="fetched-databarangKeluar"></div>
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
  <?php echo $jsArr; ?>
	function changeVal(id){
		
	    document.getElementById('jumlah_stok').value = brg[id].stok;
	    document.getElementById('harga_satuan').value = brg[id].harga_satuan;
	};	

	function hitung() {
		var brg_keluar = document.getElementById('jumlah_brg_keluar').value;
		var jml_stok = document.getElementById('jumlah_stok').value;
		var hrg_satuan = document.getElementById('harga_satuan').value;

		var hasil = jml_stok - brg_keluar;
		var total = brg_keluar * hrg_satuan;
		document.getElementById('sisa_stok').value = hasil;
		document.getElementById('harga').value = total;
	}
  </script>