<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new App\AdminV2;
        $user->username = 'Tenzin Chemi';
        $user->password = '1234';
        $user->status = 1;
        $user->save();
    }
}
