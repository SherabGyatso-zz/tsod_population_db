@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Admin</a> <a href="#" class="current">Add Admin</a> </div>
    <h1>Admin</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Admin</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-admin/'.$adminDetails->id) }}" name="edit_admin" id="edit_admin" novalidate="novalidate"> {{ csrf_field() }}
            <div class="control-group">
                <label class="control-label">Type</label>
                <div class="controls">
                  <input type="type" name="type" id="type" readonly="" value="{{ $adminDetails->type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">User Name</label>
                <div class="controls">
                  <input type="text" name="username" id="username" readonly="" value="{{ $adminDetails->username }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="password" required="">      
                </div>
              </div>
              <div class="form-group">
              @if($adminDetails->type=="Sub Admin")
              <div class="control-group">
                <label class="control-label">Access</label>
                <div class="controls">
                      <input type="checkbox" name="profile_view_access" id="profile_view_access" value="1"
                        @if($adminDetails->profile_view_access == "1") checked @endif>&nbsp;View Profiles Only&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="profile_edit_access" id="profile_edit_access" value="1"
                        @if($adminDetails->profile_edit_access == "1") checked @endif>&nbsp;View and Edit Profiles&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="profile_full_access" id="profile_full_access" value="1"
                        @if($adminDetails->profile_full_access == "1") checked @endif>&nbsp;View, Edit and Delete Profiles&nbsp;&nbsp;&nbsp;<br>
                      <input type="checkbox" name="occupation_access" id="occupation_access" value="1"
                        @if($adminDetails->occupation_access == "1") checked @endif>&nbsp;Occupation&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="sponsorship_access" id="sponsorship_access" value="1"
                        @if($adminDetails->sponsorship_access == "1") checked @endif>&nbsp;Sponsorship&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="settlement_access" id="settlement_access" value="1"
                        @if($adminDetails->settlement_access == "1") checked @endif>&nbsp;Settlement&nbsp;&nbsp;&nbsp;
                </div>
              </div>
              @endif
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                      <input type="checkbox" name="status" id="status" value="1"
                        @if($adminDetails->status == "1") checked @endif> 
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Admin" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection