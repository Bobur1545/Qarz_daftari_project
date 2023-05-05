<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            'profile.create',
            'profile.edit',
            'profile.store',
            'profile.update',
            'profile.destroy',
            'profile.permission',
            'costumer.store',
            'costumer.update',
            'costumer.destroy',
            'costumer.debt_info',
            'debt.store',
            'payment.store',
        ];
        $role = Role::first();
        $user = User::first();
        $manager  =Role::where('name','manager')->first();
        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
            $role->givePermissionTo($permission);
            $user->givePermissionTo($permission);
        }
        $manager_permissions = [
            'costumer.store',
            'debt.store',
            'payment.store',
        ];
        foreach ($manager_permissions as $manager_permission){
            $manager->givePermissionTo($manager_permission);

        }

    }
}
