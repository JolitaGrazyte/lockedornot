<div class="panel panel-default">
    <div class="panel-heading mostly-checking">
        <h4>
            Mostly checking
        </h4>
        {{--Mostly checking: in the week days--}}
        <div class="pull-right">
            <ul class="inline-list">
                <li>see it:</li>
                <li><a href="{{ url("how-i'm-doing") }}" class="active-sort">total</a> | </li>
                <li><a href="{{ route('mostly-checked-filter', ['week'])  }}">per week</a> | </li>
                <li><a href="{{ route('mostly-checked-filter', ['month']) }}">per month</a> | </li>
                <li><a href="{{ route('mostly-checked-filter', ['year']) }}">per year</a></li>
            </ul>
        </div>
    </div>
    <!-- /.panel-heading -->

    <div class="panel-body mstl-checking-panel">
        <div class="row mstl-checking-panel-padding">
            <div class="col-lg-12 m-left">
                @foreach($days as $day)

                    <div class="stats-table-responsive">
                        @if($total_daily[$day]['unlocked'] > $total_daily[$day]['locked'])

                            <table class="table table-bordered table-hover table-striped lon-table box-shadow red-border">

                                @elseif($total_daily[$day]['unlocked'] < $total_daily[$day]['locked'] || $total_daily[$day]['unlocked'] == $total_daily[$day]['locked'] && $total_daily[$day]['total'] !=0)

                                    <table class="table table-bordered table-hover table-striped lon-table box-shadow green-border">

                                        @else
                                            <table class="table table-bordered table-hover table-striped lon-table box-shadow white-border">

                                                @endif

                                                <thead>
                                                <tr>
                                                    <td colspan="2">
                                                        <div title="total times checked">
                                                            {{  $total_daily[$day]['total'] }}
                                                        </div>
                                                        <div class="s-font">times checked</div>
                                                    </td>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr>
                                                    <td title="unlocked"  class="{{ $total_daily[$day]['unlocked'] == 0 ? '': 'unlocked-td'}}">
                                                        <span>
                                                            {{  $total_daily[$day]['unlocked'] }}
                                                        </span>

                                                    </td>

                                                    <td title="locked" class="{{ $total_daily[$day]['locked'] == 0 ? '': 'locked-td'}}">
                                                        <span>
                                                            {{  $total_daily[$day]['locked'] }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        {{ strtoupper($day) }}
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                    </div>

                @endforeach

            </div>

        </div>

        @if(!is_null($filter))
            <div class="row mstl-checking-under-height">
                <div class="col-lg-12 center">
                    <div class="col-lg-2 pull-left">
                        <a href="{{ route('filter-interval-plus', [$filter, 'prev', $w_nr]) }}">
                            <i class="fa fa-angle-double-left"> </i><span> previous {{ $filter }}</span>
                        </a>
                    </div>
                    <div class="col-lg-2 pull-right next-link">
                        <a href="{{ route('filter-interval-minus', [$filter, 'fw', $w_nr]) }}">
                            <span>next {{ $filter }} </span> <i class="fa fa-angle-double-right"> </i>
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>

</div>
