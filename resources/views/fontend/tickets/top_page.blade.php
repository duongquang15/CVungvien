@extends('fontend.layouts.master')
@section('title')
 {{$department_name}}
@endsection

@section('content')
<div class="adminx-content">
  @if (session('status'))
        <div class="alert alert-primary">
            {{session('status')}}
        </div>
        @endif
    <div class="adminx-main-content">
      <div class="container-fluid">
        <div class="pb-3" style="margin-top: 16px;">
          <h2>{{$department_name}}</h2>
        </div>
        <div class="row">
          <div class="col">
            <div class="box-export-excel">

              @if (Auth::user()->role->id == 3)
              <a href="{{route('create')}}" class="btn btn-success">CREATE TICKET</a>

              {{-- <form action="{{route('export_excel')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">EXPORT CSV/EXCEL</a>
              </form> --}}

              @endif

            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col">
            <div class="card mb-grid">
              <div class="table-responsive-md">
                @include('fontend.tickets.ticket_table')
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="box-export-excel">

              @if (Auth::user()->role->id == 3)
               <form action="{{route('export_excel', ['id' => $department_id])}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success">EXPORT CSV/EXCEL</a>
              </form> 
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection