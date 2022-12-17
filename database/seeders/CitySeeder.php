<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $cities = [];

        for ($i=0; $i < 100; $i++) {
            array_push($cities, [
                'province_id' => rand(1, 50),
                'name' => $fake->text(25)
            ]);
        }

        City::insert($cities);
    }
}
