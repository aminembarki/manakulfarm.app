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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cow::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->firstName('female'),
        'serial' => $faker->randomNumber % 1000,
        'birthdate' => $faker->dateTimeThisDecade,
        'herd_id' => $faker->randomElement(App\Herd::lists('id')->toArray()),
        'breeder_id' => $faker->optional()->randomElement(App\Breeder::lists('id')->toArray()),
        'mother_id' => $faker->optional()->randomElement(App\Cow::lists('id')->toArray()),
    ];
});

$factory->define(App\Breeder::class, function(Faker\Generator $faker) {
    return [
        'name' => strtoupper( $faker->firstName('male') ),
    ];
});

$factory->define(App\Breeding::class, function(Faker\Generator $faker) {
    $breeding = new App\Breeding;
    return [
        'cow_id' => $faker->randomElement(App\Cow::lists('id')->toArray()),
        'breeder_id' => $faker->randomElement(App\Breeder::lists('id')->toArray()),
        'service_date' => $faker->dateTimeThisDecade,
        'in_charge' => $faker->name,
        'status' => $faker->randomElement( array_pluck($breeding->getStatusList(), 'status') ),
        'calving_date' => $faker->dateTimeThisDecade,
        'dry_date' => $faker->dateTimeThisDecade,
    ];
});