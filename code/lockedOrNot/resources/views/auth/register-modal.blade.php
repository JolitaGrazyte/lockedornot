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

                @include('auth.step-register')

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
                            // Allways allow previous action even if the current form is not valid!
                            if (currentIndex > newIndex)
                            {
                                return true;
                            }
                            // Forbid next action on "Warning" step if the user is to young
//                            if (newIndex === 3 && Number($("#age-2").val()) < 18)
//                            {
//                                return false;
//                            }

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

//                            if (currentIndex === 3)
//                            {
//
//                                form.steps("next");
//                            }
//
//                            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
//                            if (currentIndex === 2 && priorIndex === 3)
//                            {
//                                form.steps("previous");
//                            }
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
//                            confirm: {
//                                equalTo: "#password-2"
//                            },
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
            {{--<div class="modal-footer">--}}
            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{--</div>--}}
        </div>

    </div>


</div>

@if (count($errors) > 0)
@section('scripts')
    @parent

        <script>

            $('#loginModal').modal('hide');
            $('#registerModal').modal('show');
        </script>
@stop

@endif