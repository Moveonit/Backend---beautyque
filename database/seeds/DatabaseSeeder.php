<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach ((range(1, 20)) as $index) {
            $guest = \App\Entities\Guest::create([
                'name' => $faker->name,
                'surname' => $faker->lastName,
                'city' => $faker->city,
                'address' => $faker->address,
                'birthday' => $faker->dateTimeBetween('-60 years', '-18 years'),
                'province' => 'FI',
                'gender' => 'm'
            ]);

            \App\Entities\User::create([
                'email' => $faker->email,
                'password' => 'password',
                'userable_id' => $guest->id,
                'userable_type' => 'Guest'
            ]);

            $spa = \App\Entities\Spa::create([
                'company_name' => $faker->company,
                'VAT_number' => $faker->vat,
                'fiscal_code' => "fiscal_code",
                'address' => $faker->address,
                'city' => $faker->city,
                'telephone' => $faker->phoneNumber,
                'zip_code' => 50013,
                'province' => 'FI',
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude
            ]);

            \App\Entities\User::create([

            ]);

            foreach ((range(1, 4)) as $index1) {
                $employee = \App\Entities\Employee::create([
                    'name' => $faker->name
                ]);

                \App\Entities\User::create([

                ]);
            }
        }
    }
}
