@extends('fontend.layouts.ticket')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="{{ asset('assets/select2/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/select2/select2.min.js')}}"></script>
   
</head>
<body>
    <style>
       .form-control:disabled, .form-control[readonly] {
    opacity: .90!important;
   
}
    </style>
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('top_page')}}" class=" btn btn-primary " style="width: 200px; height: 50px;font-size: 18px">Back</a>
                            @if (Auth::user()->role->id == 3)
                            <a href="{{route('edit-ticket',$ticket->id)}}" class=" btn btn-primary float-right text-center " style="width: 200px; height: 50px;font-size: 18px; line-height: 40px">EDIT/UPDATE</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" value="{{$ticket->name}}" disabled placeholder="Họ tên">
                                        @error('name')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2" name="job" id="job" disabled >
                                            @foreach ($job as $key => $item)
                                                <option <?php if($ticket_job->name == $item['name']) echo "selected" ?> value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('job')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control select2" name="level" id="level" disabled>
                                            @foreach ($level as $key => $item)
                                                <option <?php if($ticket_level->name == $item['name']) echo "selected" ?> value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('level')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="cv">Tải CV lên</label><br> --}}
                                        <a href="{{route('download',$ticket->id)}}">{{$ticket->cv}}</a><br>
                                        {{-- <img id="blah" src="{{asset($ticket->cv)}}" alt="your image" style="width: 150px; height: 100px;" /> --}}
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">		
                                    <div class="form-group">
                                        <select class="form-control form-control select2" name="status" id="Status" disabled >
                                            <option value="0">Status</option>
                                            <option <?php if($ticket->status == 1)echo"selected"; ?> value="1">Request review</option>
                                            <option <?php if($ticket->status == 2)echo"selected"; ?> value="2">Đồng ý phỏng vấn</option>
                                            <option <?php if($ticket->status == 3)echo"selected"; ?> value="3">Loại</option>
                                            <option <?php if($ticket->status == 4)echo"selected"; ?> value="4">Setup phỏng vấn</option>
                                            <option <?php if($ticket->status == 5)echo"selected"; ?> value="5">Offer</option>
                                            <option <?php if($ticket->status == 6)echo"selected"; ?> value="6">Nhận offer</option>
                                            <option <?php if($ticket->status == 7)echo"selected"; ?> value="7">Từ chối offer</option>
                                            <option <?php if($ticket->status == 8)echo"selected"; ?> value="8">Đã check in</option>
                                            <option <?php if($ticket->status == 9)echo"selected"; ?> value="9">Pending</option>
                                            <option <?php if($ticket->status == 10)echo"selected"; ?> value="10">Closed</option>
                                            
                                        </select>
                                        @error('status')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>		
                                    <div class="form-group">
                                        <select class="form-control form-control select2" name="priority" id="priority" disabled>
                                            <option value="0">Độ ưu tiên</option>
                                            <option <?php if($ticket->priority == 1)echo"selected"; ?> value="1">Low</option>
                                            <option <?php if($ticket->priority == 2)echo"selected"; ?> value="2">Normal</option>
                                            <option <?php if($ticket->priority == 3)echo"selected"; ?> value="3">Higt</option>
                                            <option <?php if($ticket->priority == 4)echo"selected"; ?> value="4">Urgent</option>
                                            <option <?php if($ticket->priority == 5)echo"selected"; ?> value="5">Immediate</option>
                                        </select>
                                        @error('priority')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date-start" id="date-start" value="{{old('date-start',$ticket->start)}}" placeholder="Nhập ngày start" disabled>
                                        @error('date-start')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date-deadline" id="date-deadline" value="{{old('date-deadline',$ticket->deadline)}}" placeholder="Nhập ngày deadline" disabled>
                                        @error('date-deadline')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group" >
                                        <select class="form-control select2" multiple="multiple" name="person_charge[]" id="person-charge" disabled >
                                            <option>Người phụ trách</option>
                                            @if(isset($user_assigns))
                                            @foreach($user as $user_assign)
                                                <option value="{{ $user_assign->id }}" {{ in_array($user_assign->id, $ticket->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user_assign->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2" multiple="multiple" name="department[]" id="department" disabled >
                                            <option>Phòng ban</option>
                                            @foreach($department as $department)
                                                <option value="{{ $department->id }}" {{ in_array($department->id, $ticket->departments->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" id="" cols="40" rows="3" style="width: 436px;" name="description"  value="{{old('description')}}" placeholder="Mô tả" disabled>{{$ticket->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <label for="description">Người thao tác</label>
                                <h4>{{$ticket->change}}</h4>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <label for="description">Thời gian thao tác</label>
                                <h5>{{$ticket->updated_at}}</h5>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <label for="description">Nội dung thao tác</label>
                                <h5>{{$ticket->person_change}}</h5>
                            </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
@endsection
