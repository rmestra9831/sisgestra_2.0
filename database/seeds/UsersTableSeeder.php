<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'slug'=>'UserAdmin',
            'position_id' => 1,
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Audit_1',
            'email' => 'audit1@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'slug'=>'UserAudit_1',
            'position_id' => 2,
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Audit_2',
            'email' => 'audit2@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'slug'=>'UserAudit_2',
            'position_id' => 2,
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Audit_3',
            'email' => 'audit3@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'slug'=>'UserAudit_3',
            'position_id' => 2,
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
