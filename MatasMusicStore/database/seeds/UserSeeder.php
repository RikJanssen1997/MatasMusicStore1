<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_admin' => '1'
        ]);
        
        $customer = User::create([
            'name' => 'Rik Janssen',
            'email' => 'rikjnssn@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
