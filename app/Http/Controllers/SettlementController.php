<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settlement;
use Session;

class SettlementController extends Controller
{
    public function addSettlement(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		$settlement = new Settlement;
    		$settlement->name = $data['settlement_name'];
    		$settlement->save();
    		return redirect('/admin/view-settlements')->with('flash_message_success','Settlement Added Successfully!');
    	}
    	return view('admin.settlements.add_settlement');
    }

    public function editSettlement(Request $request, $id = null){
        if(Session::get('adminDetails')['settlement_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Settlement::where(['id'=>$id])->update(['name'=>$data['settlement_name']]);
            return redirect('/admin/view-settlements')->with('flash_message_success','Settlement updated Successfully!');
        }
        $settlementDetails = Settlement::where(['id'=>$id])->first();
        return view('admin.settlements.edit_settlement')->with(compact('settlementDetails'));
    }

    public function deleteSettlement($id = null){
        if(Session::get('adminDetails')['settlement_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if(!empty($id)){
            Settlement::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Settlement deleted Successfully!');
        }
    }

     public function viewSettlements(){
    	$settlements = Settlement::get();
    	return view('admin.settlements.view_settlements')->with(compact('settlements'));
    }
}
