<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property;
use App\Models\User;

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
    public function search(Request $keywords)
    {
        $kw = $keywords['keywords'];
        $cat = $keywords['cat'];
        $price = $keywords['price'];
        if ($cat != 'All Categories') {
            if ($kw != null) {
                if ($price != null) {
                    $data = property::where('Location','like', '%' . $kw . '%')
                    ->where('Status', '=', 2)
                    ->where('price', '=', $price)
                    ->where('Property_Type', '=', $cat)
                    ->get();
                } else {
                    $data = property::where('Location','like', '%' . $kw . '%')
                    ->where('Status', '=', 2)
                    ->where('Property_Type', '=', $cat)
                    ->get();
                }

            } else {
                if ($price != null) {
                    $data = property::where('Property_Type', '=', $cat)
                    ->where('price', '=', $price)
                    ->where('Status', '=', 2)
                    ->get();
                } else {
                    $data = property::where('Property_Type', '=', $cat)
                    ->where('Status', '=', 2)
                    ->get();
                }

            }

        } else {
            if ($kw != null) {
                if ($price != null) {
                    $data = property::where('Location','like', '%' . $kw . '%')
                    ->where('price', '=', $price)
                    ->where('Status', '=', 2)
                    ->get();
                } else {
                    $data = property::where('Location','like', '%' . $kw . '%')
                    ->where('Status', '=', 2)
                    ->get();
                }
            } else {
                if ($price != null) {
                    $data = property::where('Status', '=', 2)
                    ->where('price', '=', $price)
                    ->get();
                } else {
                    $data = property::where('Status', '=', 2)
                    ->get();
                }
            }
        }

        return view('search')->with('data',$data);
    }

    public function index()
    {
        $role = auth()->user();
        if($role['role_id'] == 1){
            $properties = property::all();
            return view('properties')->with('properties',$properties);
        }else if($role['role_id'] == 2){
            $properties = property::where('Seller_ID',$role->id)->get();
            // $properties = DB::table('properties')->where('Seller_ID', $role->id)->get();
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
                $image->storeAs('/public/images', $name);
            }
          }
        $string_array = json_encode($img);
        $property = new property();
        $property->status = 1;
        $property->Title = $request['title'];
        $property->Location = $request['location'];
        $property->Property_Type = $request['roleid'];
        $property->Seller_ID = auth()->user()->id;
        $property->price = $request['price'];
        $property->image = $string_array;
        $property->save();
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = property::find($id);
        $user = User::find($property->Seller_ID);

        return view('singleprop')->with('property',$property)->with('user',$user);
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
        if (auth()->user()->id == $property['Seller_ID']) {
            return view('update_property')->with('property',$property);
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
        $property = property::find($id);
        $img = array();
        if($request->hasFile('image')) {

            $images = $request->file('image');
            foreach($images as $image) {
                $path = $image->getClientOriginalName();
                $name = time() . '-' . $path;
                array_push($img,$name);
                $image->storeAs('/public/images', $name);
            }
          }
        $string_array = json_encode($img);
        if (auth()->user()->id == $property['Seller_ID']) {
            $property->Title = $request['title'];
            $property->Location = $request['location'];
            $property->Property_Type = $request['roleid'];
            $property->price = $request['price'];
            $property->status = 1;
            $property->image = $request['image'];
            $property->save();
            return back()->with('message','Data Updated Successfully');
        }else {
            return abort(403, 'Unauthorized action.');
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
        if (auth()->user()->id == $property['Seller_ID']) {
            $property->delete();
        }
        return back();
    }
}
