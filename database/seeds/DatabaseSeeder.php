<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {	
    	User::create([
    		'name' => 'Admin Guy',
    		'email'  => 'admin@test.com',
    		'password' => Hash::make('admin'),
    	]);

    	User::create([
    		'name' => 'User',
    		'email'  => 'user@test.com',
    		'password' => Hash::make('secret'),
    	]);
        // $this->call(UsersTableSeeder::class);
    }
}
