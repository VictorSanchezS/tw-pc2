<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $academicManager = User::create([
            'name' => 'academicManager',
            'email' => 'academicmanager@gmail.com',
            'password' => Hash::make('academicmanager1234')
        ]);
        $academicManager->assignRole('Academic Manager');
    }
}
