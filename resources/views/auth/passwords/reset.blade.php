@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="{{asset('assets/img/ominext1.png')}}" alt="" style="width:200px">
                </div>

                <div class="card-body">
                    <form method="POST" id="myform" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- <div class="form-group row">
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password" type="password" maxlength="10" onKeyUp="checkPasswordStrength();" class="form-control demoInputBox @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New pass">
                                <div id="password-strength-status"></div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password-confirm" type="password" maxlength="10" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm pass">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .error {
        margin: 0;
    }

    .demoInputBox {
        padding: 7px;
        /* border: #F0F0F0 1px solid; */
        /* border-radius: 4px; */
    }

    #password-strength-status {
        padding: 5px 0px;
        /* color: #FFFFFF; */
        border-radius: 4px;
        margin-top: 5px;
    }

    .medium-password {
        color: #b7d60a;
        /* border: #BBB418 1px solid; */
    }

    .weak-password {
        color: red;
        /* border: #AA4502 1px solid; */
    }

    .strong-password {
        color: #12CC1A;
        /* border: #0FA015 1px solid; */
    }
</style>
<script>
    $("#myform").validate({
        rules: {
            password: {
                required: true,
                minlength: 6,
                maxlength: 10,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            }
        },
        messages: {
            password: {
                required: "Chưa nhập New password",
                minlength: "Nhập sai new password",
                maxlength: "Nhập sai new password",
            },
            password_confirmation: {
                required: "Chưa nhập Confirm password",
                equalTo: "Nhập sai confirm password",
            }

        }
    });
</script>
<script>
    function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        if ($('#password').val().length < 6) {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('weak-password');
            $('#password-strength-status').html("Password yếu (nên có ít nhất 6 ký tự))");
        } else {
            if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('strong-password');
                $('#password-strength-status').html("Password mạnh");
            } else {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('medium-password');
                $('#password-strength-status').html("Password Trung bình (nên bao gồm bảng chữ cái, số và các ký tự đặc biệt.))");
            }
        }
    }
</script>
@endsection