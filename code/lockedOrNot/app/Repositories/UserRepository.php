<?php

namespace App\Repositories;

use App\User;
use Session;

class UserRepository {

    public function findByEmailOrCreate($userData){

        $name = explode(' ', $userData->name);

        $user = User::where('email', $userData->email)->first();

        if(!$user){
            $user = User::create([
                'first_name'=>  $name[0],
                'last_name' =>  $name[1],
                'email'     =>  $userData->email,
            ]);
        }

        return $user;


    }

}