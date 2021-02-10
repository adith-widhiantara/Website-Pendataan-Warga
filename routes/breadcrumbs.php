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

  // Data Kelahiran
  Breadcrumbs::for('datakelahiran.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Daftar Data Kelahiran', route('datakelahiran.index'));
  });

  Breadcrumbs::for('datakelahiran.create', function ($trail, $dataKartuKeluarga) {
    $trail->parent('datakelahiran.index');
    $trail->push('Buat Data Kelahiran', route('datakelahiran.create', $dataKartuKeluarga->nomorkk));
  });

  Breadcrumbs::for('datakelahiran.show', function ($trail, $DataKelahiran) {
    $trail->parent('datakelahiran.index');
    $trail->push('Detail Data Kelahiran', route('datakelahiran.show', $DataKelahiran->id));
  });
  // end Data Kelahiran

  // Data Kematian
  Breadcrumbs::for('datakematian.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Daftar Data Kematian', route('datakematian.index'));
  });

  Breadcrumbs::for('datakematian.create', function ($trail, $dataKartuKeluarga) {
    $trail->parent('datakematian.index');
    $trail->push('Buat Data Kematian', route('datakematian.create', $dataKartuKeluarga->nomorkk));
  });

  Breadcrumbs::for('datakematian.show', function ($trail, $DataKematian) {
    $trail->parent('datakematian.index');
    $trail->push('Detail Data Kematian', route('datakematian.show', $DataKematian->id));
  });
  // end Data Kematian

  // kartukeluarga
  Breadcrumbs::for('kartukeluarga.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Daftar Kartu Keluarga', route('kartukeluarga.index'));
  });

  Breadcrumbs::for('kartukeluarga.create', function ($trail) {
    $trail->parent('kartukeluarga.index');
    $trail->push('Tambah Kartu Keluarga', route('kartukeluarga.create'));
  });

  Breadcrumbs::for('kartukeluarga.show', function ($trail, $kartuKeluarga) {
    $trail->parent('kartukeluarga.index');
    $trail->push($kartuKeluarga->nomorkk, route('kartukeluarga.show', $kartuKeluarga->nomorkk));
  });
  // end kartukeluarga

  // anggotakeluarga
  Breadcrumbs::for('anggotakeluarga.create', function ($trail, $kartuKeluarga) {
    $trail->parent('kartukeluarga.show', $kartuKeluarga);
    $trail->push('Tambah Anggota Keluarga', route('anggotakeluarga.create', $kartuKeluarga->nomorkk));
  });

  Breadcrumbs::for('anggotakeluarga.show', function ($trail, $anggotaKeluarga) {
    $trail->parent('kartukeluarga.index');
    $trail->push($anggotaKeluarga->kartuKeluarga->nomorkk, route('kartukeluarga.show', $anggotaKeluarga->kartuKeluarga->nomorkk));
    $trail->push($anggotaKeluarga->nomor_ktp, route('anggotakeluarga.show', [ $anggotaKeluarga->kartuKeluarga->nomorkk, $anggotaKeluarga->nomor_ktp ]));
  });

  Breadcrumbs::for('anggotakeluarga.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Daftar Warga', route('anggotakeluarga.index'));
  });
  // end anggotakeluarga

  // daftarKartuKeluarga
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
  // end daftarKartuKeluarga
?>
