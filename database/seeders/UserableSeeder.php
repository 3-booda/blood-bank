<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $userables = [];

        for ($i = 0; $i < 100; $i++) {
            $numberBetween = $fake->numberBetween(1, 100);

            switch (true) {
                case $numberBetween <= 8:
                    $array = ['App\Models\BloodType', 'App\Models\Province', 'App\Models\Post'];
                    $key = array_rand($array);
                    $userableType = $array[$key];
                    break;

                case $numberBetween <= 50:
                    $array = ['App\Models\Province', 'App\Models\Post'];
                    $key = array_rand($array);
                    $userableType = $array[$key];
                    break;

                default:
                    $userableType = 'App\Models\Post';
                    break;
            }

            array_push($userables, [
                'user_id' => $numberBetween,
                'userable_id' => $numberBetween,
                'userable_type' => $userableType
            ]);
        }

        DB::table('userables')->insert($userables);
    }
}
