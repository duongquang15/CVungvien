@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="{{asset('assets/img/ominext1.png')}}" alt="" style="height:50px;width:155px">
                </div>

                <button type="submit" onclick="goBack()" class="btn btn-primary">
                    {{ __('Back') }}
                </button>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <!-- {{ session('status') }} -->
                        
                        @if (session('status') == 'We have emailed your password reset link!')
                            Đã gửi mail reset password

                        @else {
                            echo (session('status'));
                        } 
                        @endif
                    </div>
                    @endif

                    <form method="POST" id="myform" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="forgot" style="padding-top: 50px;">
                                <input id="email" maxlength="255" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="forgotpass1" style="display:flex">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
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
        margin-left: 50px;
    }
</style>
<script>
    $("#myform").validate({
        rules: {
            email: {
                required: true,
                email: true,


            }
        },
        messages: {
            email: {
                required: "Chưa nhập Email",
                email: "Nhập sai Email",


            }
        }
    });


    function goBack() {
        window.history.back();
    }
</script>
@endsection