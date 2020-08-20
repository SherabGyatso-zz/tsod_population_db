@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Occupations</a> <a href="#" class="current">Add Occupation</a> </div>
    <h1>Occupations</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Occupation</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-occupation') }}" name="add_occupation" id="add_occupation" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Occupation Name</label>
                <div class="controls">
                  <input type="text" name="occupation_name" id="occupation_name">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Occupation" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection