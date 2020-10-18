<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new App\Admin;
        $admin->username = 'sherab';
        $admin->password = md5('abcd1234');
        $admin->type = 'Admin';
        $admin->profile_view_access = 1;
        $admin->profile_edit_access = 1;
        $admin->profile_full_access = 1;
        $admin->occupation_access = 1;
        $admin->sponsorship_access = 1;
        $admin->settlement_access = 1;
        $admin->status = 1;
        $admin->save(); 
        //
        // DB::table('admins')->insert([
        //     'username' => 'admin',
        //     'password' => 'fcea920f7412b5da7be0cf42b8c93759',
        //     'type' => 'Admin',
        //     'profile_view_access' => 1,
        //     'profile_edit_access' => 1,
        //     'profile_full_access' => 1,
        //     'occupation_access' => 0,
        //     'sponsorship_access' => 0,
        //     'settlement_access' => 0,
        //     'status' => 1
        // ]);
    }
}
