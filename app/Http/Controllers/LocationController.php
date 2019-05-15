<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function getAllLocations(){
         return response()->json(Location::all());
    }

    public function getLastLocation(){
        $locations = DB::select('SELECT * FROM locations ORDER BY id DESC LIMIT 1');
        $location = $locations[0];
        return response()->json($location);
    }

    public function insertLocation(Request $request){
        $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required'
        ]);
        $locationArray = Location::create($request->all());
        $location = $locationArray[0];
        return response()->json($location);
    }

    public function updateLocation(Request $request){
        $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required'
        ]);
        $location = Location::findOrFail(1);
        $location->update($request->all());
        return response()->json($location, 200);
    }
}