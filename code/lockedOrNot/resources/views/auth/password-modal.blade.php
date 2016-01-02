<!-- Modal -->
<div class="modal fade" id="passwordModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Password reset</h2>
            </div>
            <div class="modal-body">

                @include('auth.partials.password-form')

                {!! Form::close() !!}

            </div>

        </div>

    </div>


</div>
