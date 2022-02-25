@extends('fontend.layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-primary" style="width: 150px;color: white">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Họ Tên</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập họ tên">
                                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="job">job</label>
                                        <select class="form-control form-control" id="job">
                                            <option>Chọn job</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="defaultSelect">level</label>
                                        <select class="form-control form-control" id="defaultSelect">
                                            <option>Chọn level</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cv">Tải CV lên</label><br>
                                        <input type="file" id="files" name="image[]" multiple />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">		
                                    <div class="form-group">
                                        <label for="priority">Status</label>
                                        <select class="form-control form-control" id="Status">
                                            <option>Chọn Status</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>		
                                    <div class="form-group">
                                        <label for="priority">Độ ưu tiên</label>
                                        <select class="form-control form-control" id="priority">
                                            <option>Chọn độ ưu tiên</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="start">Start</label>
                                        <input type="date" class="form-control" id="name" placeholder="Nhập ngày start">
                                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Deadline</label>
                                        <input type="date" class="form-control" id="name" placeholder="Nhập ngày deadline">
                                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group" >
                                        <label for="person-charge">Người phụ trách</label>
                                        <select class="form-control form-control" multiple="multiple" id="person-charge" style="height: 20px ">
                                            <option>Chọn người phụ trách</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>5</option>
                                            <option>5</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Phòng ban</label>
                                        <select class="form-control form-control" multiple="multiple" id="department">
                                            <option>Chọn phòng ban</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả</label>
                                        <textarea name="" id="" cols="40" rows="3" style="width: 350px;" placeholder="Nhập nội dung mô tả"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action" style="text-align: center">
                            <button class=" btn btn-success " style="width: 200px; height: 50px;">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
