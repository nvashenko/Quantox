<?php

use App\Board;
use App\Grade;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class, 15)->create()->each(function($student) {
            $student->grades()->saveMany(factory(App\Grade::class, mt_rand(1, 4))->make());
        });
    }
}
