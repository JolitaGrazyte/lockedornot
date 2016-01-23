<?php
/**
 * Created by PhpStorm.
 * User: jolita_pabludo
 * Date: 23/01/16
 * Time: 11:41
 */

namespace App;

class UserStatusMsg
{

    public static function getMsg($status, $name, $count){

        switch($status){
            case 'Problem Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  [
                        'f-line'    => 'Oh no, '.$name.', ',
                        'm-body'    => ' You keep forgetting it! Work on it..
                                        Work on it, here\'s a tip: create a pattern for locking your car!
                                        You\'re making it easy for the bad guys! Be aware!',
                    ],

                    "compare_msg"   =>  $count.' other user of Locked Or Not  did better then you over the past year.',
                    'color'         =>  'red'

                ];
                break;

            case 'Trouble Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  [
                        'f-line'    =>  "Hmm, ". $name. ', ',
                        'm-body'     =>  [
                            "looks like even more then a half of the time you forget to lock your car.",
                            "You might wanna do somethin' about it...",
                            "Create routine, make it a habit!"
                        ]
                    ],
                    "compare_msg"   =>  $count.' other user of Locked Or Not did better then you over the past year.',
                    'color'         =>  'red'

                ];
                break;

            case 'Coinflip Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  [
                        'f-line'    =>  "Hey, ". $name. ', a coinflip locker.',
                        'm-body'    =>  '50/50 -  may the odds be in your favor!
	                                    You\'re on the halfwaybridge, go in the right direction!
	                                    Still not sure? Try to visualise, if you locked it or not.'
                    ],

                    "compare_msg"   =>  $count.' other user of Locked Or Not did better then you over the past year.',
                    'color'         =>  'salmon'

                ];
                break;

            case 'Vice Locker':
                return [
                    'status'        =>  $status,
                    'msg'           =>  [
                        'f-line'    =>  "Hi ". $name. ", " ,
                        'm-body'    =>  "nice job. Almost at the top!
                                        Most of the time you don't forget to lock your car.
                                        Keep locking it, vice locker!"
                    ],

                    "compare_msg"   =>  $count.' other user of Locked Or Not did better then you over the past year.',
                    'color'         =>  "green"
                ];
                break;

            case 'Top Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  [
                        'f-line'    =>  "Hi ". $name. ', ',
                        'm-body'    =>  'nice job. Nobody locks a lock like you!
                                        A Toplocker like you gives the bad guys a hard time!
                                        Keep it this way.'
                    ],

                    "compare_msg"   =>  $count.' other user of Locked Or Not did better then you over the past year.',
                    'color'         =>  "green"
                ];
                break;

            case 'New Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  [
                        'f-line'    =>  "Hi ". $name,
                        'm-body'    =>  "! Your statistics are empty. Not much to say about you yet...
                                        First make a use of the Locked Or Not device. Come back later for your statistics."
                    ],

                    "compare_msg"   =>  $count.' other user of Locked Or Not did better then you over the past year.',
                    'color'         =>  "green"
                ];
                break;
        }
    }

}