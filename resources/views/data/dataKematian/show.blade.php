@extends('base.base')

@section('title', $DataKematian->anggotaKeluarga->nama)

@section('breadcrumb', Breadcrumbs::render('datakematian.show', $DataKematian))

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Detail Data Kelahiran
      </h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>
          Tanggal Melapor
        </label>
        <input type="text" disabled class="form-control" value="{{ \Carbon\Carbon::parse($DataKematian -> tanggal_melapor)->isoFormat('Do MMMM YYYY') }}">
      </div>

      <div class="form-group">
        <label>
          Nama
        </label>
        <input type="text" disabled class="form-control" value="{{ \App\AnggotaKeluarga::where('id', $DataKematian -> anggota_keluarga_id)->first()->nama }}">
      </div>

      <div class="form-group">
        <label>
          Tanggal Meninggal
        </label>
        <input type="text" disabled class="form-control" value="{{ \Carbon\Carbon::parse($DataKematian -> tanggal_meninggal)->isoFormat('Do MMMM YYYY') }}">
      </div>

      <div class="form-group">
        <label>
          Tempat Meninggal
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataKematian -> tempat_meninggal }}">
      </div>

      <div class="form-group">
        <label>
          Sebab Meninggal
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataKematian -> sebab_kematian }}">
      </div>

      <div class="form-group">
        <label>
          Keterangan
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataKematian -> keterangan }}">
      </div>

      <div class="form-group">
        <label>
          Nama Pelapor
        </label>
        <input type="text" disabled class="form-control" value="{{ \App\AnggotaKeluarga::where('id', $DataKematian -> nama_pelapor_id)->first()->nama }}">
      </div>

    </div>
    <div class="card-footer">
      <a href="{{ route('anggotakeluarga.show', [ $DataKematian->anggotaKeluarga->kartuKeluarga->nomorkk, $DataKematian->anggotaKeluarga->nomor_ktp ]) }}" class="btn btn-primary float-right">
        Detail Anggota Keluarga
      </a>
    </div>
  </div>
@endsection
