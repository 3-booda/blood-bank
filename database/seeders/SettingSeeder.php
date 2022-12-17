<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();

        $settings = [
            ['key' => 'notification_text', 'value' => $fake->text()],
            ['key' => 'about_app', 'value' => $fake->text()],
            ['key' => 'facebook_link', 'value' => 'https://www.facebook.com']
        ];

        Setting::insert($settings);
    }
}
