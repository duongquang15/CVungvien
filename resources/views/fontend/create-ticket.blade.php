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
                    <form action="{{route('stores')}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ tên">
                                        @error('name')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="job">job</label>
                                        <select class="form-control select2" name="job" id="job" >
                                            <option value="0">Chọn job</option>
                                            @foreach ($job as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('job')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="defaultSelect">level</label>
                                        <select class="form-control form-control select2" name="level" id="level">
                                            <option value="0">Chọn level</option>
                                            @foreach ($level as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('level')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cv">Tải CV lên</label><br>
                                        <input accept="image/*" type="file" id="imgInp" name="file" multiple />
                                        <img id="blah" src="#" alt="your image" style="width: 150px; height: 100px;" />
                                        @error('file')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">		
                                    <div class="form-group">
                                        <label for="priority">Status</label>
                                        <select class="form-control form-control select2" name="status" id="Status" >
                                            <option value="0">Chọn Status</option>
                                            <option value="1">Request review</option>
                                            <option value="2">Đồng ý phỏng vấn</option>
                                            <option value="3">Loại</option>
                                            <option value="4">Setup phỏng vấn</option>
                                            <option value="5">Offer</option>
                                            <option value="6">Nhận offer</option>
                                            <option value="7">Từ chối offer</option>
                                            <option value="8">Đã check in</option>
                                            <option value="9">Pending</option>
                                            <option value="10">Closed</option>
                                            
                                        </select>
                                        @error('status')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>		
                                    <div class="form-group">
                                        <label for="priority">Độ ưu tiên</label>
                                        <select class="form-control form-control select2" name="priority" id="priority">
                                            <option value="0">Chọn độ ưu tiên</option>
                                            <option value="1">Low</option>
                                            <option value="2">Normal</option>
                                            <option value="3">Higt</option>
                                            <option value="4">Urgent</option>
                                            <option value="5">Immediate</option>
                                        </select>
                                        @error('priority')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date-start">Start</label>
                                        <input type="date" class="form-control" name="date-start" id="date-start"  value="{{old('date-start')}}" placeholder="Nhập ngày deadline">
                                        @error('date-start')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date-deadline">Deadline</label>
                                        <input type="date" class="form-control" name="date-deadline" id="date-deadline"  value="{{old('date-deadline')}}" placeholder="Nhập ngày deadline">
                                        @error('date-deadline')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group" >
                                        <label for="person-charge">Người phụ trách</label>
                                        <select class="form-control select2" multiple="multiple" name="person_charge[]" id="person-charge" >
                                            <option>Chọn người phụ trách</option>
                                            @foreach ($user as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Phòng ban</label>
                                        <select class="form-control select2" multiple="multiple" name="department[]" id="department" >
                                            <option>Chọn phòng ban</option>
                                            @foreach ($department as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả</label><br>
                                        <textarea class="form-control" name="description" id="" cols="40" rows="3" style="width: 350px;" name="description"  value="{{old('description')}}" placeholder="Nhập nội dung mô tả"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action" style="text-align: center">
                            <input type="submit" class=" btn btn-success " style="width: 200px; height: 50px;font-size: 18px" value="Create">
                            <input type="reset" class=" btn btn-danger " style="width: 200px; height: 50px;font-size: 18px" value="Reset">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
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
                        else {
                                        
                        }
                    }
                },
            });
        }
    });
  </script>
</html>
@endsection
