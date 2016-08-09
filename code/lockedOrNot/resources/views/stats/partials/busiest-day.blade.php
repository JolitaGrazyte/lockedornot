<div class="panel panel-default panel-busiest-day">
    <div class="panel-heading">
        {{--<i class="fa fa-bar-chart-o fa-fw"></i>--}}
        <h4>The busiest day ever:</h4>
    </div>
    <div class="panel-body">
        <div class="col-md-12 col-lg-6">
            <div class="row">
                <div class="pull-right h5-f-size">
                    To me:
                </div>
            </div>
            @if(!empty($userBusiestDay))
                <div class="row">
            <div class="busiest-f-size pull-right">

                    {{ $userBusiestDay->format('D') }},
                    {{ $userBusiestDay->format('d') }}
                    {{ $userBusiestDay->format('M') }}

            </div>
            <div class="pull-right busiest-day-year">

                    {{ $userBusiestDay->format('Y') }}

            </div>
                </div>
            @endif

            {{--<div class="col-lg-6">--}}
            {{--12 locked--}}
            {{--</div>--}}
            {{--<div class="col-lg-6">--}}
            {{--16 open--}}
            {{--</div>--}}

        </div>
        <div class="col-lg-6 col-md-12">
            <div class="row">
            <div class="pull-right h5-f-size">
                Locked Or Not:
            </div>
            </div>

            <div class="row">
            <div class="busiest-f-size pull-right">
                {{ $busiestDay->format('D') }},
                {{ $busiestDay->format('d') }}
                {{ $busiestDay->format('M') }}
            </div>
            <div class="pull-right busiest-day-year">
                {{ $busiestDay->format('Y') }}
            </div>
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