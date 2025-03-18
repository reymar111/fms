<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Deceased;
use App\Models\BurialPlot;
use App\Models\BurialType;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $users = [
            [
                'name' => 'John Doe',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1234567890'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'John Doe',
                'email' => 'user@user.com',
                'password' => bcrypt('1234567890'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach($users as $user) {
            DB::table('users')->insert($user);
        }

        $client = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Client::create([
                'full_name' => $client->name,
                'contact_number' => $client->phoneNumber,
                'address' => $client->address,
            ]);
        }

        $burial_types = [
            ['name' => 'Single Slot', 'price' => '50000'],
            ['name' => 'Niches', 'price' => '75000'],
            ['name' => 'Family Mausuleum', 'price' => '200000'],
        ];

        foreach($burial_types as $burial) {
            BurialType::create([
                'name' => $burial['name'],
                'price' => $burial['price']
            ]);
        }

        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            BurialPlot::create([
                'plot_number' => 'PN-' . strtoupper(Str::random(6)), // Unique alphanumeric plot number
                'size' => $faker->randomElement(['3x6', '4x8', '5x10']), // Random sizes
                'burial_type_id' => mt_rand(1, 3), // Assuming 5 burial types exist
                'status' => $faker->randomElement(['available', 'reserved', 'occupied']),

            ]);
        }

        $death = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $birthDate = $death->date('Y-m-d', '-40 years'); // At least 40 years ago
            $deathDate = $death->date('Y-m-d', '-1 years'); // Died at least 1 year ago

            // Nullable burial date (sometimes null, sometimes a date after death)
            $burialDate = $death->boolean(80) ? $death->dateTimeBetween($deathDate, 'now')->format('Y-m-d') : null;

            Deceased::create([
                'full_name' => $death->name,
                'birth_date' => $birthDate,
                'death_date' => $deathDate,
                'cause_of_death' => $death->optional()->sentence(),
                'burial_date' => $burialDate,
            ]);
        }


    }
}
