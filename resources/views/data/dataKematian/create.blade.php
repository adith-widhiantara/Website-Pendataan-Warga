@extends('base.base')

@section('title', 'Tambah Data Kematian')

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('breadcrumb', Breadcrumbs::render('datakematian.create', $dataKartuKeluarga))

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Buat Data Kematian
      </h3>
    </div>
    <form action="{{ route('datakematian.store', $dataKartuKeluarga->nomorkk) }}" method="post">
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
            Nama Pelapor
          </label>
          <select class="form-control select2" style="width: 100%;" name="nama_pelapor_id">
            <option value="" selected="selected">...</option>
            @foreach ( $dataKartuKeluarga->anggotaKeluarga as $anggota )
            <option @if( old('nama_pelapor_id') == $anggota -> id ) selected="selected" @endif value="{{ $anggota -> id }}">{{ $anggota -> nama }}</option>
            @endforeach
          </select>
        </div>

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
            Tanggal Meninggal
          </label>
          <div class="input-group date" id="tanggalMeninggal" data-target-input="nearest">
            <div class="input-group-prepend" data-target="#tanggalMeninggal" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" required class="form-control datetimepicker-input" data-target="#tanggalMeninggal" name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}"/>
          </div>
        </div>

        <div class="form-group">
          <label>
            Tempat Meninggal
          </label>
          <input type="text" placeholder="Masukkan Tempat Meninggal" required class="form-control" name="tempat_meninggal" value="{{ old('tempat_meninggal') }}">
        </div>

        <div class="form-group">
          <label>
            Sebab Meninggal
          </label>
          <input type="text" placeholder="Masukkan Sebab Meninggal" required class="form-control" name="sebab_kematian" value="{{ old('sebab_kematian') }}">
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

      $('#tanggalMeninggal').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'
      });
    });
  </script>
@endsection
