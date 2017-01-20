<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Entities\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach(range(1,25) as $index)
        {
            User::create([
                'email' => $faker->email,
                'password' => 'password',
            ]);
        }
    }
}
