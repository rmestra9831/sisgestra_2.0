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
        DB::table('audit_groups')->insert(['name' => 'Grupo 1','slug'=>'group_1']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 2','slug'=>'group_2']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 3','slug'=>'group_3']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 4','slug'=>'group_4']);
        DB::table('audit_groups')->insert(['name' => 'Grupo 5','slug'=>'group_5']);
    }
}
