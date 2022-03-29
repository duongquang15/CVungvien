@extends('fontend.layouts.ticket')


@section('content')
<div class="adminx-content" style="width: 80%; margin-left: 10%;">
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
              <form action="{{route('sort_users')}}" method="POST" onsubmit='return submitForm()'>
                @csrf
                <select class="form-control" name="sort_users" id="sort_users" onchange="this.form.submit()">
                  <option value="1" <?php if($value_option == 'UserID') echo 'selected'; ?> >UserID</option>
                  <option value="2" <?php if($value_option == 'Họ tên') echo 'selected'; ?> >Họ tên</option>
                  <option value="3" <?php if($value_option == 'Phòng ban') echo 'selected'; ?> >Phòng Ban</option>
                  <option value="4" <?php if($value_option == 'Phân quyền') echo 'selected'; ?>>Phân quyền</option>
                  <option value="5" <?php if($value_option == 'Ngày tạo') echo 'selected'; ?>>Ngày tạo</option>
                  <option value="6" <?php if($value_option == 'Người tạo') echo 'selected'; ?>>Người tạo</option>  
                </select>  
              </form>         
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
                      <th scope="col">Phân quyền</th>
                      <th scope="col">Ngày tạo</th>
                      <th scope="col">Người tạo</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if (!$users->isEmpty())
                    @foreach ($users as $user)
                      <tr onclick="window.location='{{route('edit_user', [$user->id])}}';">
                      <td>{{$user->email}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->department->name}}</td>
                      <td>
                        <span class="badge badge-pill badge-primary">{{$user->role->name}}</span>
                      </td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->created_by}}</td>
                      </tr>
                    @endforeach
                    @else 
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Trống dữ liệu</td>
                      <td></td>
                      <td></td>
                      </tr>
                    @endif
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