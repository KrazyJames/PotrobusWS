<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getLastLocation(){
        return response()->json(Location::find(1));
    }

    public function insertLastLocation(){

    }
    
    public function updateLastLocation(Request $request){
        $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required'
        ]);
        $location = Location::findOrFail(1);
        $location->update($request->all());
        return response()->json($location, 200);
    }

    public function deleteLastLocation(){
        
    }
}