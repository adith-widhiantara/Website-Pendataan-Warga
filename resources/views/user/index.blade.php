@extends('base.base')

@section('title', 'Daftar Pengguna')

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('breadcrumb')
  {{ Breadcrumbs::render('user.index') }}
@endsection

@section('base')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Pengguna</h3>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $usr)
          <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $usr -> nip }}</td>
            <td>{{ $usr -> name }}</td>
            <td>
              @if ( empty($usr->nip_verified_at) )
                <span class="badge badge-danger">
                  Belum Dikonfirmasi
                </span>
              @else
                <span class="badge badge-success">
                  Dikonfirmasi pada {{ \Carbon\Carbon::parse($usr->nip_verified_at)->isoFormat('D MMMM YYYY HH:mm') }}
                </span>
              @endif
            </td>
            <td>
              <div class="row">
                @if ( $usr -> resetpassword != 1 )
                <div class="col-6">
                @else
                <div class="col-12">
                @endif
                  @if ( empty($usr->nip_verified_at) )
                    <a href="#" class="btn btn-success btn-block" onclick="event.preventDefault(); document.getElementById('konfirmasi-{{ $usr->nip }}-form').submit();">
                      Konfirmasi
                    </a>
                    <form action="{{ route('user.konfirmasi', $usr->nip) }}" method="post" id="konfirmasi-{{ $usr->nip }}-form" style="display: none">
                      @csrf
                      @method('patch')
                    </form>
                  @else
                    <a href="#" class="btn btn-warning btn-block" onclick="event.preventDefault(); document.getElementById('batal-konfirmasi-{{ $usr->nip }}-form').submit();">
                      Batal Konfirmasi
                    </a>
                    <form action="{{ route('user.batalKonfirmasi', $usr->nip) }}" method="post" id="batal-konfirmasi-{{ $usr->nip }}-form" style="display: none">
                      @csrf
                      @method('patch')
                    </form>
                  @endif
                </div>
                @if ( $usr -> resetpassword != 1 )
                  <div class="col-6">
                    <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-default-{{ $usr->nip }}">
                      Lupa Password
                    </button>

                    <div class="modal fade" id="modal-default-{{ $usr->nip }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Reset Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>
                              NIP : {{ $usr -> nip }}
                            </p>
                            <p>
                              Nama : {{ $usr -> name }}
                            </p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                              Close
                            </button>
                            <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('lupa-password-{{ $usr->nip }}-form').submit();">
                              Reset Password
                            </a>

                            <form action="{{ route('send.password', $usr->nip) }}" method="post" id="lupa-password-{{ $usr->nip }}-form" style="display: none">
                              @csrf
                              @method('patch')
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Aksi</th>
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
