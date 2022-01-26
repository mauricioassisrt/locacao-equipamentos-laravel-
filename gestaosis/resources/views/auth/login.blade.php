@extends('layouts.auth')


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
        <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}" class="">
            {{ csrf_field() }}
        <!--          <img src="{{url("/resources/assets/img/icon_avatar.png")}}" alt="" class="img_login"/>-->


            <div class="login-logo">
                <b>SIS</b>GEL</a>
                <h5>Sistema de Gestão de Locação de Equipamentos</h5>
            </div>
            <hr/>
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="icon-addon addon-lg">

                    <input type="email" id="email" class="form-control" placeholder="Email" 
                           required="" autofocus="" 
                           name="email" value="{{ old('email') }}">

                    <hr/>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="icon-addon addon-lg">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Senha" required="">

                    </div>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <hr/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>

                <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
        </form>

    </div> 
</div> 

<!-- /container -->

<!-- jQuery 3 -->
<!--<script src="../../bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<!--<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!-- iCheck -->
<!--<script src="../../plugins/iCheck/icheck.min.js"></script>-->
<!--<script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    });
});
</script>-->

@endsection
