@extends('base.base')

@section('title', 'Data Kematian')

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('breadcrumb', Breadcrumbs::render('datakematian.index'))

@section('base')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">
        Daftar Data Kematian
      </h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">
            Buat Data Kematian
          </a>

          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Cari Kartu Keluarga</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('datakematian.findNomorkk') }}" method="post">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nomor Kartu Keluarga</label>
                      <select class="form-control select2" style="width: 100%;" name="nomorkk">
                        <option value="" selected="selected">...</option>
                        @foreach( \App\KartuKeluarga::all() as $kartu )
                          <option value="{{ $kartu->nomorkk }}">{{ $kartu->nomorkk }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Melapor</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Tanggal Meninggal</th>
            <th>Tempat Meninggal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $dataKematian as $data )
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>{{ $data -> tanggal_melapor }}</td>
              <td>
                <a href="{{ route('anggotakeluarga.show', [ $data->anggotaKeluarga->kartuKeluarga->nomorkk, $data->anggotaKeluarga->nomor_ktp ]) }}">
                  {{ $data -> anggotaKeluarga -> nama }}
                </a>
              </td>
              <td>{{ \Carbon\Carbon::parse($data -> anggotaKeluarga -> tanggal_bulan_tahun_lahir)->age }}</td>
              <td>{{ \Carbon\Carbon::parse($data -> anggotaKeluarga -> tanggal_meninggal)->isoFormat('Do MMMM YYYY') }}</td>
              <td>{{ $data -> tempat_meninggal }}</td>
              <td>
                <a href="{{ route('datakematian.show', $data->id) }}" class="btn btn-primary">
                  Detail
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Tanggal Melapor</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Tanggal Meninggal</th>
            <th>Tempat Meninggal</th>
            <th></th>
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

  <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>

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

      $('.select2').select2();
    });
  </script>
@endsection
