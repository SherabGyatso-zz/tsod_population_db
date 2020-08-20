@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sponsorships</a> <a href="#" class="current">Edit Sponsorship</a> </div>
    <h1>Sponsorships</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Sponsorship</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-sponsorship/'.$sponsorshipDetails->id) }}" name="edit_sponsorship" id="edit_sponsorship" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Sponsorship Name</label>
                <div class="controls">
                  <input type="text" name="sponsorship_name" id="sponsorship_name" value="{{ $sponsorshipDetails->name }}">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Sponsorship" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection