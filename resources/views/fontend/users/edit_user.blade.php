@extends('fontend.layouts.master')
@section('title', 'Sửa tài khoản')

@section('content')
<div class="adminx-content">
    <div class="adminx-main-content">
      <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Quản lí tài khoản</a></li>
            <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
            <li class="breadcrumb-item active"  aria-current="page">Edit tài khoản</li>
          </ol>
        </nav>
  
        <div class="pb-3">
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
                <form autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Email đăng nhập</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" >Mật khẩu</label>
                                <input type="text" class="form-control" value="{{$user->password}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Họ tên hiển thị</label>
                                <input class="form-control mb-2" type="text" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Phòng ban</label>
                                <select class="custom-select">
                                    <option selected>Phòng ban selected</option>

                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option> 
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Phân quyền</label>
                                <select class="custom-select">
                                    <option selected>Phân quyền selected</option>
                                    <option value="1">Phân quyền 1</option>
                                    <option value="2">Phân quyền 2</option>
                                    <option value="3">Phân quyền 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="footer-edit-form" style="display: flex; justify-content: space-between;">
                        <a class="btn btn-primary" href="#">Submit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

