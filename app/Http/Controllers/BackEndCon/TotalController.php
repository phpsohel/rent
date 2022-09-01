<?php

namespace App\Http\Controllers\BackEndCon;


use App\Renter_flat;
use App\Flat;
use App\Renter;
use App\Monthly_total;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

// use App\Http\Middleware;

class TotalController extends Controller
{
    public function addTotal()
    {
        
         
        $ll = Auth::user()->id;

        $renflats = DB::table('renter_flats')
                    ->leftJoin('flats', 'renter_flats.flat_id', '=', 'flats.f_id')
                    ->where('landlord','=',$ll)
                    ->get();


        return view('Admin.total.add-total',[

              'renflats'=>$renflats
          ]);
    }


    public function getTotal(Request $request)
    {
        
       



        $rftotals = DB::table('renter_flats')

            ->leftJoin('renters', 'renter_flats.renter_id', '=', 'renters.r_id')
            ->leftJoin('flats', 'renter_flats.flat_id', '=', 'flats.f_id')
           
            ->where('flat_id','=',$request->get('Flat'))
            ->get();

            
         return view('Admin.total.get-total',['rftotals'=>$rftotals]);
    }






    public function saveTotal(Request $request)
    {
        
       


        $total = new Monthly_total();
   
        $total->llord = Auth::user()->id;
        $total->mt_rf_id = $request->mt_rf_id;
        $total->m_house = $request->m_house;
        $total->flat_number = $request->flat_number;
        $total->renter_name = $request->renter_name;
        $total->mt_date = $request->mt_date;

        $a = $request->mt_rent;
        $b = $request->mt_water;
        $c = $request->mt_gas;
        $d = $request->mt_sewer;
        $e = $request->mt_current;
        $f = $request->mt_others_cost;
        $g = $request->mt_maintain;



        $total->mt_rent = $a;
        $total->mt_water = $b;
        $total->mt_gas = $c;
        $total->mt_sewer = $d;
        $total->mt_current = $e;
        $total->mt_others_cost = $f;
        $total->mt_maintain = $g;
         
         $henlo = ($a+$b+$c+$d+$e+$f+$g);


        $total->total_money = $henlo;
        $total->payment_date = $request->payment_date;
        $total->payment_status = $request->payment_status;



    $ab = $request->flat_number;
    $bb = $request->mt_date;
    $cc = $request->m_house;
     $month = date("m",strtotime($bb));


     $matchThese = ['flat_number' => $ab];
     $matchTheseToo = ['m_house' => $cc];
     $results = Monthly_total::where($matchThese)->where($matchTheseToo)->whereMonth('mt_date','=',$month)->first();

     

 if (is_null($results))
 {
            $total->save();
            return redirect('/add-total')->with('message','Monthly Total added successfully');
 }

 else
 {
     return redirect('/add-total')->with('message3','Information Already Exists');
 }




 

     // $pp = $request->mt_rf_id;
     // $rr = Monthly_total::where('mt_rf_id', $pp)->first();
   
     //    if (is_null($rr)) 
     //    {
            
     //         $total->save();
     //        return redirect('/add-total')->with('message','Monthly Total added successfully');
            
           
            

     //    }

     //   else
     //   {
     //      return redirect('/add-total')->with('message2','Flat Number Already Exists');
     //   }
        


        
    }




    public function viewTotal()
    {
       
         $ll = Auth::user()->id;
         $ff = Auth::user()->user_level;

         if ($ff == 1) 
         {
            $totals = DB::table('monthly_totals')
                   ->leftJoin('users', 'monthly_totals.llord', '=', 'users.id')
            // ->where('llord','=',$ll)
            ->get();

         return view('Admin.total.developer-view-total',['totals'=>$totals]);
         }

       
       else

       {
         $totals = DB::table('monthly_totals')
            ->where('llord','=',$ll)
            ->get();
         return view('Admin.total.view-total',['totals'=>$totals]);
       }


         
    }





  
  public function editTotal($id)
    {
        
         
        
  $totals = DB::table('monthly_totals')

            // ->leftJoin('renters', 'monthly_totals.mt_renter_id', '=', 'renters.r_id')
            // ->leftJoin('flats', 'monthly_totals.mt_flat_id', '=', 'flats.f_id')
           
            ->where('mt_id','=',$id)
            ->get();
         return view('Admin.total.edit-total',['totals'=>$totals]);



        
    }




public function updateTotal(Request $request)
    {
        $total = Monthly_total::find($request->mt_id);
        $total->mt_date = $request->mt_date;

        
        $a = $request->mt_rent;
        $b = $request->mt_water;
        $c = $request->mt_gas;
        $d = $request->mt_sewer;
        $e = $request->mt_current;
        $f = $request->mt_others_cost;
        $g = $request->mt_maintain;



        $total->mt_rent = $a;
        $total->mt_water = $b;
        $total->mt_gas = $c;
        $total->mt_sewer = $d;
        $total->mt_current = $e;
        $total->mt_others_cost = $f;
        $total->mt_maintain = $g;
         
         $henlo = ($a+$b+$c+$d+$e+$f+$g);

        $total->total_money = $henlo;
        $total->payment_date = $request->payment_date;
        $total->payment_status = $request->pasta;

        
        $total->save();  

        return redirect('/view-total')->with('message','Monthly Total information updated successfully');
    }




    public function publishedTotal($id)
    {
       $total = Monthly_total::find($id);
       $total->payment_status = 'No';
       $total->save();

       return redirect('/view-total');
    }

    public function unpublishedTotal($id)
    {
        $total = Monthly_total::find($id);
        $total->payment_status = 'Yes';
        $total->save();

        return redirect('/view-total');
    }


    



    public function deleteTotal($id)
    {
        $total = Monthly_total::find($id);
        $total->delete();

        return redirect('/view-total')->with('message','Monthly total information deleted successfully');
    }


   
public function createReceipt()
{
    return view('Admin.total.create-receipt');
}



public function saveReceipt(Request $request)
{
     
     

     
    if ($a = $request->get('mt_date'))
    {
       
       

       $ll = Auth::user()->id;

       $month = date("m",strtotime($a));
       $re = DB::table('monthly_totals')
            //  ->leftJoin('renters', 'monthly_totals.mt_renter_id', '=', 'renters.r_id')
            // ->leftJoin('flats', 'monthly_totals.mt_flat_id', '=', 'flats.f_id')
            ->where('llord','=',$ll)
            ->whereMonth('mt_date','=',$month)
            ->get();

          
       
       if($re->isEmpty())
       {
         return redirect('/create-receipt')->with('message','No entry in this month');
       }
       else
       {
         return view('Admin.total.make-receipt',['re'=>$re]);
       }

            
    }


    else
    {
        return redirect('/create-receipt')->with('message','No specific entry');
    }



}

}