@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <img src="{{asset('assets/img/ominext1.png')}}" alt=""style="width:200px"> 
               </div>

                <div class="card-body">
                    <form method="POST" id="myform" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật khẩu mới">

                                <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Nhập lại mật khẩu mới">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
    .error{
        margin: 0;
    }
</style>
<script>
// just for the demos, avoids form submit

$( "#myform" ).validate({
  rules: {
    password: {
      required: true,
      minlength: 6,
      maxlength:10,
    },
    password_confirmation: {
      required: true,
      equalTo: "#password",    
    }
  },
  messages: {
    password: {
        required:"Nhập mật khẩu mới",
        minlength:"Nhập sai password",
        maxlength:"Nhập sai password",
    },
    password_confirmation: {
        required:"Nhập lại mật khẩu mới",
        equalTo: "Mật khẩu không giống nhau!",
    }
  }
});
</script>
@endsection