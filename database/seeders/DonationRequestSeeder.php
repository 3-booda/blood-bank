<?php

namespace Database\Seeders;

use App\Models\DonationRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $donationRequest = [];

        for ($i=0; $i < 100; $i++) {
            array_push($donationRequest, [
                'city_id' => rand(1, 100),
                'blood_type_id' => rand(1, 8),
                'patient_name' => $fake->name(),
                'patient_phone' => $fake->phoneNumber(),
                'patient_age' => rand(1, 100),
                'bag_nums' => rand(1, 10),
                'hospita_address' => $fake->address(),
                'notes' => $fake->text()
            ]);
        }

        DonationRequest::insert($donationRequest);
    }
}
