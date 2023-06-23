<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions master menu (Super Admin)
        Permission::create(['name' => 'add master menu']);
        Permission::create(['name' => 'edit master menu']);
        Permission::create(['name' => 'delete master menu']);
        Permission::create(['name' => 'show master menu']);

        // create permissions roles (Super Admin)
        Permission::create(['name' => 'add roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'show roles']);

        // create permissions users (Super Admin & Admin)
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'show users']);

        // create permissions menu (ex: Admin CRUD data user)
        Permission::create(['name' => 'add menu']);
        Permission::create(['name' => 'edit menu']);
        Permission::create(['name' => 'delete menu']);
        Permission::create(['name' => 'show menu']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'user', 'description' => "Role untuk user biasa"]);
        $role->givePermissionTo(['add menu', 'edit menu', 'show menu']);

        // or may be done by chaining
        $role = Role::create(['name' => 'admin', 'description' => "Role untuk user Admin"])
            ->givePermissionTo(['add menu', 'edit menu', 'delete menu', 'show menu', 'add users', 'edit users', 'delete users', 'show users']);

        $role = Role::create(['name' => 'super-admin', 'description' => "Role untuk Super Admin"]);
        $role->givePermissionTo(Permission::all());
    }
}
