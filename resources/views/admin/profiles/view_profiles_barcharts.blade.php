<?php
    $current_year_male = date('Y');
    $current_year_female =date('Y');
    $last_year_male = date('Y',strtotime("-1 year"));
    $last_year_female =date('Y',strtotime("-1 year"));
    
    $dataPoints = array(
        // array("y" => $current_year_Male, "label" => "$last_to_last_year"),
        // array("y" => $last_month_profiles, "label" => "$last_year"),
        array("y" => $current_year_Male, "label" => "$current_year_male"),
        array("y" => $current_year_Female, "label" => "$current_year_female"),
        array("y" => $last_year_Male, "label" => "$last_year_male"),
        array("y" => $last_year_Female, "label" => "$last_year_female")
    );
?>

@extends('layouts.adminLayout.admin_design')
@section('content')

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Gender wise Population Reporting"
	},
	axisY: {
		title: "Gender"
	},
	data: [{
		type: "column",
        showInLegend: true,
		yValueFormatString: "#,##0.##",
        legendMarkerColor: "red",
        legendText: "Last 2 Years",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div id="content">
  <div id="content-header">
     <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Population</a> <a href="#" class="current">View Population</a> </div>
      <h1>Population</h1>    
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
          <div class="widget-title"> <span class="icon"><i class="icon-signal"></i></span>
            <h5>Population Reporting</h5>
            @if(Session::get('adminDetails')['profile_edit_access']==1)
            @endif
          </div>
          
          <div class="widget-content nopadding">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

            

@endsection