<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    @if(Session::get('adminDetails')['profile_full_access']==1)
    <li <?php if (preg_match("/profile/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-profiles') }}"><i class="icon icon-th-list"></i> <span>Population Management</span></a></li>
    @else 
      @if(Session::get('adminDetails')['profile_edit_access']==1 OR Session::get('adminDetails')['profile_view_access']==1)
      <li <?php if (preg_match("/profile/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-profiles') }}"><i class="icon icon-th-list"></i> <span>Population Management</span></a></li>  
      @endif
    @endif
    @if(Session::get('adminDetails')['type']=="Admin")
    <li class="submenu"> <a href="#"><i class="icon-user"></i> <span>Admin Management</span> <span class="label label-important"></span></a>
      <ul <?php if (preg_match("/admins/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-admins/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admins/create') }}"><i class="icon-user"></i> Add Admin</a></li>
        <li <?php if (preg_match("/view-admins/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-admins') }}"><i class="icon-user"></i> View Admin</a></li> 
        <li <?php if (preg_match("/population_reports/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/population_reports') }}"><i class="icon icon-signal"></i> Yearly report</a></li>
      </ul>
    </li>
    @endif
    @if(Session::get('adminDetails')['type']=="Admin")
    <?php 
      $base_profile_url = trim(basename($url));
    ?>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Population Charts Report</span> <span class="label label-important"></span></a>
      <ul <?php if (preg_match("/profile/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if ($base_profile_url=="view-profiles-charts"){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-profiles-charts') }}">Total Population</a></li>
        <li <?php if ($base_profile_url=="view-profiles-barcharts"){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-profiles-barcharts') }}">Gender Wise Population</a></li>
        <li <?php if ($base_profile_url=="view-profiles-groups-charts"){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-profiles-groups-charts') }}">Group Wise Population</a></li>
      </ul>
    </li>
    @endif
    @if(Session::get('adminDetails')['occupation_access']==1)
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Occupation</span> <span class="label label-important"></span></a>
      <ul <?php if (preg_match("/occupation/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-occupation/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-occupation') }}">Add Occupation</a></li>
        <li <?php if (preg_match("/view-occupations/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-occupations') }}">View Occupations</a></li>
      </ul>
    </li>
    @endif
    @if(Session::get('adminDetails')['sponsorship_access']==1)
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Sponsorship</span> <span class="label label-important"></span></a>
      <ul <?php if (preg_match("/sponsorship/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-sponsorship/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-sponsorship') }}">Add Sponsorship</a></li>
        <li <?php if (preg_match("/view-sponsorships/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-sponsorships') }}">View Sponsorships</a></li>
      </ul>
    </li>
    @endif
    @if(Session::get('adminDetails')['settlement_access']==1)
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Settlement</span> <span class="label label-important"></span></a>
      <ul <?php if (preg_match("/settlement/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-settlement/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-settlement') }}">Add Settlement</a></li>
        <li <?php if (preg_match("/view-settlements/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-settlements') }}">View Settlements</a></li>
      </ul>
    </li>
    @endif
  </ul>
</div>
<!--sidebar-menu-->