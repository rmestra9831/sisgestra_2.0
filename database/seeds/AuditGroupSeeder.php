<?php

use Illuminate\Database\Seeder;

class AuditGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audit_groups')->insert(['name' => 'Grupo 1']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 2']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 3']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 4']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 5']);
    }
}
