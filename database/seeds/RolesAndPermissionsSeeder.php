<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Role::query()->delete();
        Permission::query()->delete();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create threads']);
        Permission::create(['name' => 'edit threads']);
        Permission::create(['name' => 'delete threads']);

        Role::create(['name' => 'author'])->givePermissionTo(['create threads', 'edit threads']);
        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
    }
}
