@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">
                    <!-- <div class="logo"><img src="{{asset('images/logo3.jpg')}}"></div> -->
                    <label class="form-check-label">{{ __('Change Password') }}</label>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('changepassword') }}">
                        @csrf
                        
                        <div class="form-group row" >
                            <div class="col-md-12" >  
                            <div class="changepass"> 
                                    <input id="old-password" type="password" class="form-control @error('password')  @enderror" name="old_password" value="{{ old('password') }}"  placeholder="Mật khẩu cũ">
                                    <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction()"></i>
                                </div>
                                    @error('old_password')
                                        <p class="invalid-feedback" role="alert" style="margin-left:10%">
                                            <strong style="top:-20px">{{ $message }}</strong>
                                        </p>
                                    @enderror 
                               
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-12" >  
                                <div class="changepass"> 
                                     <!-- <i class="fa fa-users" aria-hidden="true"s></i> -->
                                    <input id="password" type="password" class="form-control @error('password')  @enderror" name="password" value="{{ old('password') }}"  placeholder="Mật khẩu mới" onkeyup="check()">
                                   <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction1()"></i>
                                   
                                </div>
                                    @error('password')
                                        <p class="invalid-feedback" role="alert" style="margin-left:10%">
                                            <strong style="top:-20px">{{ $message }}</strong>
                                        </p>
                                    @enderror
                                
                            </div>
                        </div>
                        <div class="form-group row" >
                            <div class="col-md-12" >  
                            
                                <div class="changepass">
                                   <!-- <i class="fa fa-key" aria-hidden="true"></i> -->
                                    <input id="confirm-password" type="password" class="form-control @error('password') @enderror" name="confirm_password" placeholder="Nhập lại mật khẩu" onkeyup="check()"> 
                                    <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction2()"></i>

                                
                               </div>

                                    @error('confirm_password')
                                        <p class="invalid-feedback" role="alert" style="margin-left:10%">
                                            <strong style="top:-20px">{{ $message }}</strong>
                                        </p>
                                    @enderror
                               
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="submit_login col-md-12">
                                <button type="submit" class="btn btn-primary_1" onclick="password()">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <script>
function myFunction() {
  var x = document.getElementById("old-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction1() {
  
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  
  var x = document.getElementById("confirm-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
//
function password() {
    var fpw = document.getElementById("password").value;
    var spw = document.getElementById("confirm-password").value;
    if (fpw==spw) {
        document.getElementById(confirm-password).innerHTML = "Mật khẩu đã khớp";
    } else {
        document.getElementById(confirm-password).innerHTML = "<span color=’red’>Mật khẩu chưa khớp</span>";
    }
}

</script> -->