<div class="panel panel-default">
    <div class="panel-heading">
        {{--<i class="fa fa-bar-chart-o fa-fw"></i>--}}
        <h4>The busiest day ever:</h4>
    </div>
    <div class="panel-body">
        <div class="col-lg-6">
            To me:

            <div style="font-size: 3.5rem">
                {{ $userBusiestDay->format('D') }},
                {{ $userBusiestDay->format('d') }}
                {{ $userBusiestDay->format('M') }}
            </div>
            <div style="margin-right: 16px; font-size: 2rem;" class="pull-right">
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

            <div style="font-size: 3.5rem">
                {{ $busiestDay->format('D') }},
                {{ $busiestDay->format('d') }}
                {{ $busiestDay->format('M') }}
            </div>
            <div style="margin-right: 6px; font-size: 2rem;" class="pull-right">
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