<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\DaysEnum;
use DB;
class Stats extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stats';

    protected $days    = [
        1 => DaysEnum::monday,
        2 => DaysEnum::tuesday,
        3 => DaysEnum::wednesday,
        4 => DaysEnum::thursday,
        5 => DaysEnum::friday,
        6 => DaysEnum::saturday,
        7 => DaysEnum::sunday,
    ];

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

    public static function personalStats($user_id)
    {
        return DB::table('stats')
                ->select(DB::raw( 'user_id, created_at, device_state'))
                ->where('user_id', $user_id)
                ->get();
    }

    public static function personalStatsWeek($user_id)
    {
        $now    = Carbon::now();
        $start  = $now->subDays(7);
//        dd($start);
        return DB::table('stats')
            ->select(DB::raw( 'user_id, created_at, device_state'))
            ->where('created_at','>', $start)
            ->where('user_id', $user_id)
            ->get();
    }

    public static function statsMonthly($user_id, $month, $state)
    {
//        $now    = Carbon::now();
//        $start  = $now->subDays(7);
//        dd($start);
        return DB::table('stats')
//            ->select(DB::raw( 'MONTH(`created_at`) as month,  user_id, created_at, count(device_state)'))
            ->select(DB::raw( 'count(device_state) as count'))
            ->whereRaw('MONTH(created_at) = '.$month)
            ->where('user_id', $user_id)
            ->where('device_state', $state)
            ->get();
    }




}
