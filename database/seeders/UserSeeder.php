<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "name" => "Role User",
            "email" => "user@gmail.com",
            "password" => bcrypt("password"),
            "photo" => getAvatar('user@gmail.com')
        ]);
        $user->assignRole('user');

        $admin = User::create([
            "name" => "Role Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "photo" => getAvatar('admin@gmail.com')
        ]);
        $admin->assignRole('admin');

        $superadmin = User::create([
            "name" => "Role Super Admin",
            "email" => "super-admin@gmail.com",
            "password" => bcrypt("password"),
            "photo" => getAvatar('super-admin@gmail.com')
        ]);
        $superadmin->assignRole('super-admin');
    }
}
