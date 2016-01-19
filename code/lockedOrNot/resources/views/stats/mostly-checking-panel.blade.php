@foreach($days as $day)

    <div class="stats-table-responsive">
        <table class="table table-bordered table-hover table-striped lon-table">
            <thead>
            <tr>
                <td colspan="2">
                    <div title="total times checked">
                        {{  $total_daily[$day] }}
                    </div>
                    <div class="s-font">times checked</div>
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                           <span title="unlocked">
                                100
                           </span>
                </td>

                <td>
                           <span title="locked">
                                170
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
