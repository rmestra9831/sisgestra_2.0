<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([PositionSeed::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([PermissionsSeeder::class]);
        $this->call([TypeFindingSeed::class]);
        $this->call([AuditGroupSeeder::class]);
        $this->call([FindingsSeed::class]);
    }
}
