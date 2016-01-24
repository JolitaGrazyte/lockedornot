<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Locked Or Not">
    <meta name="author" content="Jolita Grazyte">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">

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

    @include('partials.nav.dash-nav')

    <div id="page-wrapper">

        @yield('content')

    </div>

</div><!-- /#wrapper -->

<footer>
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


@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
@show

</body>
</html>