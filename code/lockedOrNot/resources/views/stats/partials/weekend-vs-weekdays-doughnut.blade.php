<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            {{--<i class="fa fa-bar-chart-o fa-fw"></i>--}}
            <h4>Weekdays vs weekend</h4>
            <div class="pull-right me-vs-others">
                <h4>me vs others</h4>
            </div>
        </div>
        <div class="panel-body">
            <input id="user_id" type="hidden" value="{{ Auth::user()->id }}">

            <div class="col-lg-6 col-sm-6">
                <div>
                        <h4 class="h4-underline">Me</h4>
                </div>
                <div>
                    <i id="u-weekend-icon" class="fa fa-square"></i> weekend rate: <span id="u-weekend"></span>
                </div>
                <div>
                    <i class="fa fa-square icon-green"></i> weekdays rate: <span id="u-weekdays"></span>
                </div>
                <canvas id="doughnut-chart"></canvas>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div>
                    <h4>Others</h4>
                </div>
                <div>
                    <i id="o-weekend-icon" class="fa fa-square"></i>  weekend rate: <span id="o-weekend"></span>
                </div>
                <div>
                    <i class="fa fa-square icon-green"></i> weekdays rate: <span id="o-weekdays"></span>
                </div>
                <canvas id="all-doughnut-chart"></canvas>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
</div>
