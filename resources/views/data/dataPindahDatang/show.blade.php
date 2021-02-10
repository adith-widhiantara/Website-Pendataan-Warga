@extends('base.base')

@section('title', $DataPindahDatang->anggotaKeluarga->nama)

@section('breadcrumb', Breadcrumbs::render('datapindahdatang.show', $DataPindahDatang))

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Detail Data Pindah Datang
      </h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>
          Tanggal Melapor
        </label>
        <input type="text" disabled class="form-control" value="{{ \Carbon\Carbon::parse($DataPindahDatang -> tanggal_melapor)->isoFormat('Do MMMM YYYY') }}">
      </div>

      <div class="form-group">
        <label>
          Nama
        </label>
        <input type="text" disabled class="form-control" value="{{ \App\AnggotaKeluarga::where('id', $DataPindahDatang -> anggota_keluarga_id)->first()->nama }}">
      </div>

      <div class="form-group">
        <label>
          Alamat Asal
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataPindahDatang -> alamat_asal }}">
      </div>

      <div class="form-group">
        <label>
          Tanggal Surat
        </label>
        <input type="text" disabled class="form-control" value="{{ \Carbon\Carbon::parse($DataPindahDatang -> tanggal_surat)->isoFormat('Do MMMM YYYY') }}">
      </div>

      <div class="form-group">
        <label>
          Nomor Surat
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataPindahDatang -> nomor_surat }}">
      </div>

      <div class="form-group">
        <label>
          Keterangan
        </label>
        <input type="text" disabled class="form-control" value="{{ $DataPindahDatang -> keterangan }}">
      </div>
    </div>
    <div class="card-footer">
      <a href="{{ route('anggotakeluarga.show', [ $DataPindahDatang->anggotaKeluarga->kartuKeluarga->nomorkk, $DataPindahDatang->anggotaKeluarga->nomor_ktp ]) }}" class="btn btn-primary float-right">
        Detail Anggota Keluarga
      </a>
    </div>
  </div>
@endsection
