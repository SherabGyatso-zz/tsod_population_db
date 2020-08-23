<?php

use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $occupationNames = array(
            'Nun', 
            'SFF', 
            'Others'
        );

        foreach ($occupationNames as $name) {
            $sett = new App\Occupation;
            $sett->name = $name;
            $sett->save();
        }
    }
}
