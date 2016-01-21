@if(!empty($percent_false) && !empty($percent_true))

    <div class="progress">
        <div title="{{$percent_false}}%" class="progress-bar progress-bar-danger" role="progressbar" style="width:{{$percent_false}}%;">
            open when checked
        </div>

        <div title="{{$percent_true}}%" class="progress-bar progress-bar-success" role="progressbar" style="width:{{$percent_true}}%;">
            locked when cheched
        </div>
    </div>
    <div class="percents bottom-padding">

        <div class="pull-left percent">
            <p> {{$percent_false}}% </p>
        </div>

        <div class="pull-right percent">
            <p> {{$percent_true}}% </p>
        </div>
    </div>

@endif