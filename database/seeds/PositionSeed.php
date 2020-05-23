<?php

use Illuminate\Database\Seeder;

class PositionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert(['name' => 'Administrador']);
        DB::table('positions')->insert(['name' => 'Auditor']);
    }
}
