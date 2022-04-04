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
        @if (session('status'))
        <!-- Button trigger modal -->
            <button type="button" id="btn_open_dialog" class="btn btn-primary" data-toggle="modal" hidden data-target="#staticBackdrop">
                Launch static backdrop modal
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update thành công</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true">&times;</span> --}}
                    </button>
                    </div>
                    <div>
                        <img src="https://cdn.pixabay.com/photo/2017/04/08/18/17/correct-2214020_960_720.png" alt="" style="width: 120px; height: 120px; margin-left: 200px">
                    </div>
                    <div class="modal-footer">
                    <a href="{{route('detail-ticket',$ticket->id)}}" class="btn btn-secondary" >ok</a>
                    </div>
                </div>
                </div>
            </div>
        @endif
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('update-ticket',$ticket->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="card">
                        <div class="card-header">
                            <a  href="{{route('detail-ticket',$ticket->id)}}" class=" btn btn-primary " style="width: 200px; height: 50px;font-size: 18px; line-height: 40px" >Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" value="{{$ticket->name}}" placeholder="Họ tên" maxlength="255">
                                        @error('name')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2" name="job" id="job" >
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
                                        <select class="form-control form-control select2" name="level" id="level">
                                            @foreach ($level_by_job as $key => $item)
                                                <option  <?php if($ticket_level->name == $item['name']) echo "selected" ?> value="{{ $item['id']}}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('level')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="choose-file" class="custom-file-upload" id="choose-file-label cv" >
                                            UPLAOD CV
                                         </label>
                                         <input name="file" type="file" id="choose-file"  
                                            accept=".jpg,.jpeg,.pdf,doc,docx,application/msword,.png" style="display: none"/>
                                            <span id="img"></span>
                                        @error('file')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">		
                                    <div class="form-group">
                                        <select class="form-control form-control select2" name="status" id="Status" >
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
                                        <select class="form-control form-control select2" name="priority" id="priority">
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
                                        <input type="date" class="form-control" name="date-start" id="date-start" value="{{old('date-start',$ticket->start)}}" placeholder="Start">
                                        @error('date-start')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date-deadline" id="date-deadline" value="{{old('date-deadline',$ticket->deadline)}}" placeholder="Deadline">
                                        @error('date-deadline')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group" >
                                        <select class="form-control select2" multiple="multiple" name="person_charge[]" id="person-charge" >
                                            <option>Người phụ trách</option>
                                            @if(isset($user_assigns))
                                            @foreach($user as $user_assign)
                                                <option value="{{ $user_assign->id }}" {{ in_array($user_assign->id, $ticket->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user_assign->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2" multiple="multiple" name="department[]" id="department" >
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
                                        <textarea class="form-control" name="description" id="" cols="40" rows="3" style="width: 436px;" name="description"  value="{{old('description')}}" placeholder="Mô tả">{{$ticket->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action" style="text-align: center">
                            <input type="submit" class=" btn btn-success " style="width: 200px; height: 50px;font-size: 18px" value="UPDATE">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

  <script>
    $(document).ready(function () {
	$('#choose-file').change(function () {
		var i = $(this).prev('label').clone();
		var file = $('#choose-file')[0].files[0].name;
		$(this).prev('label').text(file);
	}); 
 });
</script>
<script>
    window.onload = function(){
      document.getElementById('btn_open_dialog').click();
    }
    </script>
    <script>
        $(document).ready(function () {
        $('#choose-file').change(function () {
            var i = $(this).prev('label').clone();
            var file = $('#choose-file')[0].files[0].name;
            var img ='';
            img ='<img id="delete-img" src="https://cdn.pixabay.com/photo/2017/02/12/21/29/false-2061132_960_720.png" style="width: 20px; height: 20px;">';
            $(this).prev('label').text(file);
            $("#img").html(img);
        }); 
    
         $("#img").click(function(){
            document.getElementById('choose-file').value = "";
            console.log('hhrr');
            ds = 'UPLOAD CV';
            $('#choose-file').prev().text(ds);
            $("#img").html('');
        }); 
       
    
     });
    </script>
@endsection
