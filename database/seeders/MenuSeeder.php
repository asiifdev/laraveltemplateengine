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
            "name" => "Settings",
            "icon_id" => 5,
            "url" => "/settings",
            "slug" => Str::slug("Settings"),
        ]);

        Menu::create([
            "name" => "Dashboard",
            "roles" => str_replace(array('[',']'),"", json_encode($roleName)),
            "icon_id" => 20,
            "url" => "/",
            "description" => "Menu Mengelola Dashboard",
            "slug" => Str::slug("Dashboard"),
            "pathClass" => "App\Http\Livewire\Dashboard",
            "nameClass" => "Dashboard"
        ]);

        Menu::create([
            "name" => "Master Menu",
            "roles" => str_replace(array('[',']'),"", json_encode($roleName)),
            "icon_id" => 5,
            "url" => "/",
            "description" => "Menu Mengelola Master Menu",
            "slug" => Str::slug("Master Menu"),
            "pathClass" => "App\Http\Livewire\MasterMenu",
            "nameClass" => "MasterMenu",
            "parent_id" => 1
        ]);

        Menu::create([
            "name" => "Master Template",
            "roles" => str_replace(array('[',']'),"", json_encode($roleName)),
            "icon_id" => 10,
            "url" => "/template",
            "description" => "Menu Master Template Livewire",
            "slug" => Str::slug("Master Template"),
            "pathClass" => "App\Http\Livewire\MasterTemplate",
            "nameClass" => "MasterTemplate",
            "parent_id" => 1
        ]);

        Menu::create([
            "name" => "Template Tanpa parent",
            "roles" => str_replace(array('[',']'),"", json_encode($roleName)),
            "icon_id" => 8,
            "url" => "/template-tanpa-prent",
            "description" => "Menu Master Template Livewire",
            "slug" => Str::slug("Template Tanpa Parent"),
            "pathClass" => "App\Http\Livewire\MasterTemplate",
            "nameClass" => "MasterTemplate"
        ]);
    }
}
