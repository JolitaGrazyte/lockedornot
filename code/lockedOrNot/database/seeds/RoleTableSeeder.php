<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles                = new Role;
        $roles->role          = "Top Locker";
        $roles->min 		  = "80";
        $roles->max           = "100";
        $roles->save(); 

        $roles                = new Role;
        $roles->role          = "Vice Locker";
        $roles->min 		  = "80";
        $roles->max           = "100";
        $roles->save();

        $roles                = new Role;
        $roles->role          = "Ok Locker";
        $roles->min 		  = "80";
        $roles->max           = "100";
        $roles->save();

        $roles                = new Role;
        $roles->role          = "Problem Locker";
        $roles->min 		  = "80";
        $roles->max           = "100";
        $roles->save();   

        $roles                = new Role;
        $roles->role          = "Paranoid Locker";
        $roles->min 		  = "80";
        $roles->max           = "100";
        $roles->save();
    }
}
