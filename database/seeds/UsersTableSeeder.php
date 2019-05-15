<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = User::create([
            'name' => env('NAME'),
            'email' => env('EMAIL'), 
            'password' => bcrypt(env('PASSWORD'))
        ]);

        $client->assignRole('client');

        $operator = User::create([
            'name' => 'operator',
            'email' => 'operator@gmail.com', 
            'password' => bcrypt(env('PASSWORD'))
        ]);

        $operator->assignRole('operator');

        return true;
            
    }
}
