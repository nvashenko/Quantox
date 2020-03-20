<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Board;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'board_id' => Board::all()->random(1)->first()->id
    ];
});
