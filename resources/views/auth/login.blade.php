@extends('auth.base')

@section('title', 'Masuk')

@section('base')
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">
      Gunakan NIP anda untuk masuk sistem
    </p>

    @if (session('status'))
      <div class="alert alert-warning" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <form action="{{ route('login.store') }}" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="NIP" name="nip" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" value="qweqweqwe" name="password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
              Ingat Saya
            </label>
          </div>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
      </div>
    </form>

    <p class="mb-1">
      <a href="{{ route('forget.password') }}">Saya Lupa Password</a>
    </p>
    <p class="mb-0">
      <a href="{{ route('register') }}" class="text-center">NIP belum terdaftar?</a>
    </p>
  </div>
</div>
@endsection
