<!DOCTYPE html>
<html>

@section('head')
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Locked Or Not">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta name="author" content="">
    {{--<link rel="icon" href="../../favicon.ico">--}}

    <title> Locked Or Not | @yield('title') </title>

    {{--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">--}}

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/my-styles.css') }}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}

</head>
@show

<body>

    @include('errors.errors')

    @include('partials.nav')

    @yield('content')

    @include('auth.login-modal')

    @include('auth.register-modal')

    @include('auth.password-modal')

    @if(Auth::check())

        @include('profile.edit-modal', ['user'=> Auth::user()])

    @endif

    @include('layouts.footer')

    @section('scripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{{ url('js/alert-dismiss.js') }}"></script>

    {{--Todo: move select2 script to specific page where it is used--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>--}}

@show

{{--@yield('extra-scripts')--}}

</body>
</html>
