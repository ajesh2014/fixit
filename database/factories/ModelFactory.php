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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {

	static $password;	
    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('test'),
        'remember_token' => str_random(10),
        'firstname'=> $faker->firstname,
        'lastname'=> $faker->lastname,
        'usertype_id' => 1
    ];
}); 

$factory->define(App\Address::class, function (Faker\Generator $faker) {

    return [
        'user_id' =>  1,
        'company' => str_random(20),
        'addressline1' => $faker->address,
        'addressline2' =>$faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'country' =>$faker->country,
        'telephone1' => $faker->phoneNumber,
        'telephone2' => $faker->phoneNumber,
        'is_default'=> true
    ];
});   


$factory->define(App\Job::class, function (Faker\Generator $faker) {

    return [
        'user_id' => 1,
        'title' => str_random(20),
        'description' => str_random(100),
        'trade_id' => 1,
        'address_id' => function () {
            return factory(App\Address::class)->create()->id;
        },
    ];
});    


$factory->define(App\Quote::class, function (Faker\Generator $faker) {
 
    return [
        'user_id' => 1,
        'job_id' =>  1,
        'description' => str_random(100),
        'time' => 2,
        'rate' => 65,
        'estimate' => 154,
        'status' => 0
    ];
}); 

$factory->define(App\Media::class, function (Faker\Generator $faker) {

    return [
        'job_id' => 1,
        'filename' => image('/tmp', 200, 300, 'cats', false)
    ];
}); 