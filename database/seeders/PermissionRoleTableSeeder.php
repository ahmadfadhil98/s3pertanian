<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();

        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $lecturer_permission = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_';
        });

        $student_permission = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'task_';
        });

        Role::findOrFail(2)->permissions()->sync($lecturer_permission);
        Role::findOrFail(3)->permissions()->sync($student_permission);
    }
}
