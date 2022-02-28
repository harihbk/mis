<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
         ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Admin']);
        // $role = Role::where('name','Admin')->first();
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $admin_users = User::where('status',0)->get();
        foreach($admin_users as $admin){
            $admin->assignRole([$role->id]);
        }
    }
}
