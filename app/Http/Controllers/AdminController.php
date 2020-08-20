<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Auth;
use Session;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $adminCount = Admin::where(['username' => $data['username'],'password'=>md5($data['password']),'status'=>1])->count();
            if($adminCount > 0){
            //if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                // echo "Success"; die;
                Session::put('adminSession',$data['username']);
                return redirect('/admin/dashboard');
            }else{
                // echo "Failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        // if(Session::has('adminSession')){
        //     //Perform all dashboard tasks
        // }else{
        //     return redirect('/admin')->with('flash_message_error','Please login to access');
        // }
        return view('admin.dashboard');
    }

    public function settings(){
        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
        // echo "<pre>"; print_r($adminDetails); die;
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $adminCount = Admin::where(['username' =>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
        // echo Session::get('adminSession'); die;
        // echo $adminCount; die;
        if ($adminCount == 1) {
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
            if ($adminCount == 1) {
                $password = md5($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!'); 
            }
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfuly');
    }

    public function viewAdmins(){
        $admins = Admin::get();
        // $admin = json_decode(json_encode($admin));
        // echo "<pre>"; print_r($admin); die;
        return view('admin.admins.view_admins')->with(compact('admins'));
    }

    public function addAdmin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $adminCount = Admin::where('username',$data['username'])->count();
            //echo "<pre>"; print_r($adminCount); die;
            if($adminCount>0){
                return redirect()->back()->with('flash_message_error','Admin / Sub Admin already exists! Please choose another.');
            }else{
                if(empty($data['status'])){
                    $data['status'] = 0;
                }
                if($data['type']=="Admin"){
                $admin = new Admin;
                $admin->type = $data['type'];
                $admin->username = $data['username'];
                $admin->password = md5($data['password']);
                $admin->status = $data['status'];
                $admin->profile_view_access=1;
                $admin->profile_edit_access=1;
                $admin->profile_full_access=1;
                $admin->save();
                return redirect('/admin/view-admins')->with('flash_message_success','Admin  Added Successfully!');
                }else if($data['type']=="Sub Admin"){
                    if(empty($data['occupation_access'])){
                        $data['occupation_access'] = 0;
                    }
                    if(empty($data['sponsorship_access'])){
                        $data['sponsorship_access'] = 0;
                    }
                    if(empty($data['settlement_access'])){
                        $data['settlement_access'] = 0;
                    }
                    if(empty($data['profile_view_access'])){
                        $data['profile_view_access'] = 0;
                    }
                    if(empty($data['profile_edit_access'])){
                        $data['profile_edit_access'] = 0;
                    }
                    if(empty($data['profile_full_access'])){
                        $data['profile_full_access'] = 0;
                    }else{
                        if($data['profile_full_access']==1){
                            $data['profile_view_access']= 1;
                            $data['profile_edit_access'] = 1;
                        }
                    }
                    $admin = new Admin;
                    $admin->type = $data['type'];
                    $admin->username = $data['username'];
                    $admin->password = md5($data['password']);
                    $admin->status = $data['status'];
                    $admin->profile_view_access = $data['profile_view_access'];
                    $admin->profile_edit_access = $data['profile_edit_access'];
                    $admin->profile_full_access = $data['profile_full_access'];
                    $admin->occupation_access = $data['occupation_access'];
                    $admin->sponsorship_access = $data['sponsorship_access'];
                    $admin->settlement_access = $data['settlement_access'];
                    $admin->save();
                    return redirect('/admin/view-admins')->with('flash_message_success','Sub Admin  Added Successfully!');
                }
            }
        }
        return view('admin.admins.add_admin');
    }

    public function editAdmin(Request $request, $id){
        if(Session::get('adminDetails')['type']=="Sub Admin"){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        $adminDetails = Admin::where('id',$id)->first();
        // $adminDetails = json_decode(json_encode($adminDetails));
        // echo "<pre>"; print_r($adminDetails); die;
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            if($data['type']=="Admin"){
                Admin::where('username',$data['username'])->update(['password'=>md5($data['password']),'status'=>$data['status']]);
                return redirect('/admin/view-admins')->with('flash_message_success','Admin  Updated Successfully!');
            }else if($data['type']=="Sub Admin"){
                if(empty($data['occupation_access'])){
                    $data['occupation_access'] = 0;
                }
                if(empty($data['sponsorship_access'])){
                    $data['sponsorship_access'] = 0;
                }
                if(empty($data['settlement_access'])){ 
                    $data['settlement_access'] = 0;
                }
                if(empty($data['profile_view_access'])){
                    $data['profile_view_access'] = 0;
                }
                if(empty($data['profile_edit_access'])){
                    $data['profile_edit_access'] = 0;
                }
                if(empty($data['profile_full_access'])){
                    $data['profile_full_access'] = 0;
                }else{
                    if($data['profile_full_access']==1){
                        $data['profile_view_access']= 1;
                        $data['profile_edit_access'] = 1;
                    }

                }
                Admin::where('username',$data['username'])->update(['password'=>md5($data['password']),'status'=>$data['status'],'occupation_access'=>$data['occupation_access'],'sponsorship_access'=>$data['sponsorship_access'],'settlement_access'=>$data['settlement_access'],'profile_view_access'=>$data['profile_view_access'],'profile_edit_access'=>$data['profile_edit_access'],'profile_full_access'=>$data['profile_full_access']]);
                return redirect('/admin/view-admins')->with('flash_message_success','Sub Admin  Updated Successfully!');
            }


        }
        return view('admin.admins.edit_admin')->with(compact('adminDetails'));
    }
}