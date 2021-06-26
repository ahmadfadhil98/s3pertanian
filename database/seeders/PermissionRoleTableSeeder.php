<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $super_admin_permission = Permission::all();

        $admin_permission = $super_admin_permission->filter(function ($permission) {
            return substr($permission->title, 0, 6) == 'admin_';
        });

        $lecturer_permission = $super_admin_permission->filter(function ($permission) {
            return substr($permission->title, 0, 9) == 'lecturer_';
        });

        $student_permission = $super_admin_permission->filter(function ($permission) {
            return substr($permission->title, 0, 8) != 'student_';
        });

        $staff_permission = $super_admin_permission->filter(function ($permission) {
            return substr($permission->title, 0, 6) != 'staff_';
        });

        $invitee_permission = $super_admin_permission->filter(function ($permission) {
            return substr($permission->title, 0, 8) != 'invitee_';
        });

        Role::findOrFail(1)->permissions()->sync($admin_permission);
        Role::findOrFail(2)->permissions()->sync($lecturer_permission);
        Role::findOrFail(3)->permissions()->sync($student_permission);
        Role::findOrFail(4)->permissions()->sync($staff_permission);
        Role::findOrFail(5)->permissions()->sync($invitee_permission);
    }
}
