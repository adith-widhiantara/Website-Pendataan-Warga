@extends('base.base')

@section('title', 'Tambah Data Kartu Keluarga')

@section('breadcrumb')
  {{ Breadcrumbs::render('kartukeluarga.create') }}
@endsection

@section('base')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">
      Tambah Data Kartu Keluarga
    </h3>
  </div>
  <form action="{{ route('kartukeluarga.store') }}" method="post">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label>
          Nomor KK
        </label>
        <input type="text" class="form-control" placeholder="Masukkan Nomor KK" name="nomorkk">
      </div>
      <div class="form-group">
        <label>
          Alamat
        </label>
        <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
      </div>
      <div class="form-group">
        <label>
          Kode Pos
        </label>
        <input type="number" class="form-control" placeholder="Masukkan Kode Pos" name="kode_pos">
      </div>
      <div class="form-group">
        <label>
          RT
        </label>
        <input type="number" class="form-control" placeholder="Masukkan RT" name="rt">
      </div>
      <div class="form-group">
        <label>
          RW
        </label>
        <input type="number" class="form-control" placeholder="Masukkan RW" name="rw">
      </div>
      <div class="form-group">
        <label>
          Nomor Telepon
        </label>
        <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon" name="telepon_rumah">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">
        Simpan
      </button>
    </div>
  </form>
</div>
@endsection
