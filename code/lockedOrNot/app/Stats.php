<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Stats extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stats';

    protected $dates = ['date'];

    protected $days    = [
        1 => DaysEnum::monday,
        2 => DaysEnum::tuesday,
        3 => DaysEnum::wednesday,
        4 => DaysEnum::thursday,
        5 => DaysEnum::friday,
        6 => DaysEnum::saturday,
        7 => DaysEnum::sunday,
    ];

    public function setDateAttribute($date){

        $this->attributes['date'] = Carbon::parse($date);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeTodaystats($query)
    {
        return $query->where('created_at', Carbon::today());
    }

    public function days(){
        return $this->days;
    }

    public function scopeLockedStats($q){
        return $q->where('device_state', 1);
    }

    public function scopeUnlockedStats($q){
        return $q->where('device_state', 0);
    }

    public function scopeWeeklyStats($q, $week, $day){
        return $q->whereRaw('WEEK(created_at, 3) = '.$week. ' AND WEEKDAY(created_at) = '.$day);
    }

    public function scopeMonthlyStats($q, $month,  $day){
        return $q->whereRaw('MONTH(created_at) = '.$month. ' AND WEEKDAY(created_at) = '.$day);
    }

    public function scopeYearlyStats($q, $year,  $day){
        return $q->whereRaw('YEAR(created_at) = '.$year. ' AND WEEKDAY(created_at) = '.$day);
    }

    public function scopeMonthlyLocked($q, $month){
        return $q->whereRaw('MONTH(created_at) = '.$month)->where('device_state', 1);
    }
    public function scopeMonthlyUnlocked($q, $month){
        return $q->whereRaw('MONTH(created_at) = '.$month)->where('device_state', 1);
    }

    public function scopeDailyStats($q, $day){
        return  $q->whereRaw('DAY(created_at) = '.$day);
    }

    public function scopeHourlyStats($q, $hour){
        return $q->whereRaw('HOUR(created_at) = '.$hour);
    }

    public function scopeWeekend($q){
        return $q->whereRaw('WEEKDAY(created_at) <= 6 AND WEEKDAY(created_at) >= 4');
    }

    public function scopeWeek($q){
        return $q->whereRaw('WEEKDAY(created_at) < 4 AND WEEKDAY(created_at) >= 0');
    }

    public function scopeWeekday($q, $day){
        return $q->whereRaw('WEEKDAY(created_at) = '.$day);
    }

    public function scopeWeekdayLocked($q, $day){
        return $q->whereRaw('WEEKDAY(created_at) = '.$day)->where('device_state', 1);
    }

    public function scopeWeekdayUnlocked($q, $day){
        return $q->whereRaw('WEEKDAY(created_at) = '.$day)->where('device_state', 0);
    }

    public function scopeBusiestDay($q){
        return $q->select(DB::raw('MAX(created_at) AS date'));
    }

    public function scopeBusiestMonth($q){
        return $q->select(DB::raw('MAX(MONTH(created_at)) AS month'));
    }


}
