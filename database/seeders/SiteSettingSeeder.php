<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = collect([
            [
                'name' => 'theme',
                'value' => 'adminlte3'
            ],
            [
                'name' => 'app_name',
                'value' => 'kuzusite'
            ],
            [
                'name' => 'owner',
                'value' => 1
            ],
            [
                'name' => 'color',
                'value' => 'dark'
            ],
            [
                'name' => 'keyword',
                'value' => 'kuzunagi'
            ],
        ]);
        foreach ($settings as $setting) {
            SiteSetting::create([
                'name' => $setting->name,
                'value' => $setting->value
            ]);
        }
    }
}
