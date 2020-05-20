<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'view register']);
        
        $permission = Permission::create(['name' => 'create register']);
        $permission = Permission::create(['name' => 'create user']);

        $permission = Permission::create(['name' => 'edit register']);
        $permission = Permission::create(['name' => 'edit user']);

        $permission = Permission::create(['name' => 'delete register']);
        $permission = Permission::create(['name' => 'delete user']);
    
        $user = User::where('id',1)->first();
        $user->givePermissionTo(['create register','edit register','delete register','create user','delete user','view register']);
    
        $user = User::where('id',2)->first();
        $user->givePermissionTo(['create register','view register']);
    }
}
