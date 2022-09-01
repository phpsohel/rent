<?php

namespace App\Http\Controllers\BackEndCon;

use App\Flat;
use App\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class FlatController extends Controller
{
    public function addFlat()
    {
        
        $ll = Auth::user()->id;

        $houses = House::where('llord_foreign_id','=',$ll)->get();
        // dd($houses);

        return view('Admin.flat.add-flat',['houses'=>$houses]);
    }




// protected function flatValidate($request)
//     {
//         $this->validate($request,[
//             'f_number'=>'required|unique:posts',
//             'f_floor' => 'required',
//             'f_sqft' => 'required',
//             'f_available' => 'required'
//             // 'f_floor' => 'required',
//         ]);
//     }






    public function saveFlat(Request $request)
    {

       // $this->fileValidate($request);
      $ll = Auth::user()->id;

    //     $flat = $request->validate([
    //     'f_number' => 'required|unique:flats',
    //     'house' => 'required',
    //     'f_floor' => 'required',
    //     'f_sqft' => 'required',
    //     'f_status' => 'required',
    // ]);



// $ww = DB::table('flats')
//       ->distinct('house')
//       ->get('house');     
$pp = $request->house;
$ff = $request->f_number;
// dd($pp);
$ss = Flat::where('house', '=', $pp)->get('house');
// dd($ss);
$rr = Flat::where('house', '=', $pp)->get('f_number');
// dd($rr);




$s = DB::table('flats')->where([
    ['house', '=', $pp],
    ['f_number', '=', $ff],
])->first();


// dd($s);



     if($s==null)
     {
        

        $flat = new Flat();
        $flat->f_number = $request->f_number;
        $flat->landlord_id = Auth::user()->id;
        $flat->house = $request->house;
        $flat->f_floor = $request->f_floor;
        $flat->f_sqft = $request->f_sqft;
        $flat->f_available = $request->avi;
        $flat->f_status = $request->f_status;

        $flat->save();
        return redirect('/add-flat')->with('message','Flat added successfully');

     }

     else
       
       {
              
        // dd('henlo');

        $flat = $request->validate([
        'f_number' => 'required|unique:flats',
        ]);

          $flat = new Flat();
        $flat->f_number = $request->f_number;
        $flat->landlord_id = Auth::user()->id;
        $flat->house = $request->house;
        $flat->f_floor = $request->f_floor;
        $flat->f_sqft = $request->f_sqft;
        $flat->f_available = $request->avi;
        $flat->f_status = $request->f_status;

        $flat->save();
        return redirect('/add-flat')->with('message','Flat added successfully');
       }
        



    }





    public function viewFlat()
    {
        
         $ll = Auth::user()->id;
         $ff = Auth::user()->user_level;



         if ($ff == 1) 
         {
        //     $flats = Flat::get();
        // return view('Admin.flat.developer-view-flat',[
        //     'flats'=>$flats
        // ]);
 
         $flats = DB::table('flats')
            ->leftJoin('users', 'flats.landlord_id', '=', 'users.id')
            ->get();

         return view('Admin.flat.developer-view-flat',[
            'flats'=>$flats
        ]);


         }


         else
           {
             $flats = Flat::where('landlord_id','=',$ll)->get();
        // dd($flats);
        return view('Admin.flat.view-flat',[
            'flats'=>$flats
        ]);
           }

        
    }




  
  public function editFlat($id)
    {
        $flats = Flat::find($id)->where('f_id','=',$id)->get();
        // dd($flats);
        $ll = Auth::user()->id;
        $houses = House::where('llord_foreign_id','=',$ll)->get();
        // $houses = House::all();
        return view('Admin.flat.edit-flat',[
            'flats'=>$flats,
            'houses'=>$houses
        ]);
    }




public function updateFlat(Request $request)
    {
        $flat = Flat::find($request->f_id);
         $flat->house = $request->house;
        $flat->f_number = $request->f_number;
        $flat->f_floor = $request->f_floor;
        $flat->f_sqft = $request->f_sqft;
        $flat->f_available = $request->avi;

    //     $flat = $request->validate([

    //     'f_available' => 'in:YES,NO',
    // ]);

        $flat->save();  

        return redirect('/view-flat')->with('message','Flat information updated successfully');
    }




    public function publishedFlat($id)
    {
       $flat = Flat::find($id);
       $flat->f_status = 0;
       $flat->save();

       return redirect('/view-flat');
    }

    public function unpublishedFlat($id)
    {
        $flat = Flat::find($id);
        $flat->f_status = 1;
        $flat->save();

        return redirect('/view-flat');
    }




   //  public function editCountry($id)
   //  {
   //      $countries = Country::find($id);
   //      $countries->get();
   //      return view('Admin.country.edit-country',['countries'=>$countries]);
    



    public function deleteFlat($id)
    {
        $flat = Flat::find($id);
        $flat->delete();

        return redirect('/view-flat')->with('message','Flat information deleted successfully');
    }


   





}
