<?php 
include "header.php"; 

$cekuser = mysqli_query($koneksi, "SELECT x.id_bagian, nama_bagian, z.id_user, nama_user, username, PASSWORD FROM tb_bagian X INNER JOIN tb_rols_user Y ON y.id_bagian = x.id_bagian INNER JOIN tb_user z ON z.id_user = y.id_user WHERE z.id_user = '".$_SESSION['id_user']."'");
        $dc = mysqli_fetch_array($cekuser);
if ($dc['id_bagian'] == 'BG0001'){
  $link = "?page=home_gudang";  
}else if($dc['id_bagian'] == 'BG0002'){
  $link = "?page=home_ppic";
}else if($dc['id_bagian'] == 'BG0003'){
  $link = "?page=home_kepala";
}else if($dc['id_bagian'] == 'BG0004'){
  $link = "?page=home_manager";
}
?>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">SETTING</span>
          <div class="dropdown-divider"></div>
          <a href="?page=profile" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> <?= $_SESSION['username']; ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Log-Out
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary bg-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $link; ?>" class="brand-link">
      <img src="dist/img/logo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PBU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="?page=profile" class="d-block text-white"><?= $_SESSION['username']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php 
        if ($dc['id_bagian'] == 'BG0001') {
          //untuk bagian Admin Gudang
        ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="?page=home_gudang" class="nav-link text-white">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="?page=customer" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Barang 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=daftar_barang" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=stok_tersedia" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Tersedia</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mutasi 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=barang_keluar" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Jalan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Surat Jalan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=history_surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Surat Jalan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Print
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=laporan" class="nav-link text-white">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <?php
        }else if($dc['id_bagian'] == 'BG0002'){
          //untuk bagian Admin PPIC
        ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="?page=home_ppic" class="nav-link text-white">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="?page=customer" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Customer</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Barang 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="?page=daftar_barang" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Barang</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?page=stok_tersedia" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Tersedia</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mutasi 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=barang_keluar" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Jalan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Surat Jalan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=history_surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Surat Jalan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Print
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=laporan" class="nav-link text-white">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <?php
        }else if($dc['id_bagian'] == 'BG0003'){
          //Untuk bagian Kepala PPIC
        ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="?page=home_kepala" class="nav-link text-white">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="?page=customer" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Customer</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Barang 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="?page=daftar_barang" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Barang</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?page=stok_tersedia" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Tersedia</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mutasi 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=barang_keluar" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Jalan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="?page=surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Surat Jalan</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?page=history_surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Surat Jalan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Print
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=laporan" class="nav-link text-white">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data User + Bagian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=data_user" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=jabatan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <?php
        }else if($dc['id_bagian'] == 'BG0004'){
          //untuk bagian Manager Factory
        ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="?page=home_manager" class="nav-link text-white">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="?page=customer" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Customer</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Barang 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="?page=daftar_barang" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Barang</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?page=stok_tersedia" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Tersedia</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mutasi 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=barang_keluar" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Jalan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="?page=surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Surat Jalan</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?page=history_surat_jalan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Surat Jalan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Print
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=laporan" class="nav-link text-white">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <?php
        }
        ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
      <?php 
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
          case 'home_gudang':
            include "home_gudang.php";
            break;
          case 'home_ppic':
            include "home_ppic.php";
            break;
          case 'home_kepala':
            include "home_kepala.php";
            break;
          case 'home_manager':
            include "home_manager.php";
            break;
          case 'customer':
            include "contact/customer/data_customer.php";
            break;
          case 'supplier':
            include "contact/supplier/data_supplier.php";
            break;
          case 'daftar_barang':
            include "barang/daftar_barang.php";
            break;
          case 'stok_tersedia':
            include "barang/stok_tersedia.php";
            break;
          case 'profile':
            include "profile/profile.php";
            break;
          case 'barang_keluar':
            include "mutasi/barang_keluar.php";
            break;
          case 'surat_jalan':
            include "surat/surat_jalan.php";
            break;
          case 'history_surat_jalan':
            include "surat/history_surat_jalan.php";
            break;
          case 'detail_surat_jalan':
            include "surat/detail_surat_jalan.php";
            break;
          case 'laporan':
            include "laporan/print_laporan.php";
            break;
          case 'data_user':
            include "data_user/data_user.php";
            break;
          case 'jabatan':
            include "data_user/jabatan.php";
            break;
          
          default:
            # code...
            break;
        }
      }else{
        if ($dc['id_bagian'] == 'BG0001') {
          include "home_gudang.php";
        }else if($dc['id_bagian'] == 'BG0002'){
          include "home_ppic.php";
        }else if($dc['id_bagian'] == 'BG0003'){
          include "home_kepala.php";
        }else if($dc['id_bagian'] == 'BG0004'){
          include "home_manager.php";
        }
      }
      ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"; ?>
