<?php

namespace Database\Seeders;

use App\Models\Identity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Identity::create([
            "name" => "ASIIFDEV",
            "email" => "asiif.anwar3@gmail.com",
            "phone" => "6282134462498",
            "logo" => "",
            "slogan" => "",
        ]);
    }
}
