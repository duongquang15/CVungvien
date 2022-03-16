@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">
                    <!-- <div class="logo"><img src="{{asset('images/logo3.jpg')}}"></div> -->
                    <label class="form-check-label" style="letter-spacing: 3px;">{{ __('OMINEXT') }}</label>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-group row" >
                        
                            
                          

                            <div class="col-md-12" >  
                                <div class="login"> 
                                     <!-- <i class="fa fa-users" aria-hidden="true"s></i> -->
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Tên đăng nhập">
                                   
                                    @error('email')
                                        <p class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="login1">
                                   <!-- <i class="fa fa-key" aria-hidden="true"></i> -->
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mật khẩu"> 
                                    <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction()"></i>

                                
                               </div>

                               @error('password')
                                    <p class="invalid-feedback" role="alert" style="text-align: center;">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                               
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            


                        </div>

                       
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color:white">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        

                        <div class="form-group row mb-0">
                            <div class="submit_login col-md-12">
                                <button type="submit" onclick="save()" class="btn btn-primary_1">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link offset-md-12" href="{{ route('password.request') }}" style="color:white">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>