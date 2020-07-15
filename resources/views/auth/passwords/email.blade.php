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
            <div class="card">
                <div class="card-header text-center">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>

                        </div>
                    </form>
                </div>
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
