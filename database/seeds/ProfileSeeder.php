<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('profiles')->insert([
            [
                'person_name' => 'Sherab',
                'gender' => 'M',
                'dob' => '2020-07-15',
                'fname' => 'Tashi',
                'mname' => 'Rinzin',
                'gbno' => 'g45',
                'rcno' => 'rc34',
                'passportno' => 'p12',
                'occupation_id' => 1,
                'sponsorship_id' => 1,
                'settlement_id' =>1 ,
                'person_group' => 2,
                'image' => '30522.jpg',
            ],  
            [
                'person_name' => 'Gyatso',
                'gender' => 'M',
                'dob' => '2020-07-31',
                'fname' => 'gfather',
                'mname' => 'gmother',
                'gbno' => 'gm45',
                'rcno' => 'grc34',
                'passportno' => 'gp12',
                'occupation_id' => 2,
                'sponsorship_id' => 3,
                'settlement_id' => 4,
                'person_group' => 1,
                'image' => '38225.jpg',
            ],
            [
                'person_name' => 'Tashi',
                'gender' => 'M',
                'dob' => '2020-07-02',
                'fname' => 'tasfathre',
                'mname' => 'tashmother',
                'gbno' => 'tasg45',
                'rcno' => 'tasrc34',
                'passportno' => 'tasp12',
                'occupation_id' => 4,
                'sponsorship_id' => 2,
                'settlement_id' => 32,
                'person_group' => 3,
                'image' => '71103.jpg',
            ],
            [
                'person_name' => 'Dolma',
                'gender' => 'F',
                'dob' => '2020-07-10',
                'fname' => 'dolfahter',
                'mname' => 'dolmother',
                'gbno' => 'dolg45',
                'rcno' => 'dolrc34',
                'passportno' => 'dolp12',
                'occupation_id' => 2,
                'sponsorship_id' => 3,
                'settlement_id' => 50,
                'person_group' => 3,
                'image' => '88274.jpg',
            ]  
        ]);
    }
}
