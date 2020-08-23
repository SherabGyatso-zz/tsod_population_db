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
        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => 'fcea920f7412b5da7be0cf42b8c93759',
            'type' => 'Admin',
            'profile_view_access' => 1,
            'profile_edit_access' => 1,
            'profile_full_access' => 1,
            'occupation_access' => 0,
            'sponsorship_access' => 0,
            'settlement_access' => 0,
            'status' => 1
        ]);
    }
}
