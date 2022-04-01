@extends('fontend.layouts.ticket')


@section('content')
<div class="adminx-content" style="width: 80%; margin-left: 10%;">
    <div class="adminx-main-content">
      <div class="container-fluid">
        <!-- BreadCrumb -->
        <div class="pb-3" style="margin-top: 16px;">
          <h2>Edit Tài khoản</h2>
        </div>
  
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-grid">
              <div class="card-header d-flex justify-content-between align-items-center">

  
                <nav class="card-header-actions">
                    <a href="{{url('/table-data-users')}}" class="btn btn-primary" style="width: 200px; height: 50px;font-size: 18px; line-height: 40px">Back</a>
                </nav>
  
              </div>
              <div class="card-body collapse show" id="card1">
                <form autocomplete="off" method="GET" enctype="multipart/form-data" action="{{route('update_user', [$user->id])}}">
                  @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"></label>
                                <input type="text" name="email_user" class="form-control" aria-describedby="emailHelp" maxlength="255" placeholder="Email" value="{{$user->email}}">
                                @error('email_user')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                                @if(Session::has('message_update_email'))
                                <small class="form-text text-danger">{{Session::get('message_update_email')}}</small>
                                @endif

                            </div>
                            <div class="form-group">
                                <label class="form-label" ></label>
                                <input type="password" id="password_user" name="password_user" class="form-control" maxlength="10" placeholder="New pass">
                                @error('password_user')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label"></label>
                                <input class="form-control mb-2" name="name_user" type="text" maxlength="255" placeholder="Họ tên hiển thị" value="{{$user->name}}">
                                @error('name_user')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"></label>
                                <select name="department_user" class="custom-select">

                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}" <?php if ($user->department->id == $department->id) echo 'selected'; ?> >{{$department->name}}</option> 
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputPassword1"></label>
                                <select name="role_user" class="custom-select">

                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}" <?php if ($user->role->id == $role->id) echo 'selected'; ?> >{{$role->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="footer-edit-form" style="display: flex; justify-content: space-between;">
                        <button type="submit" class="btn btn-primary" style="width: 200px; height: 50px;font-size: 18px; line-height: 40px">UPDATE</button>
  
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#btn_delete" style="width: 200px; height: 50px;font-size: 18px; line-height: 40px">
                          DELETE
                        </button>
                        

                    </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="btn_delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        Bạn muốn delete user này?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <a href="{{route('delete_user', [$user->id])}}" class="btn btn-success">OK</a>
      </div>
    </div>
  </div>
</div>

@if(Session::has('message_update'))
    <!-- Button trigger modal -->
    <button type="button" id="btn_open_dialog" class="btn btn-primary" data-toggle="modal" hidden data-target="#staticBackdrop">
      Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            Update thành công
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-success" href="{{route('table_data_users')}}">OK</a>
          </div>
        </div>
      </div>
    </div>
    <script>
      window.onload = function(){
        document.getElementById('btn_open_dialog').click();
      }
    </script>
    @endif

@endsection


