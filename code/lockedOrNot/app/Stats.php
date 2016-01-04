<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stats';

    public function user(){
        return $this->belongsTo('App\User');
    }

}
