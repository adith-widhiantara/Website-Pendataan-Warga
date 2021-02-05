@extends('daftarKartuKeluarga.base')

@section('title', 'Pekerjaan')

@section('breadcrumb')
  {{ Breadcrumbs::render('pekerjaan.daftarKartuKeluarga') }}
@endsection

@section('base.daftarKartuKeluarga')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Pekerjaan</h3>
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
          @foreach( $pekerjaan as $pkrj )
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>
                <a href="#" data-toggle="modal" data-target="#modal-keterangan-{{ $pkrj -> id }}">
                  {{ $pkrj -> keterangan }}
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

  @foreach( $pekerjaan as $pkrj )
    <div class="modal fade" id="modal-keterangan-{{ $pkrj -> id }}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pekerjaan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('pekerjaan.update', $pkrj -> id) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-body">
              <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" placeholder="Pekerjaan" name="keterangan" value="{{ $pkrj->keterangan }}">
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
      <h3 class="card-title">Tambah Pekerjaan</h3>
    </div>

    <form action="{{ route('pekerjaan.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Pekerjaan</label>
          <input type="text" class="form-control" placeholder="Pekerjaan" name="keterangan">
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
