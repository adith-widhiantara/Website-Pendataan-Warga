@extends('base.base')

@section('title', $DataKelahiran->anggotaKeluarga->nama)

@section('breadcrumb', Breadcrumbs::render('datakelahiran.show', $DataKelahiran))

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
        <input type="text" disabled class="form-control" value="{{ \Carbon\Carbon::parse($DataKelahiran -> tanggal_melapor)->isoFormat('Do MMMM YYYY') }}">
      </div>

      <div class="form-group">
        <label>
          Nama Pelapor
        </label>
        <input type="text" disabled class="form-control" value="{{ \App\AnggotaKeluarga::where('id', $DataKelahiran -> nama_pelapor_id)->first()->nama }}">
      </div>

      <div class="form-group">
        <label>
          Nama
        </label>
        <input type="text" disabled class="form-control" value="{{ \App\AnggotaKeluarga::where('id', $DataKelahiran -> anggota_keluarga_id)->first()->nama }}">
      </div>

      <div class="form-group">
        <label>
          Anak Ke -
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataKelahiran -> nomor_anak }}">
      </div>

      <div class="form-group">
        <label>
          Keterangan
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataKelahiran -> keterangan }}">
      </div>
    </div>
    <div class="card-footer">
      <a href="{{ route('anggotakeluarga.show', [ $DataKelahiran->anggotaKeluarga->kartuKeluarga->nomorkk, $DataKelahiran->anggotaKeluarga->nomor_ktp ]) }}" class="btn btn-primary float-right">
        Detail Anggota Keluarga
      </a>
    </div>
  </div>
@endsection
