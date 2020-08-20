<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use Session;

class SponsorshipController extends Controller
{
    public function addSponsorship(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		$sponsorship = new Sponsorship;
    		$sponsorship->name = $data['sponsorship_name'];
    		$sponsorship->save();
    		return redirect('/admin/view-sponsorships')->with('flash_message_success','Sponsorship Added Successfully!');
    	}
    	return view('admin.sponsorships.add_sponsorship');
    }

    public function editSponsorship(Request $request, $id = null){
        if(Session::get('adminDetails')['sponsorship_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Sponsorship::where(['id'=>$id])->update(['name'=>$data['sponsorship_name']]);
            return redirect('/admin/view-sponsorships')->with('flash_message_success','Sponsorship updated Successfully!');
        }
        $sponsorshipDetails = Sponsorship::where(['id'=>$id])->first();
        return view('admin.sponsorships.edit_sponsorship')->with(compact('sponsorshipDetails'));
    }

    public function deleteSponsorship($id = null){
        if(Session::get('adminDetails')['sponsorship_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if(!empty($id)){
            Sponsorship::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Sponsorship deleted Successfully!');
        }
    }

    public function viewSponsorships(){
    	$sponsorships = Sponsorship::get();
    	return view('admin.sponsorships.view_sponsorships')->with(compact('sponsorships'));
    }
}
