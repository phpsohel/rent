<?php

namespace App\Http\Controllers\BackEndCon;

use App\Renter_flat;
use App\Flat;
use App\House;
use App\Renter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RflatController extends Controller
{
    public function addRflat()
    {
        
        $ll = Auth::user()->id;
        $renters = DB::table('renters')
                    ->where('landlord_id','=',$ll)
                    ->get();

        $flats = DB::table('flats')
                     ->where('f_available','=','Yes')
                     ->where('landlord_id','=',$ll)
                    ->get();           


        return view('Admin.rflat.add-rflat',[
            'renters'=>$renters,
              'flats'=>$flats
          ]);
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






    public function saveRflat(Request $request)
    {


        
        $rflat = $request->validate([
        'flat' => 'unique:renter_flats,flat_id',
        'start_date' => 'required',
        'rent' => 'required',
        
    ]);


        $rflat = new Renter_flat();
        $rflat->landlord = Auth::user()->id;
        $rflat->flat_id = $request->flat;
        $rflat->renter_id = $request->renter;
        $rflat->advance = $request->advance;
        $rflat->start_date = $request->start_date;
        $rflat->end_date = $request->end_date;
        $rflat->rent = $request->rent;


//for water
         $aa = $request->water;
         if (is_null($aa)) 
         {
             
             $rflat->water = 0;
            
         }

         else
         {
            $rflat->water = $aa;
         }

//for gas
        
        $bb = $request->gas;
         if (is_null($bb)) 
         {
             
             $rflat->gas = 0;
            
         }

         else
         {
            $rflat->gas = $bb;
         }

//for sewer
         $cc = $request->sewer;
         if (is_null($cc)) 
         {
             
             $rflat->sewer = 0;
            
         }

         else
         {
            $rflat->sewer = $cc;
         }


//for current
         $dd = $request->current;
         if (is_null($dd)) 
         {
             
             $rflat->current = 0;
            
         }

         else
         {
            $rflat->current = $dd;
         }

 //for maintainance cost
       $ee = $request->maintain_cost;
         if (is_null($ee)) 
         {
             
             $rflat->maintain_cost = 0;
            
         }

         else
         {
            $rflat->maintain_cost = $ee;
         }  


//for others
      $ff = $request->others;
         if (is_null($ff)) 
         {
             
             $rflat->others = 0;
            
         }

         else
         {
            $rflat->others = $ff;
         }  


        
        // $rflat->gas = $request->gas;
        // $rflat->sewer = $request->sewer;
        // $rflat->current = $request->current;
        // $rflat->maintain_cost = $request->maintain_cost;
        // $rflat->others = $request->others;
        $rflat->save();

        return redirect('/add-rflat')->with('message','Renter Flat added successfully');
    }




    public function viewRflat()
    {
       
         
          $ll = Auth::user()->id;
           $ff = Auth::user()->user_level;


           if ($ff == 1) 
           {
               $rflats = DB::table('renter_flats')
            ->leftJoin('renters', 'renter_flats.renter_id', '=', 'renters.r_id')
            ->leftJoin('flats', 'renter_flats.flat_id', '=', 'flats.f_id')
            ->leftJoin('users', 'renter_flats.landlord', '=', 'users.id')
            ->get();

         return view('Admin.rflat.developer-view-rflat',['rflats'=>$rflats]);
           }


           else
           {
              $rflats = DB::table('renter_flats')
            ->leftJoin('renters', 'renter_flats.renter_id', '=', 'renters.r_id')
            ->leftJoin('flats', 'renter_flats.flat_id', '=', 'flats.f_id')
            ->where('landlord','=',$ll)
            ->get();

          // dd($rflats);

         return view('admin.rflat.view-rflat',['rflats'=>$rflats]);
           }

        
    }



    // public function viewFlat()
    // {
    //     $flats = Flat::all();
    //     return view('Admin.flat.view-flat',[
    //         'flats'=>$flats
    //     ]);
    // }




  
  public function editRflat($id)
    {
        
         
        
  $rflats = DB::table('renter_flats')

            ->leftJoin('renters', 'renter_flats.renter_id', '=', 'renters.r_id')
            ->leftJoin('flats', 'renter_flats.flat_id', '=', 'flats.f_id')
           
            ->where('rf_id','=',$id)
            ->get();
         return view('admin.rflat.edit-rflat',['rflats'=>$rflats]);



        // $rflats = Renter_flat::find($id)->where('rf_id','=',$id)->get();
        // return view('Admin.rflat.edit-rflat',[
        //     'rflats'=>$rflats
        // ]);
    }




public function updateRflat(Request $request)
    {
        $rflat = Renter_flat::find($request->rf_id);
        $rflat->advance = $request->advance;
        $rflat->start_date = $request->start_date;
        $rflat->end_date = $request->end_date;
        $rflat->rent = $request->rent;
        $rflat->water = $request->water;
        $rflat->gas = $request->gas;
        $rflat->sewer = $request->sewer;
        $rflat->current = $request->current;
        $rflat->maintain_cost = $request->maintain_cost;
        $rflat->others = $request->others;
        $rflat->save();  

        return redirect('/view-rflat')->with('message','Renter Flat information updated successfully');
    }




    // public function publishedFlat($id)
    // {
    //    $flat = Flat::find($id);
    //    $flat->f_status = 0;
    //    $flat->save();

    //    return redirect('/view-flat');
    // }

    // public function unpublishedFlat($id)
    // {
    //     $flat = Flat::find($id);
    //     $flat->f_status = 1;
    //     $flat->save();

    //     return redirect('/view-flat');
    // }




   //  public function editCountry($id)
   //  {
   //      $countries = Country::find($id);
   //      $countries->get();

   //      return view('Admin.country.edit-country',['countries'=>$countries]);
    



    public function deleteRflat($id)
    {
        $rflat = Renter_flat::find($id);
        $rflat->delete();

        return redirect('/view-rflat')->with('message','Renter Flat information deleted successfully');
    }


   





}
