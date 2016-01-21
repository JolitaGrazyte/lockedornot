<div class="panel panel-default">
    <div class="panel-heading">
        {{--<i class="fa fa-bar-chart-o fa-fw"></i>--}}
        <h4>The busiest month ever:</h4>
    </div>
    <div class="panel-body">
        <div class="col-lg-6">
            To me:

            <div style="font-size: 3.5rem">
                {{ $userBusiestMonth }}

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
                {{ $busiestMonth }}

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