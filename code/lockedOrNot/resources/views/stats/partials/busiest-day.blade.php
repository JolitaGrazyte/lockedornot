<div class="panel panel-default">
    <div class="panel-heading">
        {{--<i class="fa fa-bar-chart-o fa-fw"></i>--}}
        <h4>The busiest day ever:</h4>
    </div>
    <div class="panel-body">
        <div class="col-lg-6">
            To me:

            <div class="busiest-f-size">
                {{ $userBusiestDay->format('D') }},
                {{ $userBusiestDay->format('d') }}
                {{ $userBusiestDay->format('M') }}
            </div>
            <div class="pull-right busiest-day-year">
                {{ $userBusiestDay->format('Y') }}
            </div>

            {{--<div class="col-lg-6">--}}
            {{--12 locked--}}
            {{--</div>--}}
            {{--<div class="col-lg-6">--}}
            {{--16 open--}}
            {{--</div>--}}

        </div>
        <div class="col-lg-6">
            "Locked Or Not":

            <div class="busiest-f-size">
                {{ $busiestDay->format('D') }},
                {{ $busiestDay->format('d') }}
                {{ $busiestDay->format('M') }}
            </div>
            <div class="pull-right busiest-day-year">
                {{ $busiestDay->format('Y') }}
            </div>

            {{--<div class="col-lg-6">--}}
            {{--12 locked--}}
            {{--</div>--}}
            {{--<div class="col-lg-6">--}}
            {{--16 open--}}
            {{--</div>--}}

        </div>
        {{--<a href="#" class="btn btn-default btn-block">View Details</a>--}}
    </div>
    <!-- /.panel-body -->
</div>