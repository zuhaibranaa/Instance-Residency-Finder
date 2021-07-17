<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\property;

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
        }else if($role['role_id'] == 2){
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
        return view('create_property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = array();
        if($request->hasFile('image')) {

            $images = $request->file('image');
            foreach($images as $image) {
                $path = $image->getClientOriginalName();
                $name = time() . '-' . $path;
                array_push($img,$name);
                $image->storeAs('gallery-images', $name);
            }
          }
        $string_array = json_encode($img);
        $property = new property();
        $property->Title = $request['title'];
        $property->Location = $request['location'];
        $property->Property_Type = $request['roleid'];
        $property->Seller_ID = auth()->user()->id;
        $property->Latitude = 75.22;
        $property->Longitude = 29.33;
        $property->image = $string_array;
        $property->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = property::find($id);
        return response()->json_encode($property);
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
        $property = property::find($id);
        $img = array();
        if($request->hasFile('image')) {

            $images = $request->file('image');
            foreach($images as $image) {
                $path = $image->getClientOriginalName();
                $name = time() . '-' . $path;
                array_push($img,$name);
                $image->storeAs('gallery-images', $name);
            }
          }
        $string_array = json_encode($img);
        if (auth()->user()->id == $property['Seller_ID']) {
            $property->Title = $request['title'];
            $property->Title = $request['Location'];
            $property->Title = $request['Property_Type'];
            $property->Title = $request['Latitude'];
            $property->Title = $request['Longitude'];
            $property->Title = $request['image'];
            $property->save();
            return back()->with('message','Data Updated Successfully');
        }else {
            echo "Permission Denied";
        }
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
