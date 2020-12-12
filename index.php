<?php include "header.php"; ?>
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
    <a href="?page=home_gudang" class="brand-link">
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                <a href="?page=supplier" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Supplier</p>
                </a>
              </li>
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
                <a href="../../index.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link text-white">
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
                <a href="../../index.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Surat Jalan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link text-white">
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
                <a href="../../index.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
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
          
          default:
            # code...
            break;
        }
      }else{
        include "home_gudang.php";
      }
      ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"; ?>
