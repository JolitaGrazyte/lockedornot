<?php

namespace App\Http\Controllers;

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
        return view('profile.index');
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
        $this->authUser->update($request->all());

        Session::flash('message', 'You have succefully updated your profile.');
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
