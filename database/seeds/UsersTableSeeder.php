<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
         //TestDummy::times(3)->create('App\User');
        
        DB::table("users")->truncate();
        
        DB::table("users")->insert([
            [
                'name' =>'bill',
                'email' => 'bill@test.com',
                'password'=>bcrypt("123456789"),
            ],
            
            [
                'name' =>'mery',
                'email' => 'mery@test.com',
                'password'=>bcrypt("123456789"),
            ],
        ]);
        
        
    }
}
