<div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?= base_url('user/dashboard')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

					<li class="nav-item">
            <a href="<?= base_url('user/absen/read/' . encrypt_url($this->session->userdata('nim'))) ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Absen
              </p>
            </a>
          </li>
          
          <li class="nav-item">
             <a href="<?= base_url('user/aktivitas/read/' . encrypt_url($this->session->userdata('nim')))?>" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Data Aktivitas
              </p>
             </a>
          </li>

           <li class="nav-item">
             <a href="<?= base_url('user/izin/read/' .  encrypt_url($this->session->userdata('nim')))?>" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Data Izin
              </p>
             </a>
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
