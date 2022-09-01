








public function saveTotal(Request $request)
    {
        
       


        $total = new Monthly_total();
   

        $total->mt_rf_id = $request->mt_rf_id;
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
 
//get month from request
$ss = $request->mt_date;
$sn = date("m",strtotime($ss));


//get month from database table monthly_rents
$pp = $request->mt_rf_id;
$collect = Monthly_total::where('mt_rf_id', $pp)->first('mt_date');
$nn = date("m",strtotime($collect));


     $rr = Monthly_total::where('mt_rf_id', $pp)->first();

        if (is_null($rr)) 
        {
            
             $total->save();
            return redirect('/add-total')->with('message','Monthly Total added successfully');
            
           
            

        }

       else
       {
          
            if($sn = $nn)
            {
                
                return redirect('/add-total')->with('message3','rent of this month is already added');

            }

            else
            {
               $total->save();
            return redirect('/add-total')->with('message','Monthly Total added successfully');

            }
             


          return redirect('/add-total')->with('message2','Flat Number Already Exists');
            
       }
        



        
    }
















    public function saveTotal(Request $request)
    {
        
       


        $total = new Monthly_total();
   

        $total->mt_rf_id = $request->mt_rf_id;
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


        $w = $request->mt_date;
        $ww = date("m",strtotime($w));
 

     $pp = $request->mt_rf_id;
     $rr = Monthly_total::where('mt_rf_id', $pp)->first('mt_date');
     $tt = date("m",strtotime($rr));
    


       if ($ww = $tt) 
       {
        
        return redirect('/add-total')->with('message3','Rent of this month is already added');
       }

       else
       {
           $total->save();
            return redirect('/add-total')->with('message','Monthly Total added successfully');
       }







       //  if (is_null($rr)) 
       //  {
            
       //       $total->save();
       //      return redirect('/add-total')->with('message','Monthly Total added successfully');
            
           
            

       //  }

       // else
       // {
       //    return redirect('/add-total')->with('message2','Flat Number Already Exists');
       // }
        



        
    }