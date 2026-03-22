<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // List of default permissions with 'store' added
        $permissions = [
            // User management
            'user_store',
            'user_create',
            'user_update',
            'user_edit',
            'user_view',
            'user_destroy',

            // Role management
            'role_store',
            'role_create',
            'role_edit',
            'role_view',
            'role_delete',

            // Permission management
            'permission_store',
            'permission_create',
            'permission_edit',
            'permission_view',
            'permission_delete',

            // Campus & Department
            'campus_store',
            'campus_create',
            'campus_edit',
            'campus_view',
            'campus_delete',

            'college_store',
            'college_create',
            'college_edit',
            'college_view',
            'college_delete',

            // Research management
            'research_store',
            'research_create',
            'research_edit',
            'research_view',
            'research_delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $this->command->info('Default permissions including store seeded successfully!');
    }
}
