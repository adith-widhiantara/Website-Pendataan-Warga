@extends('daftarKartuKeluarga.base')

@section('title', 'Gelar')

@section('breadcrumb')
  {{ Breadcrumbs::render('gelar.daftarKartuKeluarga') }}
@endsection

@section('base.daftarKartuKeluarga')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Gelar</h3>
    </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $gelar as $glr )
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>
                <a href="#" data-toggle="modal" data-target="#modal-keterangan-{{ $glr -> id }}">
                  {{ $glr -> keterangan }}
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Keterangan</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  @foreach( $gelar as $glr )
    <div class="modal fade" id="modal-keterangan-{{ $glr -> id }}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Gelar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('gelar.update', $glr -> id) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-body">
              <div class="form-group">
                <label>Gelar</label>
                <input type="text" class="form-control" placeholder="Gelar" name="keterangan" value="{{ $glr->keterangan }}">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Gelar</h3>
    </div>

    <form action="{{ route('gelar.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Gelar</label>
          <input type="text" class="form-control" placeholder="Gelar" name="keterangan">
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
