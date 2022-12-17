<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $categories = [];

        for ($i=0; $i < 100; $i++) {
            array_push($categories, [
                'name' => $fake->name()
            ]);
        }

        Category::insert($categories);
    }
}
