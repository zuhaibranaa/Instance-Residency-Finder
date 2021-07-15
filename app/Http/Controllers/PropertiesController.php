<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\property;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class PropertiesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user();
        if($role['role_id'] == 1){
            $properties = property::all();
            return view('properties')->with('properties',$properties);
        }else if($role['role_id'] == 3){
            return '<html><head><title>Access Denied</title></head><body style="background-color: black; color:red;text-align: center"><h1>Access Denied</h1></body></html>';
        }
        else{
            // $properties = property::where('Seller_ID',$role->id);
            $properties = DB::table('properties')->where('Seller_ID', '=', $role->id)->get();
            $props = json_decode($properties,true);
            return view('properties')->with('properties',$props);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = property::find($id);
        if (auth()->user->id() == $property['Seller_ID']) {
            $property->delete();
        }
        return back();
    }
}
