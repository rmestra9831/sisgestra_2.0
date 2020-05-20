<?php

use Illuminate\Database\Seeder;

class TypeFindingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_findings')->insert(['name' => 'Hallazgos Disciplinarios','count' => 0, 'slug'=>'H_Disciplinarios']);
        DB::table('type_findings')->insert(['name' => 'Hallazgos Fiscales','count' => 0, 'slug'=>'H_Fiscales']);
        DB::table('type_findings')->insert(['name' => 'Hallazgos Sancionatorios','count' => 0, 'slug'=>'H_Sancionatorios']);
        DB::table('type_findings')->insert(['name' => 'Hallazgos Penales','count' => 0, 'slug'=>'H_Penales']);
    }
}
