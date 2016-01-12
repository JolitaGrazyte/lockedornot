<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
//
//    protected $status    = [
//        1 => StatusEnum::TOP_LOCKER,
//        2 => StatusEnum::VICE_LOCKER,
//        3 => StatusEnum::OK_LOCKER,
//        4 => StatusEnum::PROBLEM_LOCKER,
//        5 => StatusEnum::PARANOID_LOCKER
//    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'city', 'car_color', 'car_brand'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Get the phone record associated with the user.
     */
    public function devices()
    {
        return $this->hasMany('App\Device');
    }

    public function stats()
    {
        return $this->hasMany('App\Stats');
    }

    public function scopeParanoiaStats($q){
        $q->whereHas('stats', function($query){
            $query->where('device_state', 1);
        });
    }

    public function scopeUnlockedStats($q){
        $q->whereHas('stats', function($query){
            $query->where('device_state', 0);
        });
    }
    public function scopeMonthlyStats($q, $month){
        $q->whereHas('stats', function($query) use ($month){
            $query->where('device_state', 0)
                ->whereRaw('MONTH(created_at) = '.$month);
        });
    }

    public function scopeDailyStats($q, $day){
        $q->whereHas('stats', function($query) use ($day){
            $query->where('device_state', 0)
                ->whereRaw('DAY(created_at) = '.$day);
        });
    }

    public function scopeHourlyStats($q, $hour){
        $q->whereHas('stats', function($query) use ($hour){
            $query->where('device_state', 0)
                ->whereRaw('HOUR(created_at) = '.$hour);
        });
    }
}
