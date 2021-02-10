@extends('base.base')

@section('title', $DataPindahKeluar->anggotaKeluarga->nama)

@section('breadcrumb', Breadcrumbs::render('datapindahkeluar.show', $DataPindahKeluar))

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Detail Data Pindah Keluar
      </h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>
          Tanggal Melapor
        </label>
        <input type="text" disabled class="form-control" value="{{ \Carbon\Carbon::parse($DataPindahKeluar -> tanggal_melapor)->isoFormat('Do MMMM YYYY') }}">
      </div>

      <div class="form-group">
        <label>
          Nama
        </label>
        <input type="text" disabled class="form-control" value="{{ \App\AnggotaKeluarga::where('id', $DataPindahKeluar -> anggota_keluarga_id)->first()->nama }}">
      </div>

      <div class="form-group">
        <label>
          Alamat Tujuan
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataPindahKeluar -> alamat_tujuan }}">
      </div>

      <div class="form-group">
        <label>
          Tanggal Surat
        </label>
        <input type="text" disabled class="form-control" value="{{ \Carbon\Carbon::parse($DataPindahKeluar -> tanggal_surat)->isoFormat('Do MMMM YYYY') }}">
      </div>

      <div class="form-group">
        <label>
          Nomor Surat
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataPindahKeluar -> nomor_surat }}">
      </div>

      <div class="form-group">
        <label>
          Keterangan
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataPindahKeluar -> keterangan }}">
      </div>
    </div>
    <div class="card-footer">
      <a href="{{ route('anggotakeluarga.show', [ $DataPindahKeluar->anggotaKeluarga->kartuKeluarga->nomorkk, $DataPindahKeluar->anggotaKeluarga->nomor_ktp ]) }}" class="btn btn-primary float-right">
        Detail Anggota Keluarga
      </a>
    </div>
  </div>
@endsection
