<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $users = [];

        User::create([
            'blood_type_id'=> rand(1, 8),
            'city_id' => rand(1, 100),
            'name' => 'Abdulrahman',
            'email' => 'abdulrahman@gmail.com',
            'phone' => '01512345678',
            'password' => bcrypt('123Abdulrahman@'),
            'birth_date' => $fake->date()
        ]);

        for ($i=0; $i < 99; $i++) {
            array_push($users, [
                'blood_type_id'=> rand(1, 8),
                'city_id' => rand(1, 100),
                'name' => $fake->name(),
                'email' => $fake->email(),
                'phone' => $fake->phoneNumber(),
                'password' => bcrypt('123Abdulrahman@'),
                'remember_token' => Str::random(10),
                'last_donation_date' => $fake->date(),
                'birth_date' => $fake->date()
            ]);
        }

        User::insert($users);
    }
}
