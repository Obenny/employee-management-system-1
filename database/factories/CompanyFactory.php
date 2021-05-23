<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        // returns the attributes or database columns of the model class
        'name' => $faker->company->unique(),
        'email' => $faker->unique()->companyEmail,
        'logo' => $faker->image(),
        'website_url' => $faker->image(),
    ];
});
