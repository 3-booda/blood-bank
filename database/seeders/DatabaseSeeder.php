<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            'admins',
            'users',
            'personal_access_tokens',
            'password_resets',
            'failed_jobs',
            'provinces',
            'cities',
            'blood_types',
            'categories',
            'posts',
            'settings',
            'contacts',
            'userables',
            'donation_requests'
        ];

        DB::statement("SET foreign_key_checks=0");
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement("SET foreign_key_checks=1");

        $this->call([
            BloodTypeSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            AdminSeeder::class,
            PostSeeder::class,
            ContactSeeder::class,
            DonationRequestSeeder::class,
            SettingSeeder::class,
            UserableSeeder::class
        ]);
    }
}
