<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'lihat-tulisan']);
        Permission::create(['name' => 'edit-tulisan']);
        Permission::create(['name' => 'hapus-tulisan']);
        Permission::create(['name' => 'buat-tulisan']);



        Role::create(['name' => 'admin']);


        $role_admin = Role::findByName('admin');
        $role_admin->givePermissionTo(Permission::all());
    }
}
