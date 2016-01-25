@if(!empty($percent_false) && !empty($percent_true))

    <div class="progress">
        <div data-toggle="tooltip" title="{{$percent_true}}% your car was open when you've checked" class="progress-bar progress-bar-danger" role="progressbar" style="width:{{$percent_true}}%;">
            open when checked
        </div>

        <div data-toggle="tooltip" title="{{$percent_false}}% your car was open when you've checked" class="progress-bar progress-bar-success" role="progressbar" style="width:{{$percent_false}}%;">
            locked when cheched
        </div>
    </div>
    <div class="percents bottom-padding">

        <div class="pull-left percent">
            <p> {{$percent_true}}% </p>
        </div>

        <div class="pull-right percent">
            <p> {{$percent_false}}% </p>
        </div>
    </div>

@endif