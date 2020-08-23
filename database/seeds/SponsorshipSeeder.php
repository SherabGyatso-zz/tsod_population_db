<?php

use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sponsorshipNames = array(
            'Nyamthak',
            'Day Family',
            'The Holy Family'
        );

        foreach ($sponsorshipNames as $name) {
            $sett = new App\Sponsorship;
            $sett->name = $name;
            $sett->save();
        }
    }
}
