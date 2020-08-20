@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
     <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Occupations</a> <a href="#" class="current">View Occupations</a> </div>
      <h1>Occupations</h1>
      @if(Session::has('flash_message_error')) 
          <div class="alert alert-error alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{!! session('flash_message_error') !!}</strong>
          </div>
      @endif
      @if(Session::has('flash_message_success')) 
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{!! session('flash_message_success') !!}</strong>
          </div>
      @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Occupations</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Occupation Id</th>
                  <th>Occupation Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @php
                $i = 1;
              @endphp
              	@foreach($occupations as $occupation)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $occupation->id }}</td>
                  <td>{{ $occupation->name }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-occupation/'.$occupation->id) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a rel="{{ $occupation->id }}" rel1="delete-occupation" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                </tr>
                @php
                  $i++;
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection