<?php

namespace Database\Seeders;

use App\Models\LogType;
use Illuminate\Database\Seeder;

class LogTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logTypes = collect([
            [
                'name' => 'Role Controller',
                'slug' => 'role-controller'
            ],
            [
                'name' => 'Blog Controller',
                'slug' => 'blog-controller'
            ],
            [
                'name' => 'Page Controller',
                'slug' => 'page-controller'
            ],
            [
                'name' => 'User Controller',
                'slug' => 'user-controller'
            ],
        ]);
        foreach ($logTypes as $logType) {
            LogType::create([
                'name' => $logType->name,
                'slug' => $logType->slug
            ]);
        }
    }
}
