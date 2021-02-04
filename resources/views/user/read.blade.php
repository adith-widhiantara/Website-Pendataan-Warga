@extends('base.base')

@section('title', 'Profil Anda')

@section('style')
  <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('breadcrumb')
  {{ Breadcrumbs::render('user.read', Auth::user()) }}
@endsection

@section('base')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Data Profil Anda</h3>
  </div>

  <form action="{{ route('user.update', Auth::user()->nip) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="card-body">
      <div class="form-group">
        <label>NIP</label>
        <input type="text" class="form-control" value="{{ Auth::user() -> nip }}" disabled>
      </div>

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" value="{{ Auth::user() -> name }}" name="name">
      </div>

      <div class="form-group">
        <label for="exampleInputFile">Foto Profil</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
            <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Unggah</span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>

      <div class="form-group">
        <label>Konfirmasi Password</label>
        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation">
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

@section('script')
  <script src="{{ asset('lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

  <script>
    $(function () {
      bsCustomFileInput.init();

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
