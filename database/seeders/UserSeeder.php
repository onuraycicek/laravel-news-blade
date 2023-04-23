<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superAdmin = User::factory([
            'email' => 'onur.m.aycicek@super-admin.com'
        ])->create();
        $superAdmin->assignRole('super-admin');

        $admin = User::factory([
            'email' => 'onur.m.aycicek@admin.com'
        ])->create();
        $admin->assignRole('admin');
        
        $editor = User::factory([
            'email' => 'onur.m.aycicek@editor.com'
        ])->create();
        $editor->assignRole('editor');

         User::factory([
            'email' => 'onur.m.aycicek@user.com'
        ])->create();

        User::factory()->count(10)->create();
    }
}
