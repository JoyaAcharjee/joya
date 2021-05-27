<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class LocationController extends Controller
{
    public function Division()
    {
        $divisions = Division::all();
        return response()-> json([
            'divisions' => $divisions,
            'msg' => 'All division retrieved'
        ]);
    }
    public function createDivision(Request $request){
        $obj = new Division();
      $obj->name  = $request-> dname;
      if ($obj-> save()){
         return response()->json([
            'divisions' => $obj,
            'msg' => 'Successfully division created'
         ]);
      }
    }
    public function createDistrict(Request $request){
        $obj = new District();
      $obj->name  = $request-> disname;
      $obj->division_id = $request-> division;
      if ($obj-> save()){
         return response()->json([
            'district' => $obj,
            'msg' => 'Successfully district created'
         ]);
      }
    }
    public function getDistricts($divisionID){
      $districts = District:: where('division_id','=',$divisionID)
                            ->get();
                  return response()->json([
                    'districts' => $districts
                  ]);
    }
}
