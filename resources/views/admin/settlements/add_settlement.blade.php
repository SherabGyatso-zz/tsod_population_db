@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Settlements</a> <a href="#" class="current">Add Settlement</a> </div>
    <h1>Settlements</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Settlement</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-settlement') }}" name="add_settlement" id="add_settlement" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Settlement Name</label>
                <div class="controls">
                  <input type="text" name="settlement_name" id="settlement_name">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Settlement" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection