@extends('layouts.app')
@section('content')


{{-- <div class="card-body login-card-body">
  <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

  <form action="{{ route('reset.password.update', $user->id) }}" method="post">
    @csrf
    @method('patch') --}}

    {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
    
    {{-- <div class="input-group mb-3">
      <input type="email" class="form-control" value="{{ $user->email }}" disabled>
      <div class="input-group-append" style="background-color: #E9ECEF">
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
    <div class="input-group mb-3">
      <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" autofocus>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-group mb-3">
      <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="row mb-2">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <div class="row">
    <div class="col-6">
      <a href="{{ route('login') }}" class="text-center btn btn-light text-blue">Login Saja</a>
    </div>
  </div>
</div> --}}


  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form action="{{ route('reset.password.update', $user->id) }}" method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" tabindex="1" disabled>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" autocomplete="new-password" tabindex="2" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="confirm-password" autocomplete="new-password" tabindex="2" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                  <a href="{{ route('login') }}" class="text-small text-decoration-none text-center">
                    Kembali ke login
                  </a>
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
