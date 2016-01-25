<div class="panel panel-default">
    <div class="panel-heading">
        {{--<i class="fa fa-bar-chart-o fa-fw"></i>--}}
        <h4>The busiest month ever:</h4>
    </div>
    <div class="panel-body">
        <div class="col-lg-6">
            <div class="pull-right h5-f-size">
                To me:
            </div>

            <div class="busiest-f-size pull-right">
                {{ $userBusiestMonth }}

            </div>
        </div>
        <div class="col-lg-6">
            <div class="pull-right h5-f-size">
                On "Locked Or Not" site:
            </div>

            <div class="busiest-f-size pull-right">
                {{ $busiestMonth }}

            </div>

        </div>

    </div>
    <!-- /.panel-body -->
</div>