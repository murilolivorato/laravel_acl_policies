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

        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);


        User::factory()->count(10)->create()->each(function($user) use ($superAdminRole, $managerRole) {
            $roleID = $user->id % 2 == 0 ? $superAdminRole :$managerRole;
            $user->Roles()->attach($roleID);
        });

        // Seed Posts
        Post::factory(30)->create();

    }
}
