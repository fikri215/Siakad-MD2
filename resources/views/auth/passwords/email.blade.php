@extends('layouts.app')
@section('content')
{{-- <div class="card-body login-card-body">
  <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

  <form action="{{ route('cek-email') }}" method="post">
    @csrf
    <div class="input-group mb-3">
      <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" autofocus>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
      @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="row mb-3">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
      </div>
      <!-- /.col -->
    </div>
    
    <div class="row">
      <div class="col-6">
        <a href="{{ route('login') }}" class="text-center btn-block btn btn-light text-blue">Login Saja</a>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <a href="{{ route('register') }}" class="text-center btn-block btn btn-light text-blue">Buat Akun</a>
      </div>
      <!-- /.col -->
    </div>
  </form>
</div> --}}

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Lupa Password</h4></div>

              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form action="{{ route('cek-email') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" tabindex="1" required autofocus>
                  </div>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Lupa Password
                    </button>
                  </div>
                  <div class="form-group">
                    <a href="{{ route('login') }}" class="text-center btn btn-light btn-lg btn-block">Login</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy;
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
