<?php

use Illuminate\Database\Seeder;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $digits = 5;

        DB::table('devices')->delete();
        $users = \App\User::all();

        foreach($users as $user)
        {
            $devices[] =

                [
                    'device_nr'     => 'LRN'.rand(pow(10, $digits-1), pow(10, $digits)-1),
                    'state'         => 0,
                    'user_id'       => $user->id
                ];
        }


        DB::table('devices')->insert($devices);

    }
}

