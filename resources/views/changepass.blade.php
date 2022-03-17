@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <img src="{{asset('assets/img/ominext1.png')}}" alt="" style="width: 200px;;border-radius:0.25em">
                </div>

                <div class="card-body">
                    <form method="POST" id="myform" action="{{ route('changepassword') }}">
                        @csrf
                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-12">
                                <input id="current_pass" type="password" class="form-control" name="current_pass" autocomplete="email" autofocus placeholder="Mật khẩu cũ" style="width:380px">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-12">
                                <input id="password" type="password" class="form-control" name="password"  autocomplete="new-password" placeholder="Mật khẩu mới" style="width:380px">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="confirm_password"  autocomplete="new-password" placeholder="Nhập lại mật khẩu mới" style="width:380px">
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


<script>
// just for the demos, avoids form submit

$( "#myform" ).validate({
  rules: {
    current_pass: {
      required: true,
      minlength: 6,
      maxlength:10,
    },
    password: {
      required: true,
      minlength: 6,
      maxlength:10,
    },
    confirm_password: {
      required: true,
      equalTo: "#password",    
    }
  },
  messages: {
    current_pass: {
        required:"Nhập mật khẩu cũ",
        minlength:"Nhập sai password",
        maxlength:"Nhập sai password",
    },
    password: {
        required:"Nhập mật khẩu mới",
        minlength:"Nhập sai password",
        maxlength:"Nhập sai password",
    },
    confirm_password: {
        required:"Nhập lại mật khẩu mới",
        equalTo: "Mật khẩu không giống nhau!",
    }
  }
});
</script>
<!-- <style>
    #field{margin-left:.5em;float:left}#field,label{float:left;font-family:Arial,Helvetica,sans-serif;font-size:small}br{clear:both}input{border:1px solid #ADD8E6;margin-bottom:.5em}input.error{border:1px solid red}label.error{background:url({{asset('assets/img/nhando.png')}}) no-repeat;padding-left:16px;margin-left:.3em}label.valid{background:url({{asset('assets/img/tich.png')}}) no-repeat;display:block;width:16px;height:16px}
    label.error{
        margin-left:52px;
        margin-top: -22px;
    }
    label.valid{
        margin-top:-45px!important;
    }
    #myform{
     
      width: 424px;
      
      
      border-radius: 25px;
    }
    label.valid{
        float:right;
        margin-top:25px;
    }
    label.error{
        color: red;
        
    }
    .left{
        width: 300px;
        margin-left: 16%;
        margin-bottom: 25px;
        border-radius: 3px;
        font-size: 16px;
        margin-top: 14px;
        border: 1px solid #ced4da;
    }
    .left:hover{
      box-shadow: 0 0 0 0.2rem rgb(52 144 220 / 25%);
      
    }
    .left1{
        margin-left: 36%;
        margin-top: 20px;
        border-radius: 5px;
        background: #fa8c1e;
        width: 105px;
        border: none;
        font-size: 18px;
        color: white;
    }
    .left1:hover{
        color: white;
        background:#FF9900 ;
        transition: background 1.5s linear;
        border-radius: 5px;
        
    }
    .change{
      /* display:flex; */
    }
</style> -->
<style>
  .error{
    margin:0;
  }
</style>
<script>
  function myFunction() {
  var x = document.getElementById("old_password");
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
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


</script>
@endsection

