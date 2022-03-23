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
      <div class="card">
        <div class="card-header">

          <img src="{{asset('assets/img/ominext1.png')}}" alt="" style="width:200px">
        </div>

        <div class="card-body">
          <form method="POST" id="myform" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">




              <div class="col-md-12">
                <div class="login">
                  <!-- <i class="fa fa-users" aria-hidden="true"s></i> -->
                  <input id="email" type="email" maxlength="255" class="form-control @error('email') @enderror" name="email" placeholder="UserID">
                  @error('email')
                  <p class="invalid-feedback" role="alert">
                    <label style="margin-left: 30px;margin-top:30px; position: absolute;top:58px;color:red;font-size:15px"><?php if ($message == 'These credentials do not match our records.') echo ('Nhập sai password');
                                                        else {
                                                          echo ($message);
                                                        } ?></label>
                  </p>
                  @enderror

                </div>

                <div class="login1">

                  <input id="password" type="password" maxlength="10" class="form-control demoInputBox @error('password') is-invalid @enderror" onKeyUp="checkPasswordStrength();" name="password" placeholder="Pass">
                  <div id="password-strength-status" style="margin-left:30px"></div> <br />
                  <!-- <i class="fa fa-eye"  aria-hidden="true" onclick="myFunction()"></i> -->
                  <!-- @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror -->
                </div>




              </div>
            </div>





            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <!-- <label class="form-check-label" for="remember" style="color:darkblue">
                                        {{ __('Remember Me') }}
                                    </label> -->
              </div>
            </div>


            <div class="form-group row mb-0">
              <div class="submit_login col-md-12">
                <button type="submit" onclick="save()" class="btn btn-primary_1">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link offset-md-12" href="{{ route('password.request') }}" style="color:darkblue;margin-left: 147px">
                  {{ __('Forgot Password?') }}
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
<style>
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
        maxlength: 10,
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
        maxlength: "Nhập sai password",
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
<script>
    function validateform() {
        var name = document.myform.name.value;
        var password = document.myform.password.value;
 
        if (name == null || name == "") {
            alert("Name can't be blank");
            return false;
        } else if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }
    }
</script>
@endsection