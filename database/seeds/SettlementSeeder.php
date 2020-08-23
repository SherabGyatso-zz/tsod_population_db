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
        //
        $bir = new App\Settlement;
        $bir->name = 'BIR';
        $bir->save();
    }
}
