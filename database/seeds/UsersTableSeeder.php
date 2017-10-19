<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends DatabaseSeeder{

    public function run()
    {
        for($i=0;$i<10;$i++){
            DB::table('users')->insert([
                'name'=>str_random(5),
                'email'=>str_random(6).'@school.org',
                'password'=>bcrypt('123456'),
            ]);
        }

    }
}