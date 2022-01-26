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

          <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">

            {{ csrf_field() }}
        <!--          <img src="{{url("/resources/assets/img/icon_avatar.png")}}" alt="" class="img_login"/>-->


            <div class="login-logo">
                <b>SIS</b>GEL</a>
                <h5>Sistema de Gestão de Locação de Equipamentos</h5>
            </div>

            <hr/>

            <div class="card-header"><h3 style="text-align:center">{{ __('Reset Password') }}</h3></div>



                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">


                        <div class="col-md-12">
                          <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">


                        <div class="col-md-12">
                            <label for="password" >{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">


                        <div class="col-md-12">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                      <hr/>

                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                {{ __('Reset Password') }}
                            </button>

                    </div>
                </form>


            </div>

        </form>
    </div>



    @endsection
