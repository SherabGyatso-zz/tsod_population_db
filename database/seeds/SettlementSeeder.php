<?php

use Illuminate\Database\Seeder;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $settlementNames = array(
            'BIR',
            'CHAUNTRA',
            'CLEMEN TOWN',
            'DALHOUSIE',
            'DEHRADUN',
            'DEKYILING',
            'DHOLANJI',
            'GONDIA',
            'GOPALPUR',
            'KULLU',
            'HUNSUR',
            'KANGRA',
            'KOLLEGAL',
            'CHOGLAMSAR',
            'LAKHANWALA',
            'MAINPAT',
            'MANALI',
            'MANDI',
            'MIAO',
            'MUNDGOD',
            'MUSSOORIE',
            'NAINITAL',
            'OOTY',
            'PANDOH',
            'PAONTA SAHIB',
            'PATHLIKUL',
            'PURUWALA',
            'RAJPUR',
            'RAVANGLA',
            'SAHARANPUR',
            'SATAUN',
            'SHILLONG',
            'SHIMLA',
            'SIRMOUR',
            'SOLAN',
            'SUJA',
            'TASHI JONG',
            'TENZIN GANG',
            'TEZU',
            'TUTING',
            'VARANASI',
            'CHENNAI',
            'DARJEELING',
            'GANGTOK',
            'KALIMPONG',
            'HENLEY - LADAKH',
            'MANDUWALA',
            'MUSSOORIE',
            'MYSORE',
            'PRATAPGARH',
            'SUNDER NAGAR',
            'NILGIRIS',
            'TAWANG',
            'TINDOLING',
            'CHAMUNDA',
            'MUMBAI',
            'GURGAON',
            'DHARAMSALA CANTT',
            'CHANDIGARH',
            'VADODARA',
            'MANGALORE',
            'BODH GAYA',
            'AMBALA',
            'HYDERABAD',
            'SALUGARA',
            'SANJOULI',
            'CHANGLANG',
            'CHANDAGIRI',
            'CHAMRAJNANAGAR',
            'CHAMBA',
            'PHUNTSOKLING',
            'SARNATH',
            'KAMRAO',
            'NAGALAND',
            'KOLKATA',
            'BHOPAL',
            'PUNE',
            'PUNDUCHERRY',
            'KATHMANDU',
            'TIBET',
            'GOA',
            'LUDHIANA',
            'KALAPATHER',
            'BOMDIA',
            'NEW YORK',
            'MOSCOW',
            'WIEN'
        );

        foreach ($settlementNames as $name) {
            $sett = new App\Settlement;
            $sett->name = $name;
            $sett->save();
        }
    }
}
