<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(SettlementSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(SponsorshipSeeder::class);
        $this->call(ProfileSeeder::class);
    }
}
