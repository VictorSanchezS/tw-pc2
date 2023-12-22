<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $academicManager = Role::create(['name' => 'Academic Manager']);

        $admin->givePermissionTo([
            //Usuarios
            'create-user',
            'edit-user',
            'delete-user',
            //Matriculas
            'create-enrollment',
            'edit-enrollment',
            'delete-enrollment',
            //Alumnos
            'create-student',
            'edit-student',
            'delete-student',
        ]);

        $academicManager->givePermissionTo([
            //Matriculas
            'create-enrollment',
            'edit-enrollment',
            'delete-enrollment',
            //Alumnos
            'create-student',
            'edit-student',
            'delete-student',
        ]);
    }
}
