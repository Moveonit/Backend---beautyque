<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
function generateRandomString($length = 1) {
    $characters = 'FM';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Guest::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->firstName,
        'surname'           => $faker->lastName,
        'city'              => $faker->city,
        'address'           => $faker->address,
        'birthday'          => $faker->dateTime,
        'gender'            => generateRandomString(1),
    ];
});

$factory->define(App\Entities\Spa::class, function (Faker\Generator $faker) {
    return [
        'company_name'          => $faker->company,
        'vat_number'            => $faker->name,
        'fiscal_code'           => $faker->city,
        'address'               => $faker->address,
        'city'                  => $faker->dateTime,
        'telephone'             => $faker->phoneNumber,
        'zip_code'              => '50127',
        'fax'                   => $faker->phoneNumber,
    ];
});

$factory->define(App\Entities\Employee::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->name,
    ];
});
