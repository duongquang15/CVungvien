@extends('fontend.layouts.ticket')

@section('content')
<style>
    .custom-file-upload{
  background: #007bff; 
  padding: 8px;
  border: 1px solid #e3e3e3; 
  border-radius: 5px; 
  border: 1px solid #ccc; 
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}
</style>
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('stores')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="card">
                        <div class="card-header">
                            {{-- <h1 style="color: blue">Create Ticket</h1> --}}
                            <input type="reset" class=" btn btn-primary " style="width: 200px; height: 50px;font-size: 18px" value="Back" onclick="history.go(-1);">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" >
                                        @error('name')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control select2"  name="job" id="job"  >
                                            <option value>job</option>
                                            @foreach ($job as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('job')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control select2" name="level" id="level" >
                                            {{-- <option value="0">Chọn level</option> --}}
                                            {{-- @foreach ($level as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('level')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="choose-file" class="custom-file-upload" id="choose-file-label"  >
                                            UPLAOD CV
                                         </label>
                                         <input name="file" type="file" id="choose-file" multiple 
                                            accept=".jpg,.jpeg,.pdf,doc,docx,application/msword,.png" style="display: none" />
                                        {{-- <label for="img" class="btn btn-info">UPLOAD CV</label>
                                        <input type="file" id="img" name="file" multiple required> --}}
                                        @error('file')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">		
                                    <div class="form-group">
                                        <select class="form-control form-control select2" name="status" id="Status" >
                                            <option value="0">Status</option>
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
                                        <select class="form-control form-control select2" name="priority" id="priority">
                                            <option value="0">Độ ưu tiên</option>
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
                                        <input type="date" class="form-control" name="date-start" id="date-start" value="<?php echo date("Y-m-d");?>" placeholder="start">
                                        @error('date-start')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date-deadline" id="date-deadline" value="<?php echo date("Y-m-d");?>" placeholder="deadline">
                                        @error('date-deadline')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group" >
                                        <select class="form-control select2"  name="person_charge" id="person-charge"  >
                                            <option>người phụ trách</option>
                                            @foreach ($user as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2" multiple="multiple" name="department[]" id="department"  >
                                            <option>phòng ban</option>
                                            @foreach ($department as $key => $item)
                                                <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" id="" cols="40" rows="3" style="width: 350px;" name="description"  value="{{old('description')}}" placeholder="Mô tả"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action" style="text-align: center">
                            <input type="submit" class=" btn btn-success " style="width: 200px; height: 50px;font-size: 18px" value="Create">
                        </div>
            
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function () {
	$('#choose-file').change(function () {
		var i = $(this).prev('label').clone();
		var file = $('#choose-file')[0].files[0].name;
		$(this).prev('label').text(file);
	}); 
 });
</script>

@endsection
