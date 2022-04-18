<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\{State, City};

class DropdownController extends Controller
{
    /**
     * Get States via AJAX
     */
    public function fetchState(Request $request)
    {
        $states = State::where("country_code", $request->cc)->get(["state", "state_code"]);
        return response()->json($states);
    }

    /**
     * Get Cities via AJAX
     */
    public function fetchCity(Request $request)
    {
        $input = $request->all();
        $sc = $input['sc'];
        $cc = $input['cc'];
        $searchTerm = $input['q'];        
        $cities_obj = City::where("state_code", $sc);
        if ($searchTerm) {
            $cities_obj->where('city', 'like', '%'.$searchTerm.'%');
        }  
        if(!empty($cc)){
            $cities_obj->where('country_code', $cc);
        }      
        $cities = $cities_obj->get(["id","city as value"])->toArray();
        return response()->json($cities);            
    }
}
