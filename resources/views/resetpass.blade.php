@extends('layouts.app')

@section('content')


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<form id="myform" style="margin-left:auto;margin-right:auto;background:#0f254f;">
    <!-- <div style="height: 30px;"><label for="" style="margin-left: 27%;color:white;margin-top: 4%;font-size: 17px;">CHANGE PASSWORD</label></div><hr> -->
    <div class="card-header">
                    <img src="{{asset('assets/img/ominext.png')}}" alt=""style="height:50px;width:155px"> 
                </div>
        
    <div class="change">
      <input class="left" id="password" name="password" type="password" placeholder="Mật khẩu">
      <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction()"style="margin-top: 18px;
    margin-left: -30px;"></i>
    </div>
    <div class="change">
      <input class="left" id="confirm_password" name="confirm_password" type="password" placeholder="Mật khẩu mới">
      <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction1()"style="margin-top: 18px;
    margin-left: -30px;"></i>

    </div>
    
<div style=""><input class="left1" type="submit" value="Reset"></div>
</form>
<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#myform" ).validate({
  rules: {
    password: {
      required: true,
      minlength: 8,   
    },
    confirm_password: {
      required: true,
      equalTo: "#password",    
    }
  },
  messages: {
    password: {
        required:"Mời bạn nhập mật khẩu mới",
        minlength:"Mật khẩu không được nhỏ hơn 8 ký tự",
    },
    confirm_password: {
        required:"Mời bạn nhập lại mật khẩu mới",
        equalTo: "Mật khẩu không giống nhau!",
    }
  }
});
</script>
<style>
    #field{margin-left:.5em;float:left}#field,label{float:left;font-family:Arial,Helvetica,sans-serif;font-size:small}br{clear:both}input{border:1px solid #ADD8E6;margin-bottom:.5em}input.error{border:1px solid red}label.error{background:url({{asset('assets/img/nhando.png')}}) no-repeat;padding-left:16px;margin-left:.3em}label.valid{background:url({{asset('assets/img/tich.png')}}) no-repeat;display:block;width:16px;height:16px}
    label.error{
        margin-left:65px;
    }
    label.valid{
        margin-top:-45px!important;
    }
    #myform{
     
      width: 424px;
      border-radius:25px;
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
</style>
<script>
  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction1() {
  
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



</script>
@endsection

