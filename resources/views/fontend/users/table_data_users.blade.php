@extends('fontend.layouts.master')

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
                <table id="data_tables" class="table table-actions table-striped table-hover mb-0" data-table>
                  <thead>
                    <tr>
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
                      <tr>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td>
                        <span class="badge badge-pill badge-primary">Admin</span>
                      </td>
                      <td>23/01/2022</td>
                      <td>Thắng Em pro</td>
                      <td>
                        <a href="{{route('edit_user')}}" class="btn btn-sm btn-primary">Edit</a>

                      </td>
                      </tr>
                    <tr>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                      <td>
                        <span class="badge badge-pill badge-primary">Author</span>
                        <span class="badge badge-pill badge-primary">Developer</span>
                      </td>
                      <td>11/05/2019</td>
                      <td>Huy the shy sa-đéc</td>
                      <td>
                        <button class="btn btn-sm btn-primary" >Edit</button>
                      </td>
                    </tr>
                    <tr>

                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                      <td>
                        <span class="badge badge-pill badge-danger">Inactive</span>
                      </td>
                      <td>11/11/1111</td>
                      <td>Quang</td>
                      <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                      </td>
                    </tr>
                  

                    <tr>

                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                          <span class="badge badge-pill badge-danger">Inactive</span>
                        </td>
                        <td>11/11/1111</td>
                        <td>Quang</td>
                        <td>
                          <button class="btn btn-sm btn-primary">Edit</button>
                        </td>
                      </tr>
                      <tr>

                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                          <span class="badge badge-pill badge-danger">Inactive</span>
                        </td>
                        <td>11/11/1111</td>
                        <td>Quang</td>
                        <td>
                          <button class="btn btn-sm btn-primary">Edit</button>

                        </td>
                      </tr>
                      <tr>

                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                          <span class="badge badge-pill badge-danger">Inactive</span>
                        </td>
                        <td>11/11/1111</td>
                        <td>Quang</td>
                        <td>
                          <button class="btn btn-sm btn-primary">Edit</button>

                        </td>
                      </tr>
                      <tr>

                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                          <span class="badge badge-pill badge-danger">Inactive</span>
                        </td>
                        <td>11/11/1111</td>
                        <td>Quang</td>
                        <td>
                          <button class="btn btn-sm btn-primary">Edit</button>

                        </td>
                      </tr>
                      <tr>

                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                          <span class="badge badge-pill badge-danger">Inactive</span>
                        </td>
                        <td>11/11/1111</td>
                        <td>Quang</td>
                        <td>
                          <button class="btn btn-sm btn-primary">Edit</button>

                        </td>
                      </tr>


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