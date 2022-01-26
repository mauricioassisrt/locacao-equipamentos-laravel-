@extends('layouts.auth')

<!-- Main Content -->
@section('content')
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- /.login-box -->
<div class="login-box">

    <div class="login-box-body">

        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">

            {{ csrf_field() }}
        <!--          <img src="{{url("/resources/assets/img/icon_avatar.png")}}" alt="" class="img_login"/>-->


            <div class="login-logo">
                <b>SIS</b>GEL</a>
                <h5>Sistema de Gestão de Locação de Equipamentos</h5>
            </div>

            <hr/>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">


                    <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Cadastrado') }}</label>


                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <hr/>



                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        {{ __('Recuperar E-mail') }}
                    </button>

                </div>
                <hr/>


                <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->


            </div>
        </form>
    </div>



    @endsection
