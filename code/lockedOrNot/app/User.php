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

    public function scopeLocked($q){
       return $q->whereHas('stats', function($query){
            $query->where('device_state', 1);
        });
    }
    public function scopeOthersLocked($q, $user, $date){
        return $q->whereHas('stats', function($query) use($user, $date){
            $query->where('device_state', 1)
                ->where('created_at', '>', $date)
                ->where('user_id', '!=', $user->id);
        });
    }

    public function scopeOthersUnlocked($q, $user, $date){
        return $q->whereHas('stats', function($query) use($user, $date){
            $query->where('device_state', 0)
                ->where('created_at', '>', $date)
                ->where('user_id', '!=', $user->id);
        });
    }

    public function scopeOthersStats($q, $user, $date){
        return $q->whereHas('stats', function($query) use($user, $date){
            $query
                ->where('created_at', '>', $date)
                ->where('user_id', '!=', $user->id);
        });
    }
}
