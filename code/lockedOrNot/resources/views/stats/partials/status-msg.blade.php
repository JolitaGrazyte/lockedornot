<div class="panel panel-{{ $support['color'] }} center border-alert panel-msg">
    <div class="panel-heading user-status">
        <div class="first-line">
            {{ $support['msg']['f-line'] }}
        </div>

        @foreach($support['msg']['m-body'] as $line)
            <div>
                {{ $line }}
            </div>
        @endforeach
        <hr>

        {{--Todo--}}
        <p>{{ $support['compare_msg'] }} </p>
    </div>

</div>