<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use App\DaysEnum;
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

//    public static function personalStats($user_id)
//    {
//        return DB::table('stats')
//                ->select(DB::raw( 'user_id, created_at, device_state'))
//                ->where('user_id', $user_id)
//                ->groupBy('created_at')
//                ->get();
//    }
//
//    public static function personalStatsWeek($user_id)
//    {
//        $now    = Carbon::now();
//        $start  = $now->subDays(7);
//
//        return DB::table('stats')
//            ->select(DB::raw( 'user_id, created_at, device_state'))
//            ->where('created_at','>', $start)
//            ->where('user_id', $user_id)
//            ->get();
//    }
//
//    public static function statsMonthly($user_id, $month, $state)
//    {
//        return DB::table('stats')
//            ->select(DB::raw( 'count(device_state) as count'))
//            ->whereRaw('MONTH(created_at) = '.$month)
//            ->where('user_id', $user_id)
//            ->where('device_state', $state)
//            ->get();
//    }
//
//    public static function statsHourly($user_id, $day, $hour, $state){
//
//             return DB::table('stats')
//                 ->select(DB::raw( 'count(device_state) as count'))
//                 ->whereRaw('DAY(created_at) = '.$day)
//                 ->whereRaw('HOUR(created_at) = '.$hour)
//                 ->where('user_id', $user_id)
//                 ->where('device_state', $state)
//                 ->get();
//    }
//
//    public static function statsDaily($user_id, $month,  $day ,$state){
//
//        return DB::table('stats')
//            ->select(DB::raw( 'count(device_state) as count, created_at'))
////            ->whereRaw('YEAR(created_at) = '.$year)
//            ->whereRaw('MONTH(created_at) = '.$month)
//            ->whereRaw('DAY(created_at) = '.$day)
//            ->where('user_id', $user_id)
//            ->where('device_state', $state)
//            ->get();
//    }
//
//    public static function statsDailyTotal($user_id, $month,  $day){
//
//        return DB::table('stats')
//            ->select(DB::raw( 'count(device_state) as count, created_at, device_state'))
////            ->whereRaw('YEAR(created_at) = '.$year)
//            ->whereRaw('MONTH(created_at) = '.$month)
//            ->whereRaw('DAY(created_at) = '.$day)
//            ->where('user_id', $user_id)
//            ->get();
//    }

    public function scopeLockedStats($q){
        return $q->where('device_state', 1);
    }

    public function scopeUnlockedStats($q){
        return $q->where('device_state', 0);
    }

    public function scopeMonthlyStats($q, $month){
        return $q->whereRaw('MONTH(created_at) = '.$month);
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
