<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Exports\profilesExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Session;
use Image;
use Request;
use App\Occupation;
use App\Sponsorship;
use App\Settlement;
use App\Profile;
use Dompdf\Dompdf;
use Carbon\Carbon;

class ProfilesController extends Controller
{
    public function addProfile(Request $request){

    	if(Request::isMethod('post')){
    		$data = Request::all();
    		// echo "<pre>"; print_r($data); die;
            // if(empty($data['occupation_id'])){
            //     return redirect()->back()->with('flash_message_error','Occpation is missing!');  
            // }elseif(empty($data['sponsorship_id'])){
            //     return redirect()->back()->with('flash_message_error','Sponosorship is missing!');  
            // }elseif(empty($data['settlement_id'])){
            //     return redirect()->back()->with('flash_message_error','Settlement is missing!'); 
            // }
            
    		$profile = new Profile;
            $profile->person_name = $data['person_name'];
    		$profile->gender = $data['gender'];
    		$profile->dob = $data['dob'];
    		$profile->fname = $data['fname'];
            $profile->mname = $data['mname'];
            $profile->gbno = $data['gbno'];
            $profile->rcno = $data['rcno'];
            $profile->passportno = $data['passportno'];
            $profile->occupation_id = $data['occupation_id'];
            $profile->sponsorship_id = $data['sponsorship_id'];
            $profile->settlement_id = $data['settlement_id'];
            if(empty($data['person_group'])){
                $profile->person_group = "0";   
            }else{
                $profile->person_group = $data['person_group'];
            }
            //Upload Image
            if(Request::hasFile('image')){
                $image_tmp = Request::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    // $large_image_path = 'images/backend_images/profiles/large/'.$filename;
                    // $medium_image_path = 'images/backend_images/profiles/medium/'.$filename;
                    $small_image_path = 'images/backend_images/profiles/small/'.$filename;
                    //Resize Images
                    // Image::make($image_tmp)->save($large_image_path);
                    // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    // Store image name in product table
                    $profile->image = $filename;
                }
            }

            
            $profile->save();
            return redirect('/admin/view-profiles')->with('flash_message_success','Profile has been added successfully!');
    	}

        //Occupation drop down start
        $occupations = occupation::where(['parent_id'=>0])->get();
    	$occupations_dropdown = "<option value ='0' selected disable>Select</opton>";
    	foreach ($occupations as $occu) {
    		$occupations_dropdown .= "<option value='".$occu->id."'>".$occu->name."</option>";
    	}
        //Occupation drop down ends

        //Sponsorship drop down start
        $sponsorships = sponsorship::where(['parent_id'=>0])->get();
    	$sponsorships_dropdown = "<option value ='0' selected disable>Select</opton>";
    	foreach ($sponsorships as $sponsor) {
    		$sponsorships_dropdown .= "<option value='".$sponsor->id."'>".$sponsor->name."</option>";
        }
        //Sponsorship drop down ends

