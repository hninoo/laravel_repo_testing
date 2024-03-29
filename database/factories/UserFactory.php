<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $role_id = rand(1, 10);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role_id' =>$role_id,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Role::class, function (Faker $faker) {
    $role_name = ['admin','user','tester','account','manager','pic','supervisor','PM','MD','staff'];
    $role_name =$role_name[rand(0, 9)];
    return [
        'name' => $role_name,
    ];
});
