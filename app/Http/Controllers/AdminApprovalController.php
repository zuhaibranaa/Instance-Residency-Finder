<?php

namespace App\Http\Controllers;

use App\Models\property;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $role = auth()->user();
        if($role['role_id'] == 1){
            $properties = property::where('status', 1)->get();
            // return 123;
            return view('PendingApprovals')->with('properties',$properties);
        }else{
            return abort(403, 'Permission denied.');
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
        if (auth()->user()['role_id'] == 1) {
            $property = property::find($id);
            $property->status = 2;
            $property->save();
            return back();
        }else{
            return abort(403, 'Permission denied.');
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
        if (auth()->user()['role_id'] == 2) {
            $property = property::find($id);
            $property->delete();
        return back();
        }else{
            return abort(403, 'Permission Denied.');
        }
    }
}
