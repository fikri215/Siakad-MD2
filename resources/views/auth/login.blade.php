@extends('layouts.app')
@section('content')

  <div id="app">
    <section class="section">
      <div class="col-xl-8 col-lg-11 mx-auto login-container" style="margin-top: 7%">
        <div class="login-brand">
          <!-- Logo Sekolah -->
        </div>

        <div class="card card-primary">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-7 col-md-6 img-box">
                <img src="{{ asset('img/login.png') }}" style="max-width: 100%">
              </div>
              <div class="col-lg-5 col-md-6 no-padding mt-5">
                {{-- <img class="d-block mx-auto" src="{{ asset('img/icon1.png') }}" style="width: 100px"> --}}
                <h3><center>SIAKAD LOGIN</center></h3>
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" tabindex="1" required autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" tabindex="2" autocomplete="current-password" required>
                      <div class="float-right mt-2">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-small">
                          Lupa Password?
                        </a>
                        @endif
                      </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <footer class="text-secondary">
          <marquee>
              <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <span class="bullet"></span> <a href="#" class="text-decoration-none">SMK Muhammadiyah 2 Jakarta</a>. </strong>
          </marquee>
        </footer>
        {{-- <div class="simple-footer">
          Copyright &copy;
        </div> --}}
      </div>
    </section>
  </div>

@endsection
