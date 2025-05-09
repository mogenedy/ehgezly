<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


 

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first_role_id=Role::first()->id;
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $first_role_id,
        ]);
        $editorRole = Role::where('role', 'editor')->first();

    Admin::create([
        'name' => 'editor_admin',
        'email' => 'editor@gmail.com',
        'password' => bcrypt('password'),
        'role_id' => $editorRole->id,
    ]);
    $moderatorRole = Role::where('role', 'moderator')->first();

        if ($moderatorRole) {
            Admin::create([
                'name' => 'moderator_admin',
                'email' => 'moderator@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => $moderatorRole->id,
            ]);

            echo " Admin created and linked to moderator role.\n";
        } else {
            echo " Role 'moderator' not found in DB. Make sure it's created first.\n";
        }
    }
}