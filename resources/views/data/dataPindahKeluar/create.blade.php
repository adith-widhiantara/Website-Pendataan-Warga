@extends('base.base')

@section('title', 'Tambah Data Pindah Keluar')

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('breadcrumb', Breadcrumbs::render('datapindahkeluar.create', $dataKartuKeluarga))

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Buat Data Pindah Keluar
      </h3>
    </div>
    <form action="{{ route('datapindahkeluar.store') }}" method="post">
      @csrf
      <div class="card-body">

        @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-warning" role="alert">
            {{ $error }}
          </div>
          @endforeach
        @endif

        <div class="form-group">
          <label>
            Nama
          </label>
          <select class="form-control select2" style="width: 100%;" name="anggota_keluarga_id">
            <option value="" selected="selected">...</option>
              @foreach ( $dataKartuKeluarga->anggotaKeluarga as $anggota )
                <option @if( old('anggota_keluarga_id') == $anggota -> id ) selected="selected" @endif value="{{ $anggota -> id }}">{{ $anggota -> nama }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>
            Tanggal Surat
          </label>
          <div class="input-group date" id="tanggalSurat" data-target-input="nearest">
            <div class="input-group-prepend" data-target="#tanggalSurat" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" required class="form-control datetimepicker-input" data-target="#tanggalSurat" name="tanggal_surat" value="{{ old('tanggal_surat') }}"/>
          </div>
        </div>

        <div class="form-group">
          <label>
            Nomor Surat
          </label>
          <input type="text" placeholder="Masukkan Nomor Surat" class="form-control" name="nomor_surat" value="{{ old('nomor_surat') }}">
        </div>

        <div class="form-group">
          <label>
            Alamat Tujuan
          </label>
          <input type="text" placeholder="Masukkan Alamat Tujuan" class="form-control" name="alamat_tujuan" value="{{ old('alamat_tujuan') }}">
        </div>

        <div class="form-group">
          <label>
            Keterangan
          </label>
          <input type="text" placeholder="Masukkan Keterangan" class="form-control" name="keterangan" value="{{ old('keterangan') }}">
        </div>

      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary float-right">
          Simpan
        </button>
      </div>
    </form>
  </div>
@endsection

@section('script')
  <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>

  <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <script>
    $(function () {
      $('.select2').select2();

      $('#tanggalSurat').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });
    });
  </script>
@endsection
