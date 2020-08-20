@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
     <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Population</a> <a href="#" class="current">View Population</a> </div>
      <h1>Population<a class="btn btn-primary pull-right" href="{{ url('/admin/add-profile') }}">Add new employee</a></h1>    
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
  <div style="margin-left:20px;">
  <a href="{{ url('/admin/export-population') }}" class="btn btn-primary btn-mini">Export</a>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Person</h5>
            @if(Session::get('adminDetails')['profile_edit_access']==1)
            <div class="widget-title  pull-right"> <span class="icon"><i class="icon-th"></i></span>
            <h5> <a href="{{ url('/admin/add-profile') }}">Add new person</a></h5>
            </div>
            @endif
          </div>
          
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>DOB</th>
                  <!-- <th>Father</th>
                  <th>Mother</th>
                  <th>GB No</th>
                  <th>RC No</th> 
                  <th>Passport No</th> -->
                  <th>Occupation</th>
                  <th>Sponsorship</th>
                  <th>Settlement</th>
                  <th>Group</th>
                  <th>Profile Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              
              <tbody>
                @php 
                $i = 1;
                @endphp
              	@foreach($profiles as $profile)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $profile->person_name }}</td>
                  <td>{{ $profile->gender }}</td>
                  <td>{{ $profile->dob }}</td>
                  <!-- <td>{{ $profile->fname }}</td>
                  <td>{{ $profile->mname }}</td>
                  <td>{{ $profile->gbno }}</td>
                  <td>{{ $profile->rcno }}</td>
                  <td>{{ $profile->passportno }}</td> -->
                  <td>{{ $profile->occupation_name }}</td>
                  <td>{{ $profile->sponsorship_name }}</td>
                  <td>{{ $profile->settlement_name }}</td>
                  <td>{{ $profile->person_group }}</td>
                  <td>
                    @if(!empty($profile->image))
                        <img src="{{ asset('/images/backend_images/profiles/small/'.$profile->image) }}" style="width:30px">
                    @endif
                  </td>
                  <td class="center">
                    @if(Session::get('adminDetails')['profile_edit_access']==1)
                    <a href="{{ url('/admin/edit-profile/'.$profile->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                    @endif
                    <a href="#myModal{{ $profile->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a> 
                    @if(Session::get('adminDetails')['profile_full_access']==1)
                    <a rel="{{ $profile->id }}" rel1="delete-profile" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                    @endif
                    @if(Session::get('adminDetails')['profile_view_access']==1)
                    <a target = "_blank" href="{{ url('/admin/view-pdf-profile/'.$profile->id) }}" class="btn btn-primary btn-mini">PDF</a>
                    @endif
                  </td>
                </tr>
                    <div id="myModal{{ $profile->id }}" class="modal hide">
                        <div class="modal-header" style="padding:15px 50px;">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>{{ $profile->person_name }}'s Full Details</h3>
                        </div>
                        <div class="modal-body">
                            <p>Profile Picture: <img src="{{ asset('/images/backend_images/profiles/small/'.$profile->image) }}" style="width:70px"></p>
                            <p>Name: {{ $profile->person_name }}</p>
                            <p>Gender: {{ $profile->gender }}</p>
                            <p>Date of Birth: {{ $profile->dob }}</p>
                            <p>Father Name: {{ $profile->fname }}</p>
                            <p>Mother Name: {{ $profile->mname }}</p>
                            <p>GreenBook Number: {{ $profile->gbno }}</p>
                            <p>Registration Certificate Number: {{ $profile->rcno }}</p>
                            <p>Passport Number: {{ $profile->passportno }}</p>
                            <p>Occupation: {{ $profile->occupation_name }}</p>
                            <p>Sponsorship Name: {{ $profile->sponsorship_name }}</p>
                            <p>Settlement: {{ $profile->settlement_name }}</p>
                            <p>Group: {{ $profile->person_group}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
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