@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                    <img src="{{asset('assets/img/ominext1.png')}}" alt=""style="height:50px;width:155px"> 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" id="myform" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            

                            <div class="forgot">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                                


                                
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="forgotpass1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Gửi') }}
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
    $( "#myform" ).validate({
  rules: {
    email: {
      required: true,
      email: true,
    }
  },
  messages: {
    email: {
        required:"Mời bạn nhập Email",
        email:"Sai định dạng Email",
    }
  }
});
</script>
@endsection
