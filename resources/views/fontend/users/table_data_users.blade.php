@extends('fontend.layouts.master')
@section('title', 'Danh sách tài khoản')

@section('content')
<div class="adminx-content">
    <div class="adminx-main-content">
      <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Quản lí tài khoản</a></li>
            <li class="breadcrumb-item active  aria-current="page">Danh sách</li>
          </ol>
        </nav>
  
        <div class="pb-3">
          <h2>Danh sách Tài khoản</h2>
        </div>
  
        <div class="row">
          <div class="col">
            <div class="card mb-grid">
              <div class="table-responsive-md">
                <table id="datatables_users" class="table table-actions table-striped table-hover mb-0" data-table>
                  <thead>
                    <tr style="background-color: #a1e7ff;">
                      <th scope="col">UserID</th>
                      <th scope="col">Họ tên</th>
                      <th scope="col">Phòng ban</th>
                      <th scope="col">Roles</th>
                      <th scope="col">Ngày tạo</th>
                      <th scope="col">Người tạo</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                      <td>{{$user->email}}</td>
                      <td>{{$user->name}}</td>
                      <td>chưa cập nhật</td>
                      <td>
                        <span class="badge badge-pill badge-primary">chưa cập nhật</span>
                      </td>
                      <td>{{$user->created_at}}</td>
                      <td>chưa cập nhật</td>
                      <td>
                        <a href="{{route('edit_user', ['id' => $user->id])}}" class="btn btn-sm btn-primary">Edit</a>
                      </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection