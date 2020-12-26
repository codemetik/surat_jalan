<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Surat Jalan</a></li>
      <li class="breadcrumb-item active">Kelola Surat Jalan</li>
    </ol>
  </div>
</div>
<div class="card">
	<div class="card-header bg-info">
		<h5 class="card0-title">Membuat Surat Jalan dengan mengambil banyak barang sekalgus.</h5>
	</div>
	<div class="card-body bg-gray">
		<div class="row">
			<div class="col-sm-6">
				<form action="index.php?page=detail_surat_jalan" method="POST">
				  <div class="input-group input-group-sm">
				    <select class="form-control-sm select2" style="width: 250px;" name="id_customer" id="id_customer" onchange='changeVal(this.value)'>
						<option value='kosong'>--Pilih Customer--</option>
						<?php 
						$cssql = mysqli_query($koneksi, "SELECT * FROM tb_customer X INNER JOIN tb_rols_barang_keluar Y ON y.id_customer = x.id_customer INNER JOIN tb_barang_keluar z ON z.id_barang_keluar = y.id_barang_keluar WHERE status != 'Ok' GROUP BY y.id_barang_keluar");
						$jsArr = "var custom = new Array();\n";
						while ($datacs = mysqli_fetch_array($cssql)) {
							echo "<option value='".$datacs['id_customer']."'>".$datacs['id_customer'].", ".$datacs['nama_customer']."</option>";
							$jsArr .= "custom['" . $datacs['id_customer'] . "'] = {nama_customer:'" . addslashes($datacs['nama_customer'])."', no_telpn:'" . addslashes($datacs['no_telpn'])."', alamat:'" . addslashes($datacs['alamat'])."', id_penerima:'" . addslashes($datacs['id_customer'])."'};\n";
						}
						?>
					</select>

				    <div class="input-group-append">
				      <button type="submit" name="detail" class="btn btn-danger">Ambil Barang</button>
				    </div>
				  </div>
				  <div class="form-group">
					<label>Detail Penerima : </label>
					<textarea class="form-control" name="detail_penerima" id="detail_penerima" style="height: 100px; width: 350px;" readonly></textarea>
				</div>
				</form>
			</div>
		</div>
		<!-- <a href="#ambilbarang" class="btn bg-blue" data-toggle="modal" data-id="#id_penerima"><i class="fa fa-plus"></i> Ambil Barang</a> -->
	</div>
</div>


<script type="text/javascript">
	 <?php echo $jsArr; ?>
	function changeVal(id){
		
		var isi = custom[id].nama_customer+", No Telpn : "+custom[id].no_telpn+", "+custom[id].alamat;
	    document.getElementById('detail_penerima').value = isi;
	};
</script>