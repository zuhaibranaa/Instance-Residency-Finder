<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Models\role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $role = role::find($user['role_id']);
        if ($role['id'] == 1) {
            return view('home')->with('role',$role);
        }else if ($role['id'] == 3) {
            $data = property::all();
            return view('home')->with('role',$role)->with('data',$data);
        }else {
            $data = property::where('Seller_ID',$user);
            return view('home')->with('role',$role)->with('data',$data);
        }
    }
}
