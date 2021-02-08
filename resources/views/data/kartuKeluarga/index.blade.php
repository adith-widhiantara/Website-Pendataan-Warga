@extends('base.base')

@section('title', 'Daftar Kartu Keluarga')

@section('breadcrumb')
  {{ Breadcrumbs::render('kartukeluarga.index') }}
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('base')
  <div class="row mb-3">
    <div class="col-12">
      <a href="{{ route('kartukeluarga.create') }}" class="btn btn-primary">
        Tambah Data Kartu Keluarga
      </a>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Kartu Keluarga</h3>
    </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor KK</th>
            <th>Nama Kepala Keluarga</th>
            <th>Alamat</th>
            <th>Telepon Rumah</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $kartuKeluarga as $kartu )
            <tr>
              <td>
                {{ $loop -> iteration }}
              </td>
              <td>
                <a href="{{ route('kartukeluarga.show', $kartu -> nomorkk) }}">
                  {{ $kartu -> nomorkk }}
                </a>
              </td>
              <td>
                {{ \App\AnggotaKeluarga::where('id', $kartu->kepala_keluarga_id)->first()->nama }}
              </td>
              <td>
                {{ $kartu -> alamat }}
              </td>
              <td>
                {{ $kartu -> telepon_rumah }}
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nomor KK</th>
            <th>Nama Kepala Keluarga</th>
            <th>Alamat</th>
            <th>Telepon Rumah</th>
          </tr>
        </tfoot>
      </table>
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
