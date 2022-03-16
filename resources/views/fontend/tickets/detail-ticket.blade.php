@extends('fontend.layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="{{ asset('assets/select2/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/select2/select2.min.js')}}"></script>
   
</head>
<body>
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="card">
                        <div class="card-header">
                            <h1 style="color: blue">Create Ticket</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Họ Tên</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$ticket->name}}" disabled placeholder="Nhập họ tên">
                                        @error('name')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="job">job</label>
                                        <select class="form-control select2" name="job" id="job" disabled >
                                            <option value="0">Chọn job</option>
                                            @foreach ($job as $key => $item)
                                                <option <?php if($ticket_job->name == $item['name']) echo "selected" ?> value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('job')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="defaultSelect">level</label>
                                        <select class="form-control form-control select2" name="level" id="level" disabled>
                                            <option value="0">Chọn level</option>
                                            @foreach ($level as $key => $item)
                                                <option <?php if($ticket_level->name == $item['name']) echo "selected" ?> value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('level')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cv">Tải CV lên</label><br>
                                        <a href="{{route('download',$ticket->id)}}">Test edit</a>
                                        <img id="blah" src="{{asset($ticket->cv)}}" alt="your image" style="width: 150px; height: 100px;" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">		
                                    <div class="form-group">
                                        <label for="priority">Status</label>
                                        <select class="form-control form-control select2" name="status" id="Status" disabled >
                                            <option value="0">Chọn Status</option>
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
                                        <label for="priority">Độ ưu tiên</label>
                                        <select class="form-control form-control select2" name="priority" id="priority" disabled>
                                            <option value="0">Chọn độ ưu tiên</option>
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
                                        <label for="date-start">Start</label>
                                        <input type="date" class="form-control" name="date-start" id="date-start" value="{{old('date-start',$ticket->start)}}" placeholder="Nhập ngày start" disabled>
                                        @error('date-start')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date-deadline">Deadline</label>
                                        <input type="date" class="form-control" name="date-deadline" id="date-deadline" value="{{old('date-deadline',$ticket->deadline)}}" placeholder="Nhập ngày deadline" disabled>
                                        @error('date-deadline')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group" >
                                        <label for="person-charge">Người phụ trách</label>
                                        <select class="form-control select2" multiple="multiple" name="person_charge[]" id="person-charge" disabled >
                                            <option>Chọn người phụ trách</option>
                                            @if(isset($user_assigns))
                                            @foreach($user_assigns as $user_assign)
                                                <option value="{{ $user_assign->id }}" {{ in_array($user_assign->id, $ticket->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user_assign->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Phòng ban</label>
                                        <select class="form-control select2" multiple="multiple" name="department[]" id="department" disabled >
                                            <option>Chọn phòng ban</option>
                                            @foreach($department as $department)
                                                <option value="{{ $department->id }}" {{ in_array($department->id, $ticket->departments->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả</label><br>
                                        <textarea class="form-control" name="description" id="" cols="40" rows="3" style="width: 350px;" name="description"  value="{{old('description')}}" placeholder="Nhập nội dung mô tả" disabled>{{$ticket->description}}</textarea>
                                    </div>
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

<script>
    $("#Status,#priority,#person-charge,#department").select2({
        theme: 'bootstrap4',
        placeholder: "Chọn mục phù hợp",
        allowClear: true
    });
    $("#job").select2({
        theme: 'bootstrap4',
        placeholder: "Chọn mục phù hợp",
        allowClear: true,
        tags:true,
    }).on('select2:close',function(e){
        e.preventDefault();

        var element = $(this);
        var new_job = $.trim(element.val());
        if(new_job != '')
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: "{{ route('jobs') }}",
                type: 'get',
                data:{ 'id':new_job},
                dataType : 'json',
                success:function(response){
                    if (response.status == 200) {
                        name = response.data.name;
                        job_id = response.data.job_id;
                        if (name == 'yes') {
                            element.append('<option value = "'+job_id+'">'+new_job+'</option>').val(job_id);
                        }
                        else {
                                        
                        }
                    }
                },
            });
        }
    });
   
  </script>
  <script>
      $("#level").select2({
        theme: 'bootstrap4',
        placeholder: "Chọn mục phù hợp",
        allowClear: true,
        tags:true,
    }).on('select2:close',function(e){
        e.preventDefault();

        var element = $(this);
        var new_level = $.trim(element.val());
        if(new_level != '')
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: "{{ route('levels') }}",
                type: 'get',
                data:{ 'id':new_level},
                dataType : 'json',
                success:function(response){
                    if (response.status == 200) {
                        name = response.data.name;
                        level_id = response.data.level_id;
                        if (name == 'yes') {
                            element.append('<option value = "'+level_id+'">'+new_level+'</option>').val(level_id);
                        }
                    }
                },
            });
        }
    });
  </script>

  <script>
    $('#date-start').on('change', function () {
        var start = document.getElementById('date-start').value;
        var deadline = document.getElementById('date-deadline').value;
        const date1 = new Date(start);
        const date2 = new Date(deadline);
        if(date1 > date2){
            document.getElementById("date-start").value = deadline;
        }
    });
    $('#date-deadline').on('change', function () {
        var start = document.getElementById('date-start').value;
        var deadline = document.getElementById('date-deadline').value;
        const date1 = new Date(start);
        const date2 = new Date(deadline);
        if(date2 < date1){
            document.getElementById("date-deadline").value = start;
        }
    });

   
  </script>
</html>
@endsection
