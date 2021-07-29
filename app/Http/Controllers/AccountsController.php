<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()['role_id'] == 1) {
            $u  = User::all();
            return view('users')->with('users',$u)->with('admins',0);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $r = role::find(auth()->user()['role_id']);
        if (auth()->user()->id == $id) {
            $u = User::find($id);
            return view('edit_profile')->with('user',$u)->with('role',$r);
        }else {
            return abort(403, 'Unauthorized action.');
        }

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
        $user = User::find(auth()->user()->id);
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        if(auth()->user()->role_id != 1){
            $user->role_id = $request['role_id'];
        }
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect()->to('/');
        // return 123;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (auth()->user()->id == $user['id'] or auth()->user()['role_id'] == 1) {
            $user->delete();
        }
        return back();
    }
}
