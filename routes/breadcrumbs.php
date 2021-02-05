<?php
  Breadcrumbs::for('landing', function ($trail) {
    $trail->push('Halaman Utama', route('landing'));
  });

  Breadcrumbs::for('user.read', function ($trail, $user) {
    $trail->parent('landing');
    $trail->push('Profil Saya', route('user.showAuth', $user -> nip));
  });

  Breadcrumbs::for('user.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Daftar Pengguna', route('user.index'));
  });

  Breadcrumbs::for('gelar.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Gelar', route('gelar.index'));
  });

  Breadcrumbs::for('darah.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Golongan Darah', route('darah.index'));
  });

  Breadcrumbs::for('agama.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Agama', route('agama.index'));
  });

  Breadcrumbs::for('statusPerkawinan.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Status Perkawinan', route('statusPerkawinan.index'));
  });

  Breadcrumbs::for('statusHubungan.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Status Hubungan Dengan Kepala Keluarga', route('statusHubungan.index'));
  });

  Breadcrumbs::for('penyandangCacat.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Penyandang Cacat', route('penyandangCacat.index'));
  });

  Breadcrumbs::for('pendidikanTerakhir.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Pendidikan Terakhir', route('pendidikanTerakhir.index'));
  });

  Breadcrumbs::for('pekerjaan.daftarKartuKeluarga', function ($trail) {
    $trail->parent('landing');
    $trail->push('Pekerjaan', route('pekerjaan.index'));
  });
?>
