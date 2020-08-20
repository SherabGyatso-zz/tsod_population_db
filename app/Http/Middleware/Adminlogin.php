<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Closure;
use Session;
use App\Admin;

class Adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(empty(Session::has('adminSession'))){
            return redirect('/admin');
        }else{
            // Get Admin/Sub Admin Details
            $adminDetails = Admin::where('username',Session::get('adminSession'))->first();
            $adminDetails = json_decode(json_encode($adminDetails),true);
            if($adminDetails['type']=="Admin"){
                $adminDetails['profile_view_access']=1;
                $adminDetails['profile_edit_access']=1;
                $adminDetails['profile_full_access']=1;
                $adminDetails['occupation_access']=1;
                $adminDetails['sponsorship_access']=1;
                $adminDetails['settlement_access']=1;
            }
            Session::put('adminDetails',$adminDetails);
            // echo "<pre>"; print_r(Session::get('adminDetails')); die;
            
            //Get Current Path
            $currentPath= Route::getFacadeRoot()->current()->uri();

            if($currentPath == "admin/view-profiles" && Session::get('adminDetails')['profile_view_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/add-profile" && Session::get('adminDetails')['profile_edit_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/view-occupations" && Session::get('adminDetails')['occupation_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/add-occupation" && Session::get('adminDetails')['occupation_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/view-sponsorships" && Session::get('adminDetails')['sponsorship_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/add-sponsorship" && Session::get('adminDetails')['sponsorship_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/view-settlements" && Session::get('adminDetails')['settlement_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/add-settlement" && Session::get('adminDetails')['settlement_access']==0){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/add-admin" && Session::get('adminDetails')['type']=="Sub Admin"){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
            if($currentPath == "admin/view-admins" && Session::get('adminDetails')['type']=="Sub Admin"){
                return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            }
        }
        return $next($request);
    }
}
