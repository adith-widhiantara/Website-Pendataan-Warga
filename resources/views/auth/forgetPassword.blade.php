@extends('auth.base')

@section('title', 'Lupa Password')

@section('base')
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">
      Anda lupa password? Masukkan NIP anda, dan password baru akan dikonfirmasi melalui admin
    </p>

    @if (session('status'))
      <div class="alert alert-warning" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <form action="{{ route('forget.password.store') }}" method="post">
      @csrf
      @method('patch')
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="NIP" name="nip" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">
            Kirim Password Baru
          </button>
        </div>
      </div>
    </form>

    <p class="my-2">
      <a href="{{ route('register') }}" class="text-center">NIP belum terdaftar?</a>
    </p>
  </div>
</div>
@endsection
