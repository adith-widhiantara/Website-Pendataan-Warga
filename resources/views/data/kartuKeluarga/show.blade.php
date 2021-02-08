@extends('base.base')

@section('title', 'Detail Kartu Keluarga')

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('breadcrumb')
  {{ Breadcrumbs::render('kartukeluarga.show', $kartuKeluarga) }}
@endsection

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Detail Kartu Keluarga
      </h3>
    </div>
    <form action="{{ route('kartukeluarga.update', $kartuKeluarga -> nomorkk) }}" method="post">
      @csrf
      @method('patch')
      <div class="card-body">
        <div class="form-group">
          <label>
            Nama Kepala Keluarga
          </label>

          @if(isset($kartuKeluarga -> kepala_keluarga_id))
            <input type="text" class="form-control" value="{{ \App\AnggotaKeluarga::where('id', $kartuKeluarga->kepala_keluarga_id)->first()->nama }}" disabled>
          @else
            <input type="text" class="form-control" value="( Kosong )" disabled>
          @endif
        </div>
        <div class="form-group">
          <label>
            Alamat
          </label>
          <input type="text" class="form-control" name="alamat" value="{{ $kartuKeluarga->alamat }}">
        </div>
        <div class="row">
          <div class="col-2">
            <div class="form-group">
              <label>
                Kode Pos
              </label>
              <input type="text" class="form-control" name="kode_pos" value="{{ $kartuKeluarga->kode_pos }}">
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <label>
                RT
              </label>
              <input type="text" class="form-control" name="rt" value="{{ $kartuKeluarga->rt }}">
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <label>
                RW
              </label>
              <input type="text" class="form-control" name="rw" value="{{ $kartuKeluarga->rw }}">
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label>
                Nomor Telepon
              </label>
              <input type="text" class="form-control" name="telepon_rumah" value="{{ $kartuKeluarga->telepon_rumah }}">
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label>
                Jumlah anggota keluarga
              </label>
              <input type="text" class="form-control" value="{{ $kartuKeluarga->anggotaKeluarga->count() }}" disabled>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <a href="{{ route('anggotakeluarga.create', $kartuKeluarga->nomorkk) }}" class="btn btn-success">
          Tambah Anggota Keluarga
        </a>
        <button type="submit" class="btn btn-primary float-right">
          Simpan
        </button>
      </div>
    </form>
  </div>

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Daftar Anggota Keluarga
      </h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Usia</th>
            <th>Status Hubungan Dalam Keluarga</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $kartuKeluarga -> anggotaKeluarga as $anggota )
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>
                <a href="{{ route('anggotakeluarga.show', [ $kartuKeluarga -> nomorkk, $anggota -> nomor_ktp ]) }}">
                  {{ $anggota -> nama }}
                </a>
              </td>
              <td>{{ $anggota -> nomor_ktp }}</td>
              <td>{{ $anggota -> jenis_kelamin }}</td>
              <td>{{ \Carbon\Carbon::parse( $anggota -> tanggal_bulan_tahun_lahir )->age }}</td>
              <td>{{ \App\StatusHubunganDenganKepalaKeluarga::where('id', $anggota -> status_hubungan_dengan_kepala_keluargas_id)->first()->keterangan }}</td>
              <td>{{ $anggota -> nama_ayah }}</td>
              <td>{{ $anggota -> nama_ibu }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Usia</th>
            <th>Status Hubungan Dalam Keluarga</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="card-footer">

    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      @if (session('status'))
        Toast.fire({
          icon: 'success',
          title: '{{ session('status') }}'
        });
      @endif
    });
  </script>
@endsection
