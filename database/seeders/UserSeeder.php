<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin'),
            'role' => '1',

        ]);
        $manager = User::create([
            'name'=>'manager',
            'email'=>'manager@gmail.com',
            'password'=>bcrypt('manager'),
            'role' => '2',

        ]);
//        $user->assignRole('admin');
        $admin->assignRole('admin');
        $manager->assignRole('manager');
    }
}
