@section('note')
    @if(!empty($msg))
        <div class="col-lg-12">
            <div class="note note-add box-shadow center">
                {{ $msg }}<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    @endif
@stop