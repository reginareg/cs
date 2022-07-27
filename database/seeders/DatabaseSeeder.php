<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        foreach (range(1, 10) as $_) {
            DB::table('autoservisas')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'paslauga_id' => rand (1, 10),
                'mechanikas_id' => rand (1, 10),
            ]);
    }
    
    foreach (range(1, 10) as $_) {
        
        DB::table('mechanikai')->insert([
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
            'photo' => $faker->imageUrl,
            'rating' => rand(1, 5),
        ]);
    }
    foreach (range(1, 10) as $_) {
        $services = ['Padangų montavimas', 'Lemputės keitimas', 'Stabdžių kaladėlės keitimas', 'Dažymas', 'Kėbulo remonto darbai', 'Oro kondicionieriaus remontas', 'Tepalų keitimas'];

        DB::table('paslauga')->insert([
            'name' => $services[rand(0, count($services) - 1)],
            'deadline' => rand(10, 120),
            'price' => rand(20, 200),
        ]);
    }
}
}