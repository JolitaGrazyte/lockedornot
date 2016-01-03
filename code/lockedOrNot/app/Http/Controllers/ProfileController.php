<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param $full_name
     * @return \Illuminate\Http\Response
     * @internal param string $name
     */
    public function edit($full_name)
    {
        $name = explode('-', $full_name);
        $user = Auth::check()? AUth::user()->where('first_name', $name[0])->where('last_name', $name[1])->first() : '';
        return view('profile.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
