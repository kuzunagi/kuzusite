<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            [
                'name' => 'Owner',
                'slug' => 'owner',
                'isAdmin' => true
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'isAdmin' => true
            ],
            [
                'name' => 'Moderator',
                'slug' => 'moderator',
                'isAdmin' => true
            ],
            [
                'name' => 'Helper',
                'slug' => 'helper',
                'isAdmin' => false
            ],
            [
                'name' => 'Member',
                'slug' => 'member',
                'isAdmin' => false
            ],
        ]);
        foreach ($roles as $role) {
            Role::create([
                'name' => $role->name,
                'slug' => $role->slug,
                'is_admin' => $role->isAdmin
            ]);
        }
    }
}
