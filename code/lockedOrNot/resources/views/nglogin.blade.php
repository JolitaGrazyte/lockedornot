@extends('layouts.master')


@section('content')

    <div class="container" ng-app="myApp">
    <div class="content-main" >

        <div class="col-lg-6 col-sm-12 col-lg-offset-3">
            <h1>NG Login</h1>
            <form name="loginForm" ng-submit="doLogin(loginForm)" ng-controller="userController">
                {{--<input type="hidden" name="csrf-token" value="{{ csrf_token() }}">--}}
                <input type="email" name="email" ng-model="email" required placeholder="Enter your email" class="form-control">
                <input type="password" name="password" ng-model="password" required class="form-control">
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@stop


@section('extra-scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular-route.min.js"></script>
    <script> var baseUrl = "{{ url('/') }}/";</script>
    <script src="/js/app.js"></script>


    <script src="{{ url('js/defiantjs/defiant.js') }}"></script>

@stop