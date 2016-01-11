<?php

namespace App\Http\Controllers;

use App\Device;
use App\Stats;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Response;
use Session;

class ProfileController extends Controller
{

    private $authUser;

    public function __construct(){

        $this->authUser = Auth::check() ? Auth::user() : null;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = $this->authUser;
        $unlocked_devices = $user->devices()->unlocked();

        $msg = $unlocked_devices->count() == 0 ? 'Your car is not locked!': 'Your car is locked yet!';
        $stats = $this->authUser->stats;

        $stats_true     = $user->unlockedStats()->count();
        $paranoia_stats = $user->paranoiaStats()->count();
        $stats_total    = $stats->count();
        $percent_true   = $stats_true*100/$stats_total;

        $st = new Stats();
        $days = $st->days();

        return view('profile.index', compact('stats_true', 'paranoia_stats', 'stats_total', 'device_state', 'percent_true', 'msg', 'days'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @internal param string $name
     */
    public function edit()
    {
        $user = $this->authUser;
        return view('profile.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest|Request $request
     * @param  int $id
     * @return Response
     */
    public function update( ProfileRequest $request, $id)
    {
        $user = $this->authUser;
        $user->update($request->all());
        $q = $request->get('quantity');

        //Todo: for many devices per user
//        if($q=5){
//
//        }
//        $device = $user->devices && $user->devices->count() < 1 ?
//                    $user->devices->device_nr = $request->device_nr :
//                    Device::create([
//                        'device_nr'     => $request->device_nr,
//                        'user_id'       => $user->id
//                    ]);

//        $device->save();


        Session::flash('message', 'You have successfully updated your profile.');
        Session::flash('alert-class', 'alert-success');

        return redirect()->back();

    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }


    public function updatePassword(){

    }

}
