<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleName = [];
        $roles = Role::all();
        foreach($roles as $item){
            $roleName[] = $item->name;
        }
        Menu::create([
            "name" => "Master Menu",
            "roles" => json_encode($roleName),
            "icon_id" => 5,
            "url" => "/",
            "description" => "Menu Mengelola Master Menu",
            "slug" => Str::slug("Master Menu"),
            "pathClass" => "App\Http\Livewire\MasterMenu",
            "nameClass" => "MasterMenu"
        ]);

        Menu::create([
            "name" => "Master Template",
            "roles" => json_encode($roleName),
            "icon_id" => 10,
            "url" => "/template",
            "description" => "Menu Master Template Livewire",
            "slug" => Str::slug("Master Template"),
            "pathClass" => "App\Http\Livewire\MasterTemplate",
            "nameClass" => "MasterTemplate"
        ]);
    }
}
