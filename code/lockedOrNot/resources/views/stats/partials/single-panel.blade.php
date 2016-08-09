<div class="col-lg-3 col-sm-6 rates-panel">
    <div class="panel panel-{{ $panel['color'] }} {{ substr($panel['stats'], 0, 7) }}"
         data-toggle="tooltip"  title="{{ $panel['title'] }}">
                    <span class="tooltip">
                        {{ $panel['title'] }}
                    </span>
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="huge">{{ $panel['stats'] }}</div>
                    <hr>
                    <div>{{  $panel['name'] }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

