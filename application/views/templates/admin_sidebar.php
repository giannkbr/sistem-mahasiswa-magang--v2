<div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?= base_url('dashboard') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Master Mahasiswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa') ?>" class="nav-link">
                  <!-- <i class="fas fa-book nav-icon"></i> -->
                  <p>Data Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('kontrak') ?>" class="nav-link">
                  <!-- <i class="fas fa-book nav-icon"></i> -->
                  <p>Data Kontrak</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('nilai') ?>" class="nav-link">
                  <!-- <i class="fas fa-book nav-icon"></i> -->
                  <p>Data Nilai</p>
                </a>
              </li>
            </ul>
          </li>

					<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Master Absen
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('absen') ?>" class="nav-link">
                  <!-- <i class="fas fa-book nav-icon"></i> -->
                  <p>Data Absensi</p>
                </a>
              </li>
							<li class="nav-item">
                <a href="<?= base_url('izin') ?>" class="nav-link">
                  <!-- <i class="fas fa-book nav-icon"></i> -->
                  <p>Data Izin</p>
                </a>
              </li>
							<li class="nav-item">
                <a href="<?= base_url('aktivitas') ?>" class="nav-link">
                  <!-- <i class="fas fa-book nav-icon"></i> -->
                  <p>Data Aktivitas</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                  <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('absen/rekap_bulan') ?>" class="nav-link">
                  <!-- <i class="fas fa-book nav-icon"></i> -->
                  <p>Rekap Absensi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>"onclick="return confirm('Apakah anda yakin ingin logout?')">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
