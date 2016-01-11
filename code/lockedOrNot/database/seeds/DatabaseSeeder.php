<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DevicesSeeder::class);
        factory(\App\Stats::class, 200)->create();

        Model::reguard();
    }
}

