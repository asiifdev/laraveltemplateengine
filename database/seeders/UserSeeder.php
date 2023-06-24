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
        if (function_exists('getAvatar')) {
            $photo = getAvatar('asiifdev@gmail.com');
        }
        else{
            $photo = "";
        }

        $user = User::create([
            "name" => "Role User",
            "email" => "user@gmail.com",
            "password" => bcrypt("password"),
            "photo" => $photo
        ]);
        $user->assignRole('user');

        $admin = User::create([
            "name" => "Role Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "photo" => $photo
        ]);
        $admin->assignRole('admin');

        $superadmin = User::create([
            "name" => "Role Super Admin",
            "email" => "super-admin@gmail.com",
            "password" => bcrypt("password"),
            "photo" => $photo
        ]);
        $superadmin->assignRole('super-admin');
    }
}
