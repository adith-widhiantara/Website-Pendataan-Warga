@extends('daftarKartuKeluarga.base')

@section('title', 'Status Perkawinan')

@section('breadcrumb')
  {{ Breadcrumbs::render('statusPerkawinan.daftarKartuKeluarga') }}
@endsection

@section('base.daftarKartuKeluarga')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Status Perkawinan</h3>
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
          @foreach( $statusPerkawinan as $kwn )
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>
                <a href="#" data-toggle="modal" data-target="#modal-keterangan-{{ $kwn -> id }}">
                  {{ $kwn -> keterangan }}
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

  @foreach( $statusPerkawinan as $kwn )
    <div class="modal fade" id="modal-keterangan-{{ $kwn -> id }}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Status Perkawinan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('statusPerkawinan.update', $kwn -> id) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-body">
              <div class="form-group">
                <label>Status Perkawinan</label>
                <input type="text" class="form-control" placeholder="Status Perkawinan" name="keterangan" value="{{ $kwn->keterangan }}">
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
      <h3 class="card-title">Tambah Status Perkawinan</h3>
    </div>

    <form action="{{ route('statusPerkawinan.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Status Perkawinan</label>
          <input type="text" class="form-control" placeholder="Status Perkawinan" name="keterangan">
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
