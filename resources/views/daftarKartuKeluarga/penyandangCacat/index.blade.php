@extends('daftarKartuKeluarga.base')

@section('title', 'Penyandang Cacat')

@section('breadcrumb')
  {{ Breadcrumbs::render('penyandangCacat.daftarKartuKeluarga') }}
@endsection

@section('base.daftarKartuKeluarga')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Penyandang Cacat</h3>
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
          @foreach( $penyandangCacat as $cct )
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>
                <a href="#" data-toggle="modal" data-target="#modal-keterangan-{{ $cct -> id }}">
                  {{ $cct -> keterangan }}
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

  @foreach( $penyandangCacat as $cct )
    <div class="modal fade" id="modal-keterangan-{{ $cct -> id }}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Penyandang Cacat</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('penyandangCacat.update', $cct -> id) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-body">
              <div class="form-group">
                <label>Penyandang Cacat</label>
                <input type="text" class="form-control" placeholder="Penyandang Cacat" name="keterangan" value="{{ $cct->keterangan }}">
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
      <h3 class="card-title">Tambah Penyandang Cacat</h3>
    </div>

    <form action="{{ route('penyandangCacat.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Penyandang Cacat</label>
          <input type="text" class="form-control" placeholder="Penyandang Cacat" name="keterangan">
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
