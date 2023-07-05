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
        $pathAdmin = "";
        if (function_exists("getIdentity")) {
            $pathAdmin = getIdentity()->path;
        } else {
            $pathAdmin = "admin";
        }

        foreach ($roles as $item) {
            $roleName[] = $item->name;
        }

        Menu::create([
            "name" => "Settings",
            "icon_id" => 5,
            "url" => "/" . $pathAdmin . "/settings",
            "slug" => Str::slug("Settings"),
            "roles" => str_replace(array('[', ']'), "", json_encode($roleName)),
            "pathClass" => "App\Http\Livewire\Settings",
            "urutan" => 1,
            "nameClass" => "Settings",
        ]);

        Menu::create([
            "name" => "Master Menu",
            "roles" => str_replace(array('[', ']'), "", json_encode($roleName)),
            "icon_id" => 5,
            "url" => '/' . $pathAdmin . "/settings/menu",
            "description" => "Menu Mengelola Master Menu",
            "slug" => Str::slug("Master Menu"),
            "pathClass" => "App\Http\Livewire\MasterMenu",
            "nameClass" => "MasterMenu",
            "migration_id" => 10,
            "urutan" => 2,
            "parent_id" => 1
        ]);

        Menu::create([
            "name" => "Master Template",
            "roles" => str_replace(array('[', ']'), "", json_encode($roleName)),
            "icon_id" => 10,
            "url" => '/' . $pathAdmin . "/settings/template",
            "description" => "Menu Master Template Livewire",
            "slug" => Str::slug("Master Template"),
            "pathClass" => "App\Http\Livewire\MasterTemplate",
            "nameClass" => "MasterTemplate",
            "urutan" => 3,
            "parent_id" => 1
        ]);

        Menu::create([
            "name" => "Template Tanpa parent",
            "roles" => '"admin","super-admin"',
            "icon_id" => 8,
            "url" => '/' . $pathAdmin . "/template-tanpa-prent",
            "description" => "Menu Master Template Livewire",
            "slug" => Str::slug("Template Tanpa Parent"),
            "pathClass" => "App\Http\Livewire\MasterTemplate",
            "urutan" => 4,
            "nameClass" => "MasterTemplate"
        ]);


        Menu::create([
            "name" => "Dashboard",
            "roles" => str_replace(array('[', ']'), "", json_encode($roleName)),
            "icon_id" => 20,
            "url" => "/" . $pathAdmin,
            "description" => "Menu Mengelola Dashboard",
            "slug" => Str::slug("Dashboard"),
            "pathClass" => "App\Http\Livewire\Dashboard",
            "urutan" => 5,
            "nameClass" => "Dashboard"
        ]);
    }
}
