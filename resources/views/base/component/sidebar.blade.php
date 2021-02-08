<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('landing') }}" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Data Warga Desa</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (isset(Auth::user()->photo))
          <img src="{{ asset('img/profil/'. Auth::user()->photo) }}" class="img-circle elevation-2" alt="User Image">
        @else
          <img src="{{ asset('img/profil/profile.png') }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          @if ( url()->current() == route('kartukeluarga.index') )
            <a href="#" class="nav-link active">
          @else
            <a href="{{ route('kartukeluarga.index') }}" class="nav-link">
          @endif
            <i class="fas fa-users nav-icon"></i>
            <p>
              Kartu Keluarga
            </p>
          </a>
        </li>

        <li class="nav-item">
          @if ( url()->current() == route('anggotakeluarga.index') )
            <a href="#" class="nav-link active">
          @else
            <a href="{{ route('anggotakeluarga.index') }}" class="nav-link">
          @endif
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
        @if ( url()->current() == route('gelar.index')  || url()->current() == route('darah.index') || url()->current() == route('agama.index') || url()->current() == route('statusPerkawinan.index') || url()->current() == route('statusHubungan.index') || url()->current() == route('penyandangCacat.index') || url()->current() == route('pendidikanTerakhir.index') || url()->current() == route('pekerjaan.index') )
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
        @else
        <li class="nav-item">
          <a href="#" class="nav-link">
        @endif
            <i class="fas fa-table nav-icon"></i>
            <p>
              Data Kartu Keluarga
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @if ( url()->current() == route('gelar.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('gelar.index') }}" class="nav-link">
              @endif
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Gelar
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if ( url()->current() == route('darah.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('darah.index') }}" class="nav-link">
              @endif
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Golongan Darah
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if ( url()->current() == route('agama.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('agama.index') }}" class="nav-link">
              @endif
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Agama
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if ( url()->current() == route('statusPerkawinan.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('statusPerkawinan.index') }}" class="nav-link">
              @endif
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Status Perkawinan
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if ( url()->current() == route('statusHubungan.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('statusHubungan.index') }}" class="nav-link">
              @endif
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Status Hubungan
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if ( url()->current() == route('penyandangCacat.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('penyandangCacat.index') }}" class="nav-link">
              @endif
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Penyandang Cacat
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if ( url()->current() == route('pendidikanTerakhir.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('pendidikanTerakhir.index') }}" class="nav-link">
              @endif
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pendidikan Terakhir
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if ( url()->current() == route('pekerjaan.index') )
                <a href="#" class="nav-link active">
              @else
                <a href="{{ route('pekerjaan.index') }}" class="nav-link">
              @endif
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
