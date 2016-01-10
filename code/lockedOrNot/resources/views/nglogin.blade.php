@extends('layouts.master')


@section('content')

    <div class="container" ng-app="myApp">
    <div class="content-main" >

        <style>

            .fa-times-circle-o{
                visibility: hidden;
                color: #fb5542;
            }
            .fa-check-circle-o{
                visibility: hidden;
                color: seagreen;
            }
            input.ng-invalid.ng-dirty {
                border: 1px solid lightpink;
            }
            input.ng-valid.ng-dirty {
                border: 1px solid seagreen;
            }
            input.ng-invalid.ng-dirty ~ .fa-times-circle-o, input.ng-valid.ng-dirty ~ .fa-check-circle-o{
                visibility: visible;

            }

            .icon {
                position: relative;
                color: #aaa;
                font-size: 16px;
            }

            .icon input {
                /*width: 250px;*/
                /*height: 32px;*/
                background: #fcfcfc;
                /*border: 1px solid #aaa;*/
                /*border-radius: 5px;*/
                /*box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;*/
            }

            .icon [class^='fa'] {
                position: absolute;
                font-size: 20px;
                top: 10px;
                right: 10px;
            }

            /*input.ng-dirty{*/
                /*background: #ffe1e3;*/
            /*}*/

        </style>

        <div class="col-lg-6 col-sm-12 col-lg-offset-3">
            <h1>NG Login</h1>
            <form name="loginForm" ng-submit="doLogin(loginForm)" ng-controller="userController" novalidate>

                <div class="form-group">
                    <label for="email">Your email</label>

                    <div class="icon">
                        <input type="email" data-toggle="tooltip" title="Your email" class="form-control" name="email" ng-model="email" required placeholder="your email"/>
                        <span class="fa fa-check-circle-o"></span>
                        <span class="fa fa-times-circle-o"></span>

                        <span style="color:red" ng-show="email.$dirty && email.$invalid"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="icon">
                        {{--<label for="password">Your password</label>--}}
                        <input type="password" class="form-control" name="password" ng-model="password" required>
                        <span class="fa fa-check-circle-o"></span>
                        <span class="fa fa-times-circle-o"></span>
                    </div>

                </div>

                {{--<div class="form-group">--}}
                    {{--<div class="icon">--}}
                        {{--<label for="password-repeat">Re-type your password</label>--}}
                        {{--<input--}}
                                {{--placeholder="re-type your password"--}}
                                {{--type="password" class="form-control"--}}
                                {{--name="confirmPassword"--}}
                                {{--match-password="password"--}}
                                {{--ng-model="confirm"--}}
                                {{--required--}}
                        {{-->--}}
                        {{--<span class="fa fa-check-circle-o"></span>--}}
                        {{--<span class="fa fa-times-circle-o"></span>--}}

                    {{--</div>--}}
                {{--</div>--}}

                {{--<input type="email" name="email" ng-model="email" required placeholder="Enter your email" class="form-control">--}}
                {{--<input type="password" name="password" ng-model="password" required class="form-control">--}}
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@stop


@section('scripts')
    @parent
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular-route.min.js"></script>
    <script> var baseUrl = "{{ url('/') }}/";</script>
    <script src="/js/app.js"></script>


    <script src="{{ url('js/defiantjs/defiant.js') }}"></script>

@stop