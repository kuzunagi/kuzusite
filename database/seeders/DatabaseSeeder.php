<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BlogSeeder::class,
            LogTypeSeeder::class,
            PageSeeder::class,
            RoleSeeder::class,
            SiteSettingSeeder::class,
            ThemeSeeder::class,
        ]);
    }
}
