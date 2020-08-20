<?php

namespace App\Exports;

use App\Profile;
use App\Occupation;
use App\Sponsorship;
use App\Settlement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class profilesExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   
        // $profilesData = Profile::where('gender','M')->orderBy('person_name','Desc')->get();
        // return $profilesData;
        $profileData = Profile::select('person_name','gender','dob','fname','mname','gbno','rcno','passportno','occupation_id','sponsorship_id','settlement_id','person_group')->orderBy('person_name','Asc')->get();
        foreach($profileData as $key => $profile){
            $occuName = Occupation::select('name')->where('id',$profile->occupation_id)->first();
            //dd($occuName);
            $profileData[$key]->occupation_id = $occuName['name'];
        }
        foreach($profileData as $key => $profile){
            $sponsName = Sponsorship::select('name')->where('id',$profile->sponsorship_id)->first();
            $profileData[$key]->sponsorship_id = $sponsName['name'];
        }
        foreach($profileData as $key => $profile){
            $settName = Settlement::select('name')->where('id',$profile->settlement_id)->first();
            $profileData[$key]->settlement_id = $settName['name'];
        }
        return $profileData;
    }

    public function headings(): array{
        return ['Name','Gender','Date Birth','Father Name','Mother Name','GB Number','RC Number','Passport Number','Occupation','Sponsorship','Settlement','Group'];
    }
}
