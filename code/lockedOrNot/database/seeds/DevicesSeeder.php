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

            if($user->id == 1){
                $devices[] =

                    [
                        'device_nr'     => 'LON1111',
                        'state'         => 0,
                        'user_id'       => $user->id
                    ];
            }
            $devices[] =

                [
                    'device_nr'     => 'LON'.rand(pow(10, $digits-1), pow(10, $digits)-1),
                    'state'         => 0,
                    'user_id'       => $user->id
                ];
        }


        DB::table('devices')->insert($devices);

    }
}

