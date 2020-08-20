@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Profiles</a> <a href="#" class="current">Edit Profile</a> </div>
    <h1>Profiles</h1>
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
            <h5>Edit Profile</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-profile/'.$profileDetails->id) }}" name="edit_profile" id="edit_profile" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="person_name" id="person_name" value="{{ $profileDetails->person_name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Gender</label>
                <div class="controls">
                  <input type="text" name="gender" id="gender" value="{{ $profileDetails->gender }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Date of Birth</label>
                <div class="controls">
                  <input type="text" name="dob" id="dob" value="{{ $profileDetails->dob }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Father Name</label>
                <div class="controls">
                  <input type="text" name="fname" id="fname" value="{{ $profileDetails->fname }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Mother Name</label>
                <div class="controls">
                  <input type="text" name="mname" id="mname" value="{{ $profileDetails->mname }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Green Book Number</label>
                <div class="controls">
                  <input type="text" name="gbno" id="gbno" value="{{ $profileDetails->gbno }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">RC Number</label>
                <div class="controls">
                  <input type="text" name="rcno" id="rcno" value="{{ $profileDetails->rcno }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Passport Number</label>
                <div class="controls">
                  <input type="text" name="passportno" id="passportno" value="{{ $profileDetails->passportno }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Occupation</label>
                <div class="controls">
                  <select name="occupation_id" style="width: 220px;">  
                    <?php echo $occupations_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Sponsorship</label>
                <div class="controls">
                  <select name="sponsorship_id" style="width: 220px;">  
                    <?php echo $sponsorships_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Settlement</label>
                <div class="controls">
                  <select name="settlement_id" style="width: 220px;">  
                    <?php echo $settlements_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Group</label>
                <div class="controls">
                  <input type="text" name="person_group" id="person_group" value="{{ $profileDetails->person_group }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Profile Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  <input type="hidden" name="current_image" value="{{ $profileDetails->image }}">
                  @if(!empty($profileDetails->image))
                    <img style="width:50px;" src="{{ asset('/images/backend_images/profiles/small/'.$profileDetails->image) }}"> | <a href="{{ url('/admin/delete-profile-image/'.$profileDetails->id) }}">Delete</a>
                  @endif
                </div>
              </div>             
              
              <div class="form-actions">
                <input type="submit" value="Edit Profile" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection