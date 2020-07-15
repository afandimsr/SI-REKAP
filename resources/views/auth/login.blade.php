@extends('layouts.app')
@section('font')

     <!-- Font Awesome -->
<link rel="stylesheet" href="{{asset("adminLte3/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('javascript_head')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
@section('css')

     <!-- icheck bootstrap -->
<link rel="stylesheet" href="{{asset("adminLte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- Theme style -->
<link rel="stylesheet" href="{{asset("adminLte3/dist/css/adminlte.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="{{asset("adminLte3/dist/css/style.css")}}">
@endsection
@section('content')
<div class="bg_login login-page ">
    <div class="logo-login">
      <center>
      <img src="{{asset("img/semarangkota.png")}}" class="img-size-64">
        <h1 class="reset text-bold">SI REKAP</h1>
        <small>Sistem Pendataan Informasi Publik Dinas Pendidikan Kota Semarang</small><br>
        <br>

        <div class="login-box hold-transition">

          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Login Sistem</p>

              <form method="POST" action="{{ route('login') }}">
                  @csrf
                <div class="input-group mb-3">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
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
                <div class="input-group mb-3">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">
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
                <div class="form-group row">
                    <div class="col-md-6 ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">

                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>



                </div>
                <div class="form-group row justify-content-center">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link " href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                </div>


              </form>




            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
      </center>
    </div>

  </div>


@endsection
@section('javascript_footer')
     <!-- jQuery -->
<script src="{{asset("adminLte3/plugins/jquery/jquery.min.js")}}"></script>
  <!-- Bootstrap 4 -->
<script src="{{asset("adminLte3/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <!-- AdminLTE App -->
<script src="{{asset("adminLte3/dist/js/adminlte.min.js")}}"></script>
@endsection
