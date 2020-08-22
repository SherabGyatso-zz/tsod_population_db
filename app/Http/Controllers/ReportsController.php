<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Exports\profilesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Image;
use App\Profile;
use App\Occupation;
use App\Sponsorship;
use App\Settlement;
use Carbon\Carbon;



class ReportsController extends Controller
{
    //
    public function index(Request $request)
    {
        $from    = Carbon::parse(sprintf(
            '%s-%s-01',
            $request->query('y', Carbon::now()->year),
            $request->query('m', Carbon::now()->month)
        ));

       
        $from_year = $from->year;
    
        if(Session::get('adminDetails')['profile_view_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
     
        
        $profiles = DB::table('profiles');
        $profiles = $profiles->get();
        $males = $profiles->where('gender', 'M')
            ->where('created_at', '=', $from_year);
        $totalmales = $males->count();
        $females = $profiles->where('gender', 'F')
            ->where('created_at', '=', $from_year);
        $totalfemales = $females->count();
        $from_month = $from->month;

        return view('admin.profiles/population_reports',['profiles' => $profiles], compact('totalmales','totalfemales','from_month'
        ));
    }
}