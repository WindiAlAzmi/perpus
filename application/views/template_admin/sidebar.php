
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?= $user['nama'] ?></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <?php
    if ($this->session->userdata('nama_admin')) { ?>
       <li><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Anggota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>admin/anggota"><i class="fa fa-circle-o"></i>Admin</a></li>
            <li><a href="<?= base_url() ?>admin/anggota/data_wali"><i class="fa fa-circle-o"></i>Wali Kelas</a></li>
            <li><a href="<?= base_url() ?>admin/anggota/data_siswa"><i class="fa fa-circle-o"></i>Siswa</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-book"></i>
            <span>Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>admin/buku/data_paket"><i class="fa fa-circle-o"></i> Buku Paket</a></li>
            <li><a href="<?= base_url() ?>admin/buku"><i class="fa fa-circle-o"></i>Buku Bacaan</a></li>
          </ul>
        </li>
        <li><a href="<?= base_url() ?>admin/berita"><i class="fa fa-newspaper-o"></i> <span>Pemberitahuan</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-file-text"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>admin/laporan/peminjaman_bacaan"><i class="fa fa-circle-o"></i>peminjaman buku bacaan</a></li>
            <li><a href="<?= base_url() ?>admin/laporan/peminjaman_paket"><i class="fa fa-circle-o"></i>peminjaman buku paket</a></li>
          </ul>
        </li>
        <hr>
        <li><a href="<?= base_url('auth/logout') ?>"><i class="fa  fa-sign-out"></i> <span>Logout</span></a></li>
      
     <?php } else if ($this->session->userdata('nama_siswa')) { ?>
      <li><a href="<?= base_url() ?>siswa/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
          <a href="#">
            <i class="fa  fa-random"></i>
            <span>Buku Bacaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>siswa/pinjam_bacaan"><i class="fa fa-circle-o"></i>Peminjaman</a></li>
            <li><a href="<?= base_url() ?>siswa/kembali_bacaan"><i class="fa fa-circle-o"></i>Pengembalian</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-random"></i>
            <span>Buku Paket</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>siswa/pinjam_paket"><i class="fa fa-circle-o"></i>Peminjaman</a></li>
            <li><a href="<?= base_url() ?>siswa/kembali_paket"><i class="fa fa-circle-o"></i>Pengembalian</a></li>
          </ul>
        </li>
        <hr>
        <li><a href="<?= base_url('auth/logout') ?>"><i class="fa  fa-sign-out"></i> <span>Logout</span></a></li>
        <?php }else if ($this->session->userdata('nama_waliKelas')) { ?>
        <li><a href="<?= base_url() ?>wali_kelas/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-random"></i>
            <span>Buku Bacaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>wali_kelas/pinjam_bacaan"><i class="fa fa-circle-o"></i>Peminjaman</a></li>
            <li><a href="<?= base_url() ?>wali_kelas/kembali_bacaan"><i class="fa fa-circle-o"></i>Pengembalian</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-random"></i>
            <span>Buku Paket</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>wali_kelas/pinjam_paket"><i class="fa fa-circle-o"></i>Peminjaman</a></li>
            <li><a href="<?= base_url() ?>wali_kelas/kembali_paket"><i class="fa fa-circle-o"></i>Pengembalian</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-file-text"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() ?>wali_kelas/laporan/peminjaman_bacaan"><i class="fa fa-circle-o"></i>peminjaman buku bacaan</a></li>
            <li><a href="<?= base_url() ?>wali_kelas/laporan/peminjaman_paket"><i class="fa fa-circle-o"></i>peminjaman buku paket</a></li>
          </ul>
        </li>
        <hr>
        <li><a href="<?= base_url('auth/logout') ?>"><i class="fa  fa-sign-out"></i> <span>Logout</span></a></li>
     <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
