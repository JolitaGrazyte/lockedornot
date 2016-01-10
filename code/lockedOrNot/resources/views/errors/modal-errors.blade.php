@if (count($errors) > 0)
@section('scripts')
    @parent
    @if($sort == 'login')
    <script>
        $('#loginModal').modal('show');
        $('#registerModal').modal('hide');
    </script>
    @elseif($sort == 'register')

{{--        {{ dd($sort) }}--}}
    <script>
        $('#loginModal').modal('hide');
        $('#registerModal').modal('show');

    </script>

    @endif

@stop

@endif
