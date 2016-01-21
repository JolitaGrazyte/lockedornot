<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/my-styles.css') }}">
    <link rel="stylesheet" href="{{ url('css/dash-style.css') }}">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <title> Locked Or Not | @yield('title') </title>
</head>
<body>

<div class="">
    @yield('note')
</div>

<div id="wrapper">
    <nav>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            </button>
{{--            <button class="menu-button {{ Request::is("how-i'm-doing")?'dark':'' }}" id="open-button">Open Menu</button>--}}
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logo" src="{{ Request::is("how-i'm-doing")? url('/img/logo-1-dark-2.png'):url('/img/locked-logo-2.png') }}" width="150" alt="Logo Locked Or Not"/>
                {{--Locked Or Not--}}
            </a>

        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="logout">
                <a href="{{ route('logout') }}"> Logout</a>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        @include('partials.sidebar')

    </nav>

    <div id="page-wrapper">

        @yield('content')

    </div>

</div>

<footer style="position: relative; bottom: 0; left: 1rem">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <div class="">
                    <div class="">
                        Locked Or Not | 2016
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- /#wrapper -->

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
@show

</body>
</html>