@extends('auth.base')

@section('title', 'Daftar')

@section('base')
<div class="card">
  <div class="card-body register-card-body">
    <p class="login-box-msg">
      Daftar NIP baru
    </p>

    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-warning" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif

    <form action="{{ route('register.store') }}" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="NIP" name="nip" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Ulangi password" name="password_confirmation" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4 offset-8">
          <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </div>
      </div>
    </form>

    <a href="{{ route('login') }}" class="text-center">NIP saya sudah terdaftar</a>
  </div>
  <!-- /.form-box -->
</div>
@endsection
