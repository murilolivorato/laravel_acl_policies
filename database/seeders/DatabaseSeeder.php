<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $superAdminRole = Role::where('name', 'super-admin')->first();
        $managerRole = Role::where('name', 'manager')->first();

        User::factory()->count(10)->create()->each(function($user) use ($superAdminRole, $managerRole) {
            $roleID = $user->id % 2 == 0 ? $superAdminRole :$managerRole;
            $user->roles()->attach($roleID);
        });

        // Seed Posts
        Post::factory(30)->create();

    }
}
