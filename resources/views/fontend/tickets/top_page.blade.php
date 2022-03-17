@extends('fontend.layouts.master')

@section('content')
<div class="adminx-content">
    <div class="adminx-main-content">
      <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Danh sách Ticket</a></li>
            <li class="breadcrumb-item active"  aria-current="page">{{$department_name}}</li>
          </ol>
        </nav>
  
        <div class="pb-3">
          <h2>Ticket {{$department_name}}</h2>
        </div>
        <div class="row">
          <div class="col">
            <div class="box-export-excel">
              <a href="{{route('create')}}" class="btn btn-success">Tạo Ticket</a>
              <a href="#" class="btn btn-primary">Export Excel</a>
              {{-- <a href="{{route('export_tickets')}}" class="btn btn-sm btn-success">Export Excel</a> --}}
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col">
            <div class="card mb-grid">
              <div class="table-responsive-md">
                <table id="data_tables" class="table table-actions table-striped table-hover mb-0" data-table>
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Họ tên ứng viên</th>
                      <th scope="col">Job</th>
                      <th scope="col">Level</th>
                      <th scope="col">Status</th>
                      <th scope="col">Độ ưu tiên</th>
                      <th scope="col">Thời gian</th>
                      <th scope="col">Người phụ trách</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($tickets as $ticket)
                    <tr>
                      <td>{{$stt++}}</td>
                      <td>{{$ticket->name}}</td>
                      <td>{{$ticket->job->name}}</td>
                      <td>{{$ticket->level->name}} </td>
                      <td><span class="badge badge-pill badge-primary"><?php if($ticket->status ==1) echo'Request review' ?>
                        <?php if($ticket->status ==2) echo'Đồng ý phỏng vấn' ?>
                        <?php if($ticket->status ==3) echo'Loại' ?>
                        <?php if($ticket->status ==4) echo'Setup phỏng vấn' ?>
                        <?php if($ticket->status ==5) echo'Offer' ?>
                        <?php if($ticket->status ==6) echo'Nhận offer' ?>
                        <?php if($ticket->status ==7) echo'Từ chối offer' ?>
                        <?php if($ticket->status ==8) echo'Đã check in' ?>
                        <?php if($ticket->status ==9) echo'Pending' ?>
                        <?php if($ticket->status ==10) echo'Closed' ?>
                      </span></td>
                      <td><span class="badge badge-pill badge-primary"><?php if($ticket->priority==1) echo'Low' ?>
                        <?php if($ticket->priority==2) echo'Normal' ?>
                        <?php if($ticket->priority==3) echo'High' ?>
                        <?php if($ticket->priority==4) echo'Urgent'?>
                        <?php if($ticket->priority==5) echo'Immediate' ?>
                      </span></td>
                      <td>{{date("d-m-Y", strtotime($ticket->start))}} {{date("d-m-Y", strtotime($ticket->deadline))}}</td>
                      <td>
                        @foreach ($ticket->users as $user_assign)
                            <span>{{$user_assign->email}}</span>
                        @endforeach
                      </td>
                      <td>
                        <div class="action_box">
                          <a href="{{route('detail-ticket',$ticket->id)}}" class="btn btn-sm btn-primary">Xem</a>
                          <a href="{{route('edit-ticket',$ticket->id)}}" class="btn btn-sm btn-warning">Sửa</a>
                        </div>
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