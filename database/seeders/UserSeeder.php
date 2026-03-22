<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the super-admin role exists
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Create the super-admin user
        $user = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'], // unique identifier
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'), // change to a secure password
            ]
        );

        // Assign the role (if not already assigned)
        if (!$user->hasRole($role->name)) {
            $user->assignRole($role);
        }

        // Create profile for the user if it doesn't exist
        Profile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => '09123456789', // default phone
                'address' => 'Super Admin Address', // default address
                'profile_picture' => null, // or provide a default picture path
            ]
        );
    }
}
