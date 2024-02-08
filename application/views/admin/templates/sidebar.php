  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets') ?>/profil/<?= $this->session->userdata('foto') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?= base_url('index.php/admin/dashboard') ?>">
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
            <a href="<?= base_url('index.php/admin/pembayaran') ?>">
              <i class="fa fa-users"></i> <span>Data Guru</span>
            </a>
        </li>
       <!--  untuk lvl guru -->
        <?php if ($this->session->userdata('level') == 'Guru') { ?>
          <li>
            <a href="<?= base_url('index.php/admin/tugasjurnal') ?>">
              <i class="fa fa-trophy"></i> <span>Data Tugas</span>
            </a>
          </li>
          <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>Data Tugas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('index.php/admin/tipetugas') ?>"><i class="fa fa-tags"></i> Data Tugas</a></li>
              <li><a href="<?= base_url('index.php/admin/tugasjurnal') ?>"><i class="fa fa-trophy"></i> Tugas Jurnal Harian</a></li>
              <li><a href="<?= base_url('index.php/admin/tugassemester') ?>"><i class="fa fa-star"></i> Tugas Program Semester</a></li>
            </ul>
          </li> -->
        <?php } ?>
        <!-- <li>
          <a href="<?= base_url('index.php/admin/data_router') ?>">
            <i class="fa fa-files-o"></i><span>Data Router</span>
          </a>
        </li> -->
        <?php if ($this->session->userdata('level') == 'Administrator') { ?>
          <li>
            <a href="<?= base_url('index.php/admin/laporantugas') ?>">
              <i class="fa fa-pencil"></i> <span>Laporan Data Tugas</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cogs"></i> <span>Pengaturan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('index.php/admin/user') ?>"><i class="fa fa-circle-o"></i> Manajemen User</a></li>
              <li><a href="<?= base_url('index.php/admin/aplikasi') ?>"><i class="fa fa-circle-o"></i> Tentang Aplikasi</a></li>
              <li><a href="<?= base_url('index.php/admin/log') ?>"><i class="fa fa-circle-o"></i> Log Status</a></li>
            </ul>
          </li>
        <?php } ?>
        <li>
          <a href="<?= base_url('index.php/admin/profil') ?>">
            <i class="fa fa-user"></i> <span>Profil</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('index.php/home/logout') ?>" class="tombol-yakin" data-isidata="Ingin keluar dari sistem ini?">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
          </a>
        </li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->