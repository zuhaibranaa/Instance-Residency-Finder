<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\User;

class ComplainsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role_id == 1){
            $complains = Complain::all();
            return view('complains')->with('complains',$complains);
        }else {
            return abort(403, 'Permission denied.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user = User::all();
            return view('create_complain')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $complain = new Complain();
                $complain->text = $request['text'];
                $complain->against = $request['against'];
                $complain->by = auth()->user()->id;
                $complain->save();
                return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complain = Complain::find($id);
        $complain->delete();
        return back();
    }
}