        //Sponsorship drop down start
        $settlements = settlement::where(['parent_id'=>0])->get();
    	$settlements_dropdown = "<option value ='0' selected disable>Select</opton>";
    	foreach ($settlements as $settlement) {
    		$settlements_dropdown .= "<option value='".$settlement->id."'>".$settlement->name."</option>";
        }
        //Sponsorship drop down ends
    	return view('admin.profiles.add_profile')->with(compact('occupations_dropdown','sponsorships_dropdown','settlements_dropdown'));
    }

    public function editProfile(Request $request, $id=null){
        if(Session::get('adminDetails')['profile_edit_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        if(Request::isMethod('post')){
            $data = Request::all();
            // echo "<pre>"; print_r($data); die;

             //Upload Image
            if(Request::hasFile('image')){
                $image_tmp = Request::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    // $large_image_path = 'images/backend_images/profiles/large/'.$filename;
                    // $medium_image_path = 'images/backend_images/profiles/medium/'.$filename;
                    $small_image_path = 'images/backend_images/profiles/small/'.$filename;
                    //Resize Images
                    // Image::make($image_tmp)->save($large_image_path);
                    // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            }else{
                $filename = $data['current_image'];
            }


            Profile::where(['id'=>$id])->update(['occupation_id'=>$data['occupation_id'],'sponsorship_id'=>$data['sponsorship_id'],'settlement_id'=>$data['settlement_id'],'person_name'=>$data['person_name'],'gender'=>$data['gender'],'dob'=>$data['dob'],'fname'=>$data['fname'],'mname'=>$data['mname'],'gbno'=>$data['gbno'],'rcno'=>$data['rcno'],'passportno'=>$data['passportno'],'person_group'=>$data['person_group'],'image'=>$filename]);
            return redirect('/admin/view-profiles')->with('flash_message_success','Profile has been updated successfully!');
        }
        //Get Profile Details
        $profileDetails = Profile::where(['id'=>$id])->first();

        //Occupation drop down start
        $occupations = occupation::where(['parent_id'=>0])->get();
        $occupations_dropdown = "<option value ='0' selected disable>Select</opton>";
        foreach ($occupations as $occu) {
            if($occu->id==$profileDetails->occupation_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $occupations_dropdown .= "<option value='".$occu->id."' ".$selected.">".$occu->name."</option>";
        }
        //Occupation drop down ends

        //Sponsorship drop down start
        $sponsorships = sponsorship::where(['parent_id'=>0])->get();
        $sponsorships_dropdown = "<option value ='0' selected disable>Select</opton>";
        foreach ($sponsorships as $sponsor) {
            if($sponsor->id==$profileDetails->sponsorship_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $sponsorships_dropdown .= "<option value='".$sponsor->id."' ".$selected.">".$sponsor->name."</option>";
        }
        //Sponsorship drop down ends

        //Settlement drop down start
        $settlements = settlement::where(['parent_id'=>0])->get();
        $settlements_dropdown = "<option value ='0' selected disable>Select</opton>";
        foreach ($settlements as $settlement) {
            if($settlement->id==$profileDetails->settlement_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $settlements_dropdown .= "<option value='".$settlement->id."' ".$selected.">".$settlement->name."</option>";
        }
        //Settlement drop down ends
        return view('admin.profiles.edit_profile')->with(compact('profileDetails','occupations_dropdown','sponsorships_dropdown','settlements_dropdown'));
    }

    public function viewProfiles(){
        if(Session::get('adminDetails')['profile_view_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        //$profiles = Profile::get();
        $profiles = DB::table('profiles')
        ->leftJoin('occupations', 'profiles.occupation_id', '=', 'occupations.id')
        ->leftJoin('sponsorships', 'profiles.sponsorship_id', '=', 'sponsorships.id')
        ->leftJoin('settlements', 'profiles.settlement_id', '=', 'settlements.id')
        ->select('profiles.*', 'occupations.name as occupation_name', 'sponsorships.name as sponsorship_name', 'settlements.name as settlement_name')
        ->orderby('person_name');
        $profiles = $profiles->get();
        return view('admin.profiles/view_profiles', ['profiles' => $profiles]);
        // $profiles = json_decode(json_encode($profiles));
        // foreach($profiles as $key => $val){
        //     $occupation_name = Occupation::where(['id'=>$val->occupation_id])->first();
        //     $profiles[$key]->occupation_name = $occupation_name->name;
        // }
        // echo "<pre>"; print_r($profiles); die;
        // return view('admin.profiles.view_profiles')->with(compact('profiles'));
    }

    public function deleteProfile($id = null){
        if(Session::get('adminDetails')['profile_full_access']==0){
            return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
        }
        Profile::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Profile has been deleted successfully!');
    }

    public function deleteProfileImage($id = null){

        //Get Profile Image Name
        $profileImage = Profile::where(['id'=>$id])->first();

        //Get Profile Image Paths
        $small_image_path = 'images/backend_images/profiles/small/';

        //Delete small Image if exist in folder
        if(file_exists($small_image_path.$profileImage->image)){
            unlink($small_image_path.$profileImage->image);
        }
        Profile::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success','Profile Image has been deleted successfully!');
    }

    public function exportPopulation(){
        return Excel::download(new profilesExport,'population.xlsx');
    }

    public function viewProfilesCharts(){
        $current_month_profiles = Profile::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_profiles = Profile::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $last_to_last_month_profiles = Profile::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->count();
        return view('admin.profiles.view_profiles_charts')->with(compact('current_month_profiles','last_month_profiles','last_to_last_month_profiles'));
    }
    public function viewProfilesbarCharts(){
        $current_year_Male = Profile::whereYear('created_at', Carbon::now()->year)->whereGender('M')->count();
        $current_year_Female = Profile::whereYear('created_at', Carbon::now()->year)->whereGender('F')->count();
        $last_year_Male = Profile::whereYear('created_at', Carbon::now()->subyear(1))->whereGender('M')->count();
        $last_year_Female = Profile::whereYear('created_at', Carbon::now()->subyear(1))->whereGender('F')->count();
        return view('admin.profiles.view_profiles_barcharts')->with(compact('current_year_Male','current_year_Female','last_year_Male','last_year_Female'));
    }

    public function viewProfilesGroupsbarCharts(){
       
        $getPersongroups = Profile::select('person_group',DB::raw('count(person_group) as count'))
        ->groupBy('person_group')->get();
        $getPersongroups = json_decode(json_encode($getPersongroups),true);
        // echo "<pre>"; print_r($getPersongroups); die;
        // echo $getPersongroups[0]['person_group']; die;
        return view('admin.profiles.view_profiles_groups_charts')->with(compact('getPersongroups'));
    }
}
