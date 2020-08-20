@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
     <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Population</a> <a href="#" class="current">View Population</a> </div>
      <h1>Population Reports</h1>    
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
            <h5>Year Wise total Male and Female</h5>
          </div>
          {!! Form::open(['method' => 'get']) !!}
          <div class="row">
            <div class="col-xs-1 col-md-1 form-group">
                {!! Form::label('year','Year',['class' => 'control-label']) !!}
                {!! Form::select('y', array_combine(range(date("Y"), 2015), range(date("Y"), 2015)), old('y', Request::get('y', date('Y'))), ['class' => 'form-control']) !!}
            </div>

            <!-- <div class="col-xs-2 col-md-2 form-group">
                {!! Form::label('month','Month',['class' => 'control-label']) !!}
                {!! Form::select('m', cal_info(0)['months'], old('m', Request::get('m', date('m'))), ['class' => 'form-control']) !!}
            </div> -->
            <div class="col-xs-2">
                <label class="control-label">&nbsp;</label><br>
                {!! Form::submit('Select Year',['class' => 'btn btn-primary']) !!}
            </div>
        </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Total Male</th>
                  <th>Total Female</th>
                </tr>
              </thead>
              
              <tbody>
                @php 
                $i = 1;
                @endphp
    
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $totalmales }}</td>
                  <td>{{ $totalfemales }}</td>
                </tr>  
                @php 
                    $i++;
                @endphp
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

            

@endsection