<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enums\PermissionsEnum;

class UserPermissionAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super-admin' => [], // all permissions
            'admin' => [
                PermissionsEnum::DELETEUSER,
                PermissionsEnum::GIVEROLE,
                PermissionsEnum::VIEWADMINDASHBOARD,
                PermissionsEnum::VIEWEDITORDASHBOARD,
                PermissionsEnum::VIEWDASHBOARD,
            ],
            'editor' => [
                PermissionsEnum::EDITPOST,
                PermissionsEnum::DELETEPOST,
                PermissionsEnum::CREATEPOST,
                PermissionsEnum::VIEWEDITORDASHBOARD,
                PermissionsEnum::VIEWDASHBOARD,
            ],
        ];
        $createdPermissions = [];
        foreach (PermissionsEnum::cases() as $permission) {
            $permissionName = $permission->value;
            $createdPermissions[$permissionName] = Permission::create(['name' => $permissionName]);
        }

        foreach ($roles as $role => $permissions) {
            $createdRole = Role::create(['name' => $role]);
            foreach ($permissions as $permission) {
                $permissionName = $permission->value;
                $createdRole->givePermissionTo($createdPermissions[$permissionName]);
            }
    }



    }
}
