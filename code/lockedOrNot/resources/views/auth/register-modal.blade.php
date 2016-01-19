<!-- Modal -->
<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Register</h2>

                @include('errors.errors')
            </div>
            <div class="modal-body">

                {!!Form::open(['route' =>  ['post-register'], 'id' => 'register-form'])  !!}

                @include('auth.partials.step-register')

                {{--@include('auth.partials.register-form')--}}

                {{--@include('auth.partials.social-login')--}}

                {!! Form::close() !!}


                <script>
                    var form = $("#register-form").show();

                    form.steps({
                        headerTag: "h3",
                        bodyTag: "fieldset",
                        transitionEffect: "slideLeft",
                        onStepChanging: function (event, currentIndex, newIndex)
                        {
                            // Always allow previous action even if the current form is not valid!
                            if (currentIndex > newIndex)
                            {
                                return true;
                            }


                            // Needed in some cases if the user went back (clean up)
                            if (currentIndex < newIndex)
                            {
                                // To remove error styles
                                form.find(".body:eq(" + newIndex + ") label.error").remove();
                                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                            }
                            form.validate().settings.ignore = ":disabled,:hidden";
                            return form.valid();
                        },
                        onStepChanged: function (event, currentIndex, priorIndex)
                        {

                        },
                        onFinishing: function (event, currentIndex)
                        {
                            form.validate().settings.ignore = ":disabled";
                            return form.valid();
                        },
                        onFinished: function (event, currentIndex)
                        {
                            form.submit();
                        }
                    }).validate({
                        errorPlacement: function(error, element) {

                            element.parent('.input-group').after(error);
                        },
                        rules: {
                            password:{
                                minlength: 6
                            },
//                            device_nr:{
//                                minlength: 7,
//
//                            }


                        },
                        messages:{
                            device_nr: {
                                required: "We need your locked or not device serial number for further interaction. Please fill in here.",
//                                minlength: jQuery.validator.format("At least {0} characters required!")
                            }
                        }
                    });
                </script>

            </div>

        </div>

    </div>


</div>

@if (count($errors) > 0)
@section('scripts')
    @parent

        <script>
            $('#registerModal').modal('show');
        </script>
@stop

@endif