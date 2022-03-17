@extends('layouts.app')

@section('content')
<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" style="background-color: white;border-radius:0.25em;padding-left:0">
        <img src="{{asset('assets/img/nen1.jpg')}}" alt="" style="width: 380px;height:408.23px;border-radius:0.25em">
        </div>
        <div class="col-md-8" style="padding:0">
            <div class="card" >
            <div class="card-header">
                   
                    <img src="{{asset('assets/img/ominext1.png')}}" alt=""style="width:200px"> 
                </div>

                <div class="card-body">
                    <form method="POST" id="myform" action="{{ route('login') }}" >
                        @csrf
                        
                        <div class="form-group row" >
                        
                            
                          

                            <div class="col-md-12" >  
                                <div class="login"> 
                                     <!-- <i class="fa fa-users" aria-hidden="true"s></i> -->
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Tên đăng nhập">
                                   
                                    
                                </div>
                                
                                <div class="login1">
                                   <!-- <i class="fa fa-key" aria-hidden="true"></i> -->
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu"> <br/>
                                    <!-- <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction()"></i> -->
                               </div>
                              

                               
                               
                            </div>
                        </div>
                        

                        

                       
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color:darkblue">
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
                                    <a class="btn btn-link offset-md-12" href="{{ route('password.request') }}" style="color:darkblue">
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
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


  // just for the demos, avoids form submit
  
  $("#myform").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6,
        maxlength:10,
      }
    },
    messages: {
      email: {
        required: "Chưa nhập userID",
        email: "Nhập sai email",
      },
      password: {
        required: "Chưa nhập password",
        minlength: "Nhập sai password",
        maxlength:"Nhập sai password",
      }
    }
  });


</script>
@endsection
