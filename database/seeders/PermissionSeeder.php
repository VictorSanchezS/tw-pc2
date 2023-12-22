<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //Roles
            'create-role',
            'edit-role',
            'delete-role',
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
         ];

          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}
