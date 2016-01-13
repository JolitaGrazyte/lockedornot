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

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />

    {{--=== *** REGISTER step form *** ===--}}
    <link rel="stylesheet" href="{{ url('css/jquery.steps/jquery.steps.css') }}">
{{--        <link rel="stylesheet" href="{{ url('css/jquery.steps/normalize.css') }}">--}}
    <link rel="stylesheet" href="{{ url('css/jquery.steps/main.css') }}">


    <script src="{{ url('js/jquery.js') }}"></script>
    <script src="{{ url('js/jquery.steps.min.js') }}"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">--}}

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    @if(!Request::is('/'))
    <link rel="stylesheet" href="{{ url('css/dashboard-app.css') }}">
    @endif
    <link rel="stylesheet" href="{{ url('css/my-styles.css') }}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}



</head>
@show

<body>

{{--    @include('errors.errors')--}}

    @include('partials.nav')

    @yield('content')


    {{--@include('auth.login-modal')--}}

    @include('auth.register-modal')

    {{--@include('auth.password-modal')--}}

    @include('partials.modal')

    @if(Auth::check())

        @include('profile.edit-modal', ['user'=> Auth::user(), 'no_device' => empty(Auth::user()->devices) && is_null(Auth::user()->devices)])

    @endif

    @include('layouts.footer')

    @section('scripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular-route.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{{ url('js/alert-dismiss.js') }}"></script>

    @if(Auth::check())
        <script src="{{ 'js/main.js' }}"></script>
        @endif
    <script src="{{ 'js/classie.js' }}"></script>

    <script src="{{ 'js/modal.js' }}"></script>

@show

</body>
</html>
