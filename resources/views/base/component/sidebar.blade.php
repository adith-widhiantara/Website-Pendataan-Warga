<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Data Warga Desa</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
            <p>
              Kartu Keluarga
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-user nav-icon"></i>
            <p>
              Warga
            </p>
          </a>
        </li>

        <li class="nav-header">Data Kependudukan</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-file-alt nav-icon"></i>
            <p>
              Data Kelahiran
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-file-alt nav-icon"></i>
            <p>
              Data Kematian
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-file-alt nav-icon"></i>
            <p>
              Data Pindah Datang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-file-alt nav-icon"></i>
            <p>
              Data Pindah Keluar
            </p>
          </a>
        </li>

        <li class="nav-header">Daftar Kartu Keluarga</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-table nav-icon"></i>
            <p>
              Data Kartu Keluarga
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('gelar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Gelar
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Golongan Darah
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Agama
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Status Perkawinan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Status Hubungan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Penyandang Cacat
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pendidikan Terakhir
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pekerjaan
                </p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- end Sidebar Menu -->
  </div>
  <!-- end Sidebar -->
</aside>
