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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus style="display: none">


                                
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password" type="password" maxlength="10" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New pass">
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
@endsection