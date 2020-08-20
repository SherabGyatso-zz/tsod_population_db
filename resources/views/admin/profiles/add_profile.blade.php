@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Profiles</a> <a href="#" class="current">Add Profile</a> </div>
    <h1>Profiles</h1>
   
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Profile</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-profile') }}" name="add_profile" id="add_profile" novalidate="novalidate"> {{ csrf_field() }}

              <div class="control-group">
                  <label class="control-label">Name</label>
                  <div class="controls">
                    <input type="text" name="person_name" id="person_name">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Gender</label>
                      <div class="controls">
                        <select id ="gender" name="gender" style="width: 220px;">
                            <option value="Select Gender">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Other</option>
                        </select>
                      </div>
                </div>
              <div class="control-group">
                <label class="control-label">Date of Birth</label>
                <div class="controls">
                  <input type="date" name="dob" id="dob">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Father Name</label>
                <div class="controls">
                  <input type="text" name="fname" id="fname">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Mother Name</label>
                <div class="controls">
                  <input type="text" name="mname" id="mname">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Green Book Number</label>
                <div class="controls">
                  <input type="text" name="gbno" id="gbno">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">RC Number</label>
                <div class="controls">
                  <input type="text" name="rcno" id="rcno">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Passport Number</label>
                <div class="controls">
                  <input type="text" name="passportno" id="passportno">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Occupation</label>
                <div class="controls">
                  <select name="occupation_id">  
                    <?php echo $occupations_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Sponsorship</label>
                <div class="controls">
                  <select name="sponsorship_id">  
                    <?php echo $sponsorships_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Settlement</label>
                <div class="controls">
                  <select name="settlement_id">  
                    <?php echo $settlements_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Group</label>
                <div class="controls">
                  <input type="text" name="person_group" id="person_group">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Profile Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>             
              
              <div class="form-actions">
                <input type="submit" value="Add Profile" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection