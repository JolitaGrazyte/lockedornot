<!-- Modal -->
<div class="modal fade {{ count($errors) ? 'in' : '' }}" id="loginModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2 class="modal-title">Login</h2>
        </div>
        <div class="modal-body">

        @include('auth.partials.login-form')

        @include('auth.partials.social-login')

            {!! Form::close() !!}

        </div>
        {{--<div class="modal-footer">--}}
            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
        {{--</div>--}}
    </div>

</div>


</div>