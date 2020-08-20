<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Occupation;

class OccupationController extends Controller
{
    public function addOccupation(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		$occupation = new Occupation;
    		$occupation->name = $data['occupation_name'];
    		$occupation->save();
    		return redirect('/admin/view-occupations')->with('flash_message_success','Occupation Added Successfully!');
    	}
    	return view('admin.occupations.add_occupation');
    }

    public function editOccupation(Request $request, $id = null){
        if(Session::get('adminDetails')['occupation_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Occupation::where(['id'=>$id])->update(['name'=>$data['occupation_name']]);
            return redirect('/admin/view-occupations')->with('flash_message_success','Occupation updated Successfully!');
        }
        $occupationDetails = Occupation::where(['id'=>$id])->first();
        return view('admin.occupations.edit_occupation')->with(compact('occupationDetails'));
    }

    public function deleteOccupation($id = null){
        if(Session::get('adminDetails')['occupation_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if(!empty($id)){
            Occupation::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Occupation deleted Successfully!');
        }
    }

    public function viewOccupations(){
    	$occupations = Occupation::get();
    	return view('admin.occupations.view_occupations')->with(compact('occupations'));
    }
}
