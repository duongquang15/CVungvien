@extends('fontend.layouts.master')
@section('title', 'Danh sách tài khoản')

@section('content')
<div class="adminx-content">
    <div class="adminx-main-content">
      <div class="container-fluid">
        <!-- BreadCrumb -->
        <div class="pb-3" style="margin-top: 16px;">
          <h2>Danh sách Tài khoản</h2>
        </div>

        <div class="row">
          <div class="col">
            <div class="box-back-sort">
              <a href="{{route('top_page')}}" class="btn btn-success">BACK</a>
              <input type="text" name="" id="" placeholder="Sort">          
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col">
            <div class="card mb-grid">
              <div class="table-responsive-md">
                <table class="table table-actions table-striped table-hover mb-0" data-table>
                  <thead>
                    <tr style="background-color: #a1e7ff;">
                      <th scope="col">UserID</th>
                      <th scope="col">Họ tên</th>
                      <th scope="col">Phòng ban</th>
                      <th scope="col">Roles</th>
                      <th scope="col">Ngày tạo</th>
                      <th scope="col">Người tạo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr onclick="window.location='{{route('edit_user', ['id' => $user->id])}}';">
                      <td>{{$user->email}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->department->name}}</td>
                      <td>
                        <span class="badge badge-pill badge-primary">{{$user->role->name}}</span>
                      </td>
                      <td>{{$user->created_at}}</td>
                      <td>chưa cập nhật</td>
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