@extends('base.base')

@section('title', 'Buat Data Pindah Datang')

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('lte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
@endsection

@section('breadcrumb', Breadcrumbs::render('datapindahdatang.create', $dataKartuKeluarga))

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Buat Data Pindah Datang
      </h3>
    </div>

    <form action="{{ route('datapindahdatang.store', $dataKartuKeluarga->nomorkk) }}" method="post">
      @csrf
      <div class="card-body">

        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-warning" role="alert">
              {{ $error }}
            </div>
          @endforeach
        @endif

        <div class="bs-stepper">
          <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#data-anggota-keluarga">
              <button type="button" class="step-trigger" role="tab" aria-controls="data-anggota-keluarga" id="data-anggota-keluarga-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Data Anggota Keluarga</span>
              </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#data-pindah-datang">
              <button type="button" class="step-trigger" role="tab" aria-controls="data-pindah-datang" id="data-pindah-datang-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Data Pindah Datang</span>
              </button>
            </div>
          </div>

          <div class="bs-stepper-content">
            <div id="data-anggota-keluarga" class="content" role="tabpanel" aria-labelledby="data-anggota-keluarga-trigger">

              <div class="form-group">
                <label>
                  Nomor Kartu Keluarga
                </label>
                <input type="text" class="form-control" value="{{ $dataKartuKeluarga->nomorkk }}" disabled>
              </div>

              <div class="form-group">
                <label>
                  Nama
                </label>
                <input type="text" required class="typeahead form-control" placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}">
              </div>

              <div class="form-group">
                <label>
                  Gelar
                </label>
                <select class="form-control select2" style="width: 100%;" name="gelars_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\Gelar::all() as $gelar )
                    <option @if( old('gelars_id') == $gelar -> id ) selected="selected" @endif value="{{ $gelar -> id }}">{{ $gelar -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  NIK
                </label>
                <input type="text" required class="form-control" placeholder="Masukkan NIK" name="nomor_ktp" value="{{ old('nomor_ktp') }}">
              </div>

              <div class="form-group">
                <label>
                  Jenis Kelamin
                </label>
                <select class="form-control select2" style="width: 100%;" name="jenis_kelamin">
                  <option value="" selected="selected">...</option>
                  <option @if( old('jenis_kelamin') == "Laki-Laki" ) selected="selected" @endif value="Laki-Laki">Laki-Laki</option>
                  <option @if( old('jenis_kelamin') == "Perempuan" ) selected="selected" @endif value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label>
                  Tempat Lahir
                </label>
                <input type="text" required class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
              </div>

              <div class="form-group">
                <label>
                  Tanggal Lahir
                </label>
                <div class="input-group date" id="tanggalLahir" data-target-input="nearest">
                  <div class="input-group-prepend" data-target="#tanggalLahir" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <input type="text" required class="form-control datetimepicker-input" data-target="#tanggalLahir" name="tanggal_bulan_tahun_lahir" value="{{ old('tanggal_bulan_tahun_lahir') }}"/>
                </div>
              </div>

              <div class="form-group">
                <label>
                  Akte Kelahiran
                </label>
                <select class="form-control select2" style="width: 100%;" name="surat_lahir">
                  <option value="" selected="selected">...</option>
                  <option @if( old('surat_lahir') == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
                  <option @if( old('surat_lahir') == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
                </select>
              </div>

              <div class="form-group">
                <label>
                  Nomor Akte Kelahiran
                </label>
                <input type="text" class="form-control" placeholder="Masukkan Nomor Akte Kelahiran, Apabila Ada" name="nomor_surat_lahir" value="{{ old('nomor_surat_lahir') }}">
              </div>

              <div class="form-group">
                <label>
                  Golongan Darah
                </label>
                <select class="form-control select2" style="width: 100%;" name="golongan_darahs_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\GolonganDarah::all() as $darah )
                    <option @if( old('golongan_darahs_id') == $darah -> id ) selected="selected" @endif value="{{ $darah -> id }}">{{ $darah -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  Agama
                </label>
                <select class="form-control select2" style="width: 100%;" name="agamas_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\Agama::all() as $agama )
                    <option @if( old('agamas_id') == $agama -> id ) selected="selected" @endif value="{{ $agama -> id }}">{{ $agama -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  Kepercayaan Kepada Tuhan Yang Maha Esa
                </label>
                <input type="text" class="form-control" placeholder="Masukkan Kepercayaan Kepada Tuhan Yang Maha Esa, Apabila Memilih Kepercayaan Kepada Tuhan Yang Maha Esa" name="kepercayaan_terhadap_tuhan_yang_maha_esa" value="{{ old('kepercayaan_terhadap_tuhan_yang_maha_esa') }}">
              </div>

              <div class="form-group">
                <label>
                  Status Perkawinan
                </label>
                <select class="form-control select2" style="width: 100%;" name="status_perkawinans_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\StatusPerkawinan::all() as $kawin )
                    <option @if( old('status_perkawinans_id') == $kawin -> id ) selected="selected" @endif value="{{ $kawin -> id }}">{{ $kawin -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  Akte Perkawinan
                </label>
                <select class="form-control select2" style="width: 100%;" name="buku_nikah">
                  <option value="" selected="selected">...</option>
                  <option @if( old('buku_nikah') == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
                  <option @if( old('buku_nikah') == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
                </select>
              </div>

              <div class="form-group">
                <label>
                  Nomor Akte Perkawinan
                </label>
                <input type="text" class="form-control" placeholder="Masukkan Nomor Akte Perkawinan, Apabila Ada" name="nomor_buku_nikah" value="{{ old('nomor_buku_nikah') }}">
              </div>

              <div class="form-group">
                <label>
                  Tanggal Perkawinan
                </label>
                <div class="input-group date" id="tanggalPerkawinan" data-target-input="nearest">
                  <div class="input-group-prepend" data-target="#tanggalPerkawinan" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalPerkawinan" name="tanggal_perkawinan" value="{{ old('tanggal_perkawinan') }}"/>
                </div>
              </div>

              <div class="form-group">
                <label>
                  Akte Perceraian
                </label>
                <select class="form-control select2" style="width: 100%;" name="surat_cerai">
                  <option value="" selected="selected">...</option>
                  <option @if( old('surat_cerai') == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
                  <option @if( old('surat_cerai') == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
                </select>
              </div>

              <div class="form-group">
                <label>
                  Nomor Akte Perceraian
                </label>
                <input type="text" class="form-control" placeholder="Masukkan Nomor Akte Perceraian, Apabila Ada" name="nomor_surat_cerai" value="{{ old('nomor_surat_cerai') }}">
              </div>

              <div class="form-group">
                <label>
                  Tanggal Perceraian
                </label>
                <div class="input-group date" id="tanggalPerceraian" data-target-input="nearest">
                  <div class="input-group-prepend" data-target="#tanggalPerceraian" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalPerceraian" name="tanggal_perceraian" value="{{ old('tanggal_perceraian') }}"/>
                </div>
              </div>

              <div class="form-group">
                <label>
                  Status Hubungan Dengan Kepala Keluarga
                </label>
                <select class="form-control select2" style="width: 100%;" name="status_hubungan_dengan_kepala_keluargas_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\StatusHubunganDenganKepalaKeluarga::all() as $keluarga )
                    <option @if( old('status_hubungan_dengan_kepala_keluargas_id') == $keluarga -> id ) selected="selected" @endif value="{{ $keluarga -> id }}">{{ $keluarga -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  Kelainan Fisik dan Mental
                </label>
                <select class="form-control select2" style="width: 100%;" name="kelainan_fisik">
                  <option value="" selected="selected">...</option>
                  <option @if( old('kelainan_fisik') == "Ada" ) selected="selected" @endif value="Ada">Ada</option>
                  <option @if( old('kelainan_fisik') == "Tidak Ada" ) selected="selected" @endif value="Tidak Ada">Tidak Ada</option>
                </select>
              </div>

              <div class="form-group">
                <label>
                  Penyandang Cacat
                </label>
                <select class="form-control select2" style="width: 100%;" name="penyandang_cacats_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\PenyandangCatat::all() as $cacat )
                    <option @if( old('penyandang_cacats_id') == $cacat -> id ) selected="selected" @endif value="{{ $cacat -> id }}">{{ $cacat -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  Pendidikan Terakhir
                </label>
                <select class="form-control select2" style="width: 100%;" name="pendidikan_terakhirs_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\PendidikanTerakhir::all() as $pendidikan )
                    <option @if( old('pendidikan_terakhirs_id') == $pendidikan -> id ) selected="selected" @endif value="{{ $pendidikan -> id }}">{{ $pendidikan -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  Pekerjaan
                </label>
                <select class="form-control select2" style="width: 100%;" name="pekerjaans_id">
                  <option value="" selected="selected">...</option>
                  @foreach ( \App\Pekerjaan::all() as $kerja )
                    <option @if( old('pekerjaans_id') == $kerja -> id ) selected="selected" @endif value="{{ $kerja -> id }}">{{ $kerja -> keterangan }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>
                  NIK Ibu
                </label>
                <input type="text" class="form-control" placeholder="Masukkan NIK Ibu" name="nik_ibu" value="{{ old('nik_ibu') }}">
              </div>

              <div class="form-group">
                <label>
                  Nama Ibu
                </label>
                <input type="text" required class="form-control" placeholder="Masukkan Nama Ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
              </div>

              <div class="form-group">
                <label>
                  NIK Ayah
                </label>
                <input type="text" class="form-control" placeholder="Masukkan NIK Ayah" name="nik_ayah" value="{{ old('nik_ayah') }}">
              </div>

              <div class="form-group">
                <label>
                  Nama Ayah
                </label>
                <input type="text" required class="form-control" placeholder="Masukkan Nama Ayah" name="nama_ayah" value="{{ old('nama_ayah') }}">
              </div>

              <a class="btn btn-primary" onclick="stepper.next()">
                Selanjutnya
              </a>
            </div>
            <div id="data-pindah-datang" class="content" role="tabpanel" aria-labelledby="data-pindah-datang-trigger">

              <div class="form-group">
                <label>
                  Alamat Asal
                </label>
                <input type="text" class="form-control" name="alamat_asal" placeholder="Masukkan Alamat Asal" value="{{ old('alamat_asal') }}">
              </div>

              <div class="form-group">
                <label>
                  Tanggal Surat
                </label>
                <div class="input-group date" id="tanggalSurat" data-target-input="nearest">
                  <div class="input-group-prepend" data-target="#tanggalSurat" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalSurat" name="tanggal_surat" value="{{ old('tanggal_surat') }}"/>
                </div>
              </div>

              <div class="form-group">
                <label>
                  Nomor Surat
                </label>
                <input type="text" class="form-control" name="nomor_surat" placeholder="Masukkan Nomor Surat" value="{{ old('nomor_surat') }}">
              </div>

              <div class="form-group">
                <label>
                  Keterangan
                </label>
                <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan" value="{{ old('keterangan') }}">
              </div>

              <a class="btn btn-primary" onclick="stepper.previous()">
                Sebelumnya
              </a>
              <button type="submit" class="btn btn-primary">
                Simpan
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('script')
  <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>

  <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <script src="{{ asset('lte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

  <script>
    $(function () {
      $('.select2').select2();

      $('#tanggalLahir').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });

      $('#tanggalPerkawinan').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });

      $('#tanggalPerceraian').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });

      $('#tanggalSurat').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });
  </script>
@endsection
