<div class="row mb-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li>
      <li class="breadcrumb-item active">Fixed Layout</li> -->
    </ol>
  </div>
</div>
<div class="card">
  <div class="card-header bg-info">
    <h5 class="card-title">Anda Berada di Halaman : Kepala PPIC</h5> 
  </div>
  <div class="card-body table-responsive p-0" style="height: 450px;">
    <table class="table table-hover table-head-fixed table-nowrap">
      <thead>
        <tr>
          <th>Hak Akses</th>
          <th>Show</th>
          <th>Insert</th>
          <th>Update</th>
          <th>Delete</th>
          <th>Print</th>
        </tr>
      </thead>
      <?php 
      $array = array(
        'Stok Barang Tersedia' => ['show' => 'Yes','insert' => '-','update'=>'-','delete'=>'-','print'=>'-'],
        'Barang Keluar' => ['show' => 'Yes','insert' => '-','update'=>'-','delete'=>'-','print'=>'-'],
        'History Surat Jalan' => ['show' => 'Yes','insert' => '-','update'=>'-','delete'=>'-','print'=>'Yes'],
        'Laporan' => ['show' => 'Yes','insert' => '-','update'=>'-','delete'=>'-','print'=>'Yes'],
        'Data user' => ['show' => 'Yes','insert' => 'Yes','update'=>'Yes','delete'=>'Yes','print'=>'-'],
        'Data Jabatan' => ['show' => 'Yes','insert' => '-','update'=>'Yes','delete'=>'-','print'=>'-']
        ); 
      ?>
      <tbody>
        <?php foreach ($array as $key => $val) {
          echo "<tr>
          <td>".$key."</td>
          <td>".$val['show']."</td>
          <td>".$val['insert']."</td>
          <td>".$val['update']."</td>
          <td>".$val['delete']."</td>
          <td>".$val['print']."</td>
          </tr>";
        } ?>
      </tbody>
    </table>
  </div>
</div>