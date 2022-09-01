<?php

namespace App\Http\Controllers\BackEndCon;

use App\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HouseController extends Controller
{
    public function addHouse()
    
    {
        return view('Admin.house.add-house');
    }





    public function saveHouse(Request $request)
    {


        $house = $request->validate([
        'holding_no' => 'required',
        'road_no' => 'required',
        'city' => 'required',
        'thana' => 'required',
        'district' => 'required',     
    ]);

        $house = new House();
        $house->house_name = $request->house_name;
        $house->holding_no = $request->holding_no;
        $house->road_no = $request->road_no;
        $house->city = $request->city;
        $house->thana = $request->thana;
        $house->district = $request->district;
        $house->llord_foreign_id = Auth::user()->id;
        $house->save();
        return redirect('/add-house')->with('message','House added successfully');
    }





    public function viewHouse()
    {
        
         $ll = Auth::user()->id;
          
          $ff = Auth::user()->user_level;
          // dd($ff);
        

if($ff == 1)
{
    $houses = DB::table('houses')
            ->leftJoin('users', 'houses.llord_foreign_id', '=', 'users.id')
            ->get();

        return view('Admin.house.developer-view-house',[
            'houses'=>$houses
        ]);
}




else

   {
        $houses = DB::table('houses')
            ->leftJoin('users', 'houses.llord_foreign_id', '=', 'users.id')
            ->where('llord_foreign_id','=',$ll)
            ->get();

     // dd($houses);
   // $houses = House::where('llord_foreign_id','=',$ll)->get();

     
        return view('Admin.house.view-house',[
            'houses'=>$houses
        ]);
   }

        
    }




  
  public function editHouse($id)
    {
        $houses = House::find($id)->where('h_id','=',$id)->get();
        return view('Admin.house.edit-house',[
            'houses'=>$houses
        ]);
    }




public function updateHouse(Request $request)
    {
        $house = House::find($request->h_id);
        $house->house_name = $request->house_name;
        $house->holding_no = $request->holding_no;
        $house->road_no = $request->road_no;
        $house->city = $request->city;
        $house->thana = $request->thana;
        $house->district = $request->district;
        $house->save();  

        return redirect('/view-house')->with('message','House information updated successfully');
    }



    public function deleteHouse($id)
    {
        $house = House::find($id);
        $house->delete();

        return redirect('/view-house')->with('message','House information deleted successfully');
    }


   





}
