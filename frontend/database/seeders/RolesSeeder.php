<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserRole::create([
            'role_name' => 'ADMIN',
        ]);
        \App\Models\UserRole::create([
            'role_name' => 'SALES',
        ]);
        \App\Models\UserRole::create([
            'role_name' => 'CUSTOMER',
        ]);
        \App\Models\UserRole::create([
            'role_name' => 'MARKOM',
        ]);
    }
}
