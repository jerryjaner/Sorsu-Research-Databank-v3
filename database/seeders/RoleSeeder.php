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
         $adminRoles = [
            'super-admin',
            'bulan-admin',
            'sorsogon-admin',
            'castilla-admin',
            'magallanes-admin',
            'graduate-admin'
        ];

        foreach ($adminRoles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }
    }
}
