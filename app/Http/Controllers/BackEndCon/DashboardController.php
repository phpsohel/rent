<?php

namespace App\Http\Controllers\BackEndCon;

use App\Customer;
use App\Group;
use App\Hajj;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
       

        $ll = Auth::user()->id;




//renter related information
         $renters = DB::table('renters')
                   ->where('landlord_id','=',$ll)
                   ->count();

        $paidrenters = DB::table('monthly_totals')
                    ->where('payment_status','=','Yes')
                    ->distinct('renter_name')
                    ->where('llord','=',$ll)
                    ->count();

         $duerenters = DB::table('monthly_totals')
                    ->where('payment_status','=','No')
                    ->distinct('renter_name')
                    ->where('llord','=',$ll)
                    ->count();


//house related information  
$houses = DB::table('houses')
                  ->where('llord_foreign_id','=',$ll)
                  ->count();






//flat related information
         $flats = DB::table('flats')
                  ->where('landlord_id','=',$ll)
                  ->count();

          $bookflats = DB::table('renter_flats')
                    ->where('landlord','=',$ll)
                      ->count();

        $freeflats = ($flats - $bookflats);


        $totalmoney = DB::table('monthly_totals')
                      ->where('llord','=',$ll)
                      ->sum('total_money');


        $collectmoney = DB::table('monthly_totals')
                        ->where('payment_status','=','Yes')
                        ->where('llord','=',$ll)
                        ->sum('total_money');

        $duemoney = DB::table('monthly_totals')
                        ->where('payment_status','=','No')
                        ->where('llord','=',$ll)
                        ->sum('total_money');
                      



    return view('Admin.dashboard',['renters'=>$renters,
        'paidrenters'=>$paidrenters,
        'duerenters'=>$duerenters,
        'houses'=>$houses,
         'flats'=>$flats,
         'bookflats'=>$bookflats,
         'freeflats'=>$freeflats,
         'totalmoney'=>$totalmoney,
         'collectmoney'=>$collectmoney,
         'duemoney'=>$duemoney
        ]);
    }



    
    public function paidRenter()
    {
        
         $ll = Auth::user()->id;

        $prs = DB::table('monthly_totals')
               ->where('payment_status','=','Yes')
               ->groupBy('renter_name')
               ->where('llord','=',$ll)
               ->get();

// dd($prs);


        return view('Admin.extra.paid-renter',[
            'prs'=>$prs
        ]);
    }

 


   public function dueRenter()
    {
        $ll = Auth::user()->id;

        $prs = DB::table('monthly_totals')
               ->where('payment_status','=','No')
               ->groupBy('renter_name')
               ->where('llord','=',$ll)
               ->get();




        return view('Admin.extra.due-renter',[
            'prs'=>$prs
        ]);
    }



}
