<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/dash-style.css') }}">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <title>HTML Dashboard </title>
</head>
<body>
<div class="">
    @yield('note')
</div>

<div id="wrapper">
    <nav>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://lockdrnot.local.com">Locked Or Not</a>
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

<footer>
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
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

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


</body>
</html>