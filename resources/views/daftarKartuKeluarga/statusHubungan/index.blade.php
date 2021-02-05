@extends('daftarKartuKeluarga.base')

@section('title', 'Status Hubungan Dengan Kepala Keluarga')

@section('breadcrumb')
  {{ Breadcrumbs::render('statusHubungan.daftarKartuKeluarga') }}
@endsection

@section('base.daftarKartuKeluarga')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Status Hubungan Dengan Kepala Keluarga</h3>
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
          @foreach( $statusHubungan as $hbg )
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>
                <a href="#" data-toggle="modal" data-target="#modal-keterangan-{{ $hbg -> id }}">
                  {{ $hbg -> keterangan }}
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

  @foreach( $statusHubungan as $hbg )
    <div class="modal fade" id="modal-keterangan-{{ $hbg -> id }}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Status Hubungan Dengan Kepala Keluarga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('statusHubungan.update', $hbg -> id) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-body">
              <div class="form-group">
                <label>Status Hubungan Dengan Kepala Keluarga</label>
                <input type="text" class="form-control" placeholder="Status Hubungan Dengan Kepala Keluarga" name="keterangan" value="{{ $hbg->keterangan }}">
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
      <h3 class="card-title">Tambah Status Hubungan Dengan Kepala Keluarga</h3>
    </div>

    <form action="{{ route('statusHubungan.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Status Hubungan Dengan Kepala Keluarga</label>
          <input type="text" class="form-control" placeholder="Status Hubungan Dengan Kepala Keluarga" name="keterangan">
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
