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

    public function getLast(){
        $location = DB::select('SELECT * FROM locations ORDER BY id DESC LIMIT 1');
        return response()->json($location);
    }

    public function getLastLocation(){
        return response()->json(Location::find(1));
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
}