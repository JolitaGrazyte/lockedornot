@section('note')
    @if(!empty($msg))
        <div class="col-lg-12">
            <div class="note note-add box-shadow center">
                {{ $msg }}
                <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    @endif
@stop

@section('scripts')
    @parent
    <script>
        $(function() {
            var delay = 10000; //1 second
            setTimeout(function () {
                $('.note').slideUp(400);
            }, delay);
        });
    </script>
@endsection