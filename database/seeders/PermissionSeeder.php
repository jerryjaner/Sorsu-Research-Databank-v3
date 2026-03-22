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
        // List of default permissions with store, update, and destroy
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
            'role_update',
            'role_edit',
            'role_view',
            'role_destroy',
            'role_get_permissions',
            'role_add_permissions',

            // Permission management
            'permission_store',
            'permission_create',
            'permission_update',
            'permission_edit',
            'permission_view',
            'permission_destroy',

            // Campus management
            'campus_store',
            'campus_create',
            'campus_update',
            'campus_edit',
            'campus_view',
            'campus_destroy',

            // College/Department management
            'college_store',
            'college_create',
            'college_update',
            'college_edit',
            'college_view',
            'college_destroy',

            // Research management
            'research_store',
            'research_create',
            'research_update',
            'research_edit',
            'research_view',
            'research_destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $this->command->info('Default permissions including store, update, and destroy seeded successfully!');
    }
}
