<?php

namespace Database\Seeders;

use App\Models\Contact;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = fake();
        $contacts = [];

        for ($i=0; $i < 100; $i++) {
            array_push($contacts, [
                'name' => $fake->name(),
                'email' => $fake->email(),
                'phone' => $fake->phoneNumber(),
                'subject' => 'Inquiry',
                'message' => $fake->text()
            ]);
        }

        DB::table('contacts')->insert($contacts);
    }
}
