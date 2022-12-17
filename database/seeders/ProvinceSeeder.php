<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $provinces = [];

        for ($i=0; $i < 50; $i++) {
            array_push($provinces, ['name' => $fake->text(20)]);
        }

        Province::insert($provinces);
    }
}
