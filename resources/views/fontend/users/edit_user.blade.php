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
                <div class="card-header-title" style="font-size: 20px;">Thông tin Tài khoản</div>
  
                <nav class="card-header-actions">
                    <button onclick="history.back()" class="btn btn-info">Back</button>
                </nav>
  
              </div>
              <div class="card-body collapse show" id="card1">
                <form autocomplete="off" method="GET" enctype="multipart/form-data" action="{{route('update_user', [$user->id])}}">
                  @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">UserID</label>
                                <input type="email" name="email_user" class="form-control" aria-describedby="emailHelp" value="{{$user->email}}">
                                @error('email_user')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" >Mật khẩu</label>
                                <input type="password" name="password_user" class="form-control" value="password">
                                @error('password')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Họ tên hiển thị</label>
                                <input class="form-control mb-2" name="name_user" type="text" value="{{$user->name}}">
                                @error('name_user')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Phòng ban</label>
                                <select name="department_user" class="custom-select">

                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}" <?php if ($user->department->id == $department->id) echo 'selected'; ?> >{{$department->name}}</option> 
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Phân quyền</label>
                                <select name="role_user" class="custom-select">

                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}" <?php if ($user->role->id == $role->id) echo 'selected'; ?> >{{$role->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="footer-edit-form" style="display: flex; justify-content: space-between;">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <a class="btn btn-danger" href="{{route('delete_user', [$user->id])}}">DELETE</a>
                    </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

