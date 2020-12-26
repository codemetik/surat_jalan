<!--   <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'barang/detail_barang.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#editCustomer').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'contact/customer/detail_customer.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-dataCsutomer').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#editSupplier').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'contact/supplier/detail_supplier.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-dataSupplier').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#editStok').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'barang/detail_stok_barang.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-dataStok').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#barangKeluar').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'mutasi/detail_barang_keluar.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-databarangKeluar').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#tambahnamabarang').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'surat/detail_nama_barang.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-datatambahnamabarang').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#showsuratjalan').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'surat/showsuratjalan.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-showsuratjalan').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#datauser').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'data_user/detail_user.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-datauser').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#datauserbaru').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'data_user/detail_user.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-datauserbaru').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#datajabatan').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'data_user/detail_jabatan.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-datajabatan').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/select2/js/select2.min.js"></script>

<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script>
$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})
</script>
</body>
</html>