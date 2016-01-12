<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//added by jonas
use Auth;

class Device extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'devices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['device_nr', 'user_id'];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notlocked(){

        return $this->where('state', 0);

    }
    public function scopeUnlocked($q){
        $q->where('state', 0)->where('user_id',Auth::user()->id);

    }
    public function scopeLocked($q){
        $q->where('state', 1)->where('user_id',Auth::user()->id);

    }

}
