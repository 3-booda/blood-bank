<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $admins = [];

        Admin::create([
            'name' => 'Abdulrahman',
            'email' => 'abdulrahman@gmail.com',
            'phone' => '01512345678',
            'password' => bcrypt('123Abdulrahman@')
        ]);

        for ($i=0; $i < 99; $i++) {
            array_push($admins, [
                'name' => $fake->name(),
                'email' => $fake->email(),
                'phone' => $fake->phoneNumber(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]);
        }

        Admin::insert($admins);
    }
}
