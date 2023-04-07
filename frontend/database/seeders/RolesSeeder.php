<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\UserRole::create([
        //     'role_name' => 'ADMIN',
        // ]);
        // \App\Models\UserRole::create([
        //     'role_name' => 'SALES',
        // ]);
        // \App\Models\UserRole::create([
        //     'role_name' => 'CUSTOMER',
        // ]);
        // \App\Models\UserRole::create([
        //     'role_name' => 'MARKOM',
        // ]);

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@citanusa.com',
            'password' => Hash::make('0987654321'),
            'role_id' => '1'
        ]);
        \App\Models\User::create([
            'name' => 'admincare',
            'email' => 'admincare@citanusa.com',
            'password' => Hash::make('1234567890'),
            'role_id' => '1'
        ]);
        \App\Models\User::create([
            'name' => 'adminmarkom',
            'email' => 'adminmarkom@citanusa.com',
            'password' => Hash::make('1qaz2wsx#EDC'),
            'role_id' => '4'
        ]);
    }
}
