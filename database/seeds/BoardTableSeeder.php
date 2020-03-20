<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert([
          'type' => 'csm',
        ]);

        DB::table('boards')->insert([
          'type' => 'csmb',
        ]);

        $this->call(StudentSeeder::class);
    }
}
