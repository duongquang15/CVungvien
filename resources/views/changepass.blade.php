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
                                <input id="current_pass" type="password" maxlength="10" class="form-control" name="current_pass" autocomplete="email" autofocus placeholder="Old pass" style="width:380px">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-12">
                                <input id="password" type="password"maxlength="10" class="form-control" name="password"  autocomplete="new-password" placeholder="New pass" style="width:380px">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                            <div class="col-12">
                                <input id="password-confirm" maxlength="10" type="password" class="form-control" name="confirm_password"  autocomplete="new-password" placeholder="Confirm pass" style="width:380px">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
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
        required:"Chưa nhập Old pass",
        minlength:"Nhập sai Old pass",
        maxlength:"Nhập sai Old pass",
    },
    password: {
        required:"Chưa nhập New pass",
        minlength:"Nhập sai New pass",
        maxlength:"Nhập sai New pass",
    },
    confirm_password: {
        required:"Chưa nhập Confirm pass",
        equalTo: "Nhập sai Confirm pass!",
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

