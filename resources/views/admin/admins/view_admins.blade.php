@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
     <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Admins</a> <a href="#" class="current">View Adminss</a> </div>
      <h1>Admins</h1>
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
            <h5>View Admins</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>User Name</th>
                  <th>Type</th>
                  <th>Roles</th>
                  <th>Status</th>
                  <th>Date Updated</th>
                  <th>Date Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              
              <tbody>
                @php 
                $i = 1;
                @endphp
                @foreach($admins as $admin)
                <?php if($admin->type=="Admin"){
                  $roles ="All";
                }else{
                  $roles = "";
                  if($admin->profile_view_access==1){
                    $roles .= "View, ";
                  }
                  if($admin->profile_edit_access==1){
                    $roles .= "Edit, ";
                  }
                  if($admin->profile_full_access==1){
                    $roles .= "Delete ";
                  }
                  if($admin->occupation_access==1){
                    $roles .= "Occupation, ";
                  }
                  if($admin->sponsorship_access==1){
                    $roles .= "Sponsorship, ";
                  }
                  if($admin->settlement_access==1){
                    $roles .= "Settlement ";
                  }
                  if($roles ==""){
                    $roles .= "No Access";
                  }
                }
                ?>
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $admin->username }}</td>
                  <td>{{ $admin->type}}</td>
                  <td>{{ $roles}}
                  <td>
                      @if($admin->status==1)
                        <span style="color:green">Active</span>
                    @else
                        <span style="color:red">Inacitve</span>
                    @endif
                  </td>
                  <td>{{ $admin->created_at }}</td>
                  <td>{{ $admin->updated_at }}</td>
                  <td> <a href="{{ url('/admin/edit-admin/'.$admin->id) }}" class="btn btn-primary btn-mini">Edit</a></td>
                  <td class="center">

                  </td>
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