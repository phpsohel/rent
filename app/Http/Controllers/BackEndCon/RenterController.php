<?php

namespace App\Http\Controllers\BackEndCon;

use App\Renter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenterController extends Controller
{
    

   // public function index()
   // {
   //  $renters = DB::table('renters')
   //                 ->count();

   //      $paidrenters = DB::table('monthly_totals')
   //                  ->where('payment_status','=',1)
   //                  ->count();

   //       $duerenters = DB::table('monthly_totals')
   //                  ->where('payment_status','=',1)
   //                  ->count();

   //  return view('Admin.dashboard',['renters'=>$renters,'paidrenters'=>$paidrenters,'duerenters'=>$duerenters]);
   // }







    public function addRenter()
    {
        return view('Admin.renter.add-r');
    }








    

    public function saveRenter(Request $request)
    {




        if ($renterImage = $request->file('r_image')) 

        {

        $imageName = $renterImage->getClientOriginalName();
        $directory = 'public/admin/renter-images/';
        $imageUrl = $directory.$imageName;
        $renterImage->move($directory,$imageName);



       $renter = $request->validate([
        'r_name' => 'required',
        'r_phone' => 'required|max:14',
        'e_phone' => 'required|max:14',
        'member_phone_one' => 'required|max:14',
        'member_phone_two' => 'max:14',
        'member_phone_three' => 'max:14',
        'maid_phone' => 'max:14',
        'driver_phone' => 'max:14',
        'pre_owner_phone' => 'max:14',
        'new_owner_phone' => 'max:14',
        'per_address' => 'required',
        'r_nid' => 'required|max:10',
        'maid_nid' => 'max:10',
        'driver_nid' => 'max:10',
    ]);



        $renter = new Renter();
        $renter->r_image = $imageUrl;
        $renter->landlord_id = Auth::user()->id;
        $renter->r_name = $request->r_name;
        $renter->father = $request->father;
        $renter->birthday = $request->birthday;
        $renter->marital_status = $request->marital_status;
        $renter->per_address = $request->per_address;
        $renter->occupation = $request->occupation;
        $renter->company = $request->company;
        $renter->religion = $request->religion;
        $renter->qualification = $request->qualification;
        $renter->r_phone = $request->r_phone;
        $renter->r_email = $request->r_email;
        $renter->r_nid = $request->r_nid;
        $renter->p = $request->p;
        

        
        $renter->e_full_name = $request->e_full_name;
        $renter->e_rel = $request->e_rel;
        $renter->e_add = $request->e_add;


        $renter->e_phone = $request->e_phone;
        $renter->member_name_one = $request->member_name_one;
        $renter->member_age_one = $request->member_age_one;
        $renter->member_occupation_one = $request->member_occupation_one;
        $renter->member_phone_one = $request->member_phone_one;

        $renter->member_name_two = $request->member_name_two;
        $renter->member_age_two = $request->member_age_two;
        $renter->member_occupation_two = $request->member_occupation_two;
        $renter->member_phone_two = $request->member_phone_two;

        $renter->member_name_three = $request->member_name_three;
        $renter->member_age_three = $request->member_age_three;
        $renter->member_occupation_three = $request->member_occupation_three;
        $renter->member_phone_three = $request->member_phone_three;

        $renter->maid_name = $request->maid_name;
        $renter->maid_nid = $request->maid_nid;
        $renter->maid_phone = $request->maid_phone;
        $renter->maid_address = $request->maid_address;

        $renter->driver_name = $request->driver_name;
        $renter->driver_nid = $request->driver_nid;
        $renter->driver_phone = $request->driver_phone;
        $renter->driver_address = $request->driver_address;

        $renter->pre_owner_name = $request->pre_owner_name;
        $renter->pre_owner_phone = $request->pre_owner_phone;
        $renter->pre_owner_address = $request->pre_owner_address;
        $renter->reason = $request->reason;

        $renter->new_owner_name = $request->new_owner_name;
        $renter->new_owner_phone = $request->new_owner_phone;
        $renter->new_house_start_date = $request->new_house_start_date;

        $renter->status = $request->status;
        

         // dd($renter);

        $renter->save();
        return redirect('/add-renter')->with('message','Renter added successfully');

        }



        else
        {


          $renter = $request->validate([

          'r_name' => 'required',
        'r_phone' => 'required|max:14',
        'e_phone' => 'required|max:14',
        'member_phone_one' => 'required|max:14',
        'member_phone_two' => 'max:14',
        'member_phone_three' => 'max:14',
        'maid_phone' => 'max:14',
        'driver_phone' => 'max:14',
        'pre_owner_phone' => 'max:14',
        'new_owner_phone' => 'max:14',
        'per_address' => 'required',
        'r_nid' => 'required|max:10',
        'maid_nid' => 'max:10',
        'driver_nid' => 'max:10',


        // 'r_name' => 'required',
        // 'r_phone' => 'required|max:11',
        // 'per_address' => 'required',
        // 'r_nid' => 'required|max:10',
    ]);



        $renter = new Renter();

        $renter->landlord_id = Auth::user()->id;
        $renter->r_name = $request->r_name;
        $renter->father = $request->father;
        $renter->birthday = $request->birthday;
        $renter->marital_status = $request->marital_status;
        $renter->per_address = $request->per_address;
        $renter->occupation = $request->occupation;
        $renter->company = $request->company;
        $renter->religion = $request->religion;
        $renter->qualification = $request->qualification;
        $renter->r_phone = $request->r_phone;
        $renter->r_email = $request->r_email;
        $renter->r_nid = $request->r_nid;
        $renter->p = $request->p;
        

        
        $renter->e_full_name = $request->e_full_name;
        $renter->e_rel = $request->e_rel;
        $renter->e_add = $request->e_add;


        $renter->e_phone = $request->e_phone;
        $renter->member_name_one = $request->member_name_one;
        $renter->member_age_one = $request->member_age_one;
        $renter->member_occupation_one = $request->member_occupation_one;
        $renter->member_phone_one = $request->member_phone_one;

        $renter->member_name_two = $request->member_name_two;
        $renter->member_age_two = $request->member_age_two;
        $renter->member_occupation_two = $request->member_occupation_two;
        $renter->member_phone_two = $request->member_phone_two;

        $renter->member_name_three = $request->member_name_three;
        $renter->member_age_three = $request->member_age_three;
        $renter->member_occupation_three = $request->member_occupation_three;
        $renter->member_phone_three = $request->member_phone_three;

        $renter->maid_name = $request->maid_name;
        $renter->maid_nid = $request->maid_nid;
        $renter->maid_phone = $request->maid_phone;
        $renter->maid_address = $request->maid_address;

        $renter->driver_name = $request->driver_name;
        $renter->driver_nid = $request->driver_nid;
        $renter->driver_phone = $request->driver_phone;
        $renter->driver_address = $request->driver_address;

        $renter->pre_owner_name = $request->pre_owner_name;
        $renter->pre_owner_phone = $request->pre_owner_phone;
        $renter->pre_owner_address = $request->pre_owner_address;
        $renter->reason = $request->reason;

        $renter->new_owner_name = $request->new_owner_name;
        $renter->new_owner_phone = $request->new_owner_phone;
        $renter->new_house_start_date = $request->new_house_start_date;

        $renter->status = $request->status;


        // $renter->r_name = $request->r_name;
        // $renter->r_phone = $request->r_phone;
        // $renter->r_email = $request->r_email;
        // $renter->per_address = $request->per_address;
        // $renter->r_nid = $request->r_nid;
        // $renter->status = $request->status;


        $renter->save();
        return redirect('/add-renter')->with('message','Renter added successfully');

        }


        
        


    }

    public function viewRenter()
    {
        
        
        $ll = Auth::user()->id;
        $ff = Auth::user()->user_level;

        if ($ff == 1) 
        {
             $renters = Renter::get();
        return view('Admin.renter.developer-view-renter',[
            'renters'=>$renters
        ]);

        }

    
    else
    {
        $renters = Renter::where('landlord_id','=',$ll)->get();
        return view('Admin.renter.view-renter',[
            'renters'=>$renters
        ]);
    }

        
    }



  
  // public function editRenter($id)
  //   {
  //       $renters = Renter::find($id)->get();
  //       return view('Admin.renter.edit-renter',[
  //           'renters'=>$renters
  //       ]);
  //   }





  public function vRenter($id)
  {
    
      $renters = Renter::find($id)->where('r_id','=',$id)->get();

      // dd($renters);
       return view('Admin.renter.fullview-renter',[
            'renters'=>$renters
        ]);
       
  }








   public function updateRenter(Request $request)
    {
        $renter = Renter::find($request->r_id);

        $renterImage = $request->file('r_image');
        
        if ($renterImage) 
      {
        
        // unlink($renter->r_image);
        $imageName = $renterImage->getClientOriginalName();
        $directory ='public/admin/renter-images/';
        $imageUrl = $directory.$imageName;
        $renterImage->move($directory, $imageName);




       $renter->r_image = $imageUrl;
        $renter->r_name = $request->r_name;
        $renter->father = $request->father;
        $renter->birthday = $request->birthday;
        $renter->marital_status = $request->marital_status;
        $renter->per_address = $request->per_address;
        $renter->occupation = $request->occupation;
        $renter->company = $request->company;
        $renter->religion = $request->religion;
        $renter->qualification = $request->qualification;
        $renter->r_phone = $request->r_phone;
        $renter->r_email = $request->r_email;
        $renter->r_nid = $request->r_nid;
        $renter->p = $request->p;
        

        
        $renter->e_full_name = $request->e_full_name;
        $renter->e_rel = $request->e_rel;
        $renter->e_add = $request->e_add;


        $renter->e_phone = $request->e_phone;
        $renter->member_name_one = $request->member_name_one;
        $renter->member_age_one = $request->member_age_one;
        $renter->member_occupation_one = $request->member_occupation_one;
        $renter->member_phone_one = $request->member_phone_one;

        $renter->member_name_two = $request->member_name_two;
        $renter->member_age_two = $request->member_age_two;
        $renter->member_occupation_two = $request->member_occupation_two;
        $renter->member_phone_two = $request->member_phone_two;

        $renter->member_name_three = $request->member_name_three;
        $renter->member_age_three = $request->member_age_three;
        $renter->member_occupation_three = $request->member_occupation_three;
        $renter->member_phone_three = $request->member_phone_three;

        $renter->maid_name = $request->maid_name;
        $renter->maid_nid = $request->maid_nid;
        $renter->maid_phone = $request->maid_phone;
        $renter->maid_address = $request->maid_address;

        $renter->driver_name = $request->driver_name;
        $renter->driver_nid = $request->driver_nid;
        $renter->driver_phone = $request->driver_phone;
        $renter->driver_address = $request->driver_address;

        $renter->pre_owner_name = $request->pre_owner_name;
        $renter->pre_owner_phone = $request->pre_owner_phone;
        $renter->pre_owner_address = $request->pre_owner_address;
        $renter->reason = $request->reason;

        $renter->new_owner_name = $request->new_owner_name;
        $renter->new_owner_phone = $request->new_owner_phone;
        $renter->new_house_start_date = $request->new_house_start_date;

        $renter->status = $request->status;



        // $renter->r_name = $request->r_name;
        // $renter->r_phone = $request->r_phone;
        // $renter->r_email = $request->r_email;
        // $renter->per_address = $request->per_address;
        // $renter->r_nid = $request->r_nid;
        // $renter->r_image = $imageUrl;
        $renter->save();


        }
        
        else
        {
          

           $renter->r_name = $request->r_name;
        $renter->father = $request->father;
        $renter->birthday = $request->birthday;
        $renter->marital_status = $request->marital_status;
        $renter->per_address = $request->per_address;
        $renter->occupation = $request->occupation;
        $renter->company = $request->company;
        $renter->religion = $request->religion;
        $renter->qualification = $request->qualification;
        $renter->r_phone = $request->r_phone;
        $renter->r_email = $request->r_email;
        $renter->r_nid = $request->r_nid;
        $renter->p = $request->p;
        

        
        $renter->e_full_name = $request->e_full_name;
        $renter->e_rel = $request->e_rel;
        $renter->e_add = $request->e_add;


        $renter->e_phone = $request->e_phone;
        $renter->member_name_one = $request->member_name_one;
        $renter->member_age_one = $request->member_age_one;
        $renter->member_occupation_one = $request->member_occupation_one;
        $renter->member_phone_one = $request->member_phone_one;

        $renter->member_name_two = $request->member_name_two;
        $renter->member_age_two = $request->member_age_two;
        $renter->member_occupation_two = $request->member_occupation_two;
        $renter->member_phone_two = $request->member_phone_two;

        $renter->member_name_three = $request->member_name_three;
        $renter->member_age_three = $request->member_age_three;
        $renter->member_occupation_three = $request->member_occupation_three;
        $renter->member_phone_three = $request->member_phone_three;

        $renter->maid_name = $request->maid_name;
        $renter->maid_nid = $request->maid_nid;
        $renter->maid_phone = $request->maid_phone;
        $renter->maid_address = $request->maid_address;

        $renter->driver_name = $request->driver_name;
        $renter->driver_nid = $request->driver_nid;
        $renter->driver_phone = $request->driver_phone;
        $renter->driver_address = $request->driver_address;

        $renter->pre_owner_name = $request->pre_owner_name;
        $renter->pre_owner_phone = $request->pre_owner_phone;
        $renter->pre_owner_address = $request->pre_owner_address;
        $renter->reason = $request->reason;

        $renter->new_owner_name = $request->new_owner_name;
        $renter->new_owner_phone = $request->new_owner_phone;
        $renter->new_house_start_date = $request->new_house_start_date;

        $renter->status = $request->status;







        //   $renter->r_name = $request->r_name;
        // $renter->r_phone = $request->r_phone;
        // $renter->r_email = $request->r_email;
        // $renter->per_address = $request->per_address;
        // $renter->r_nid = $request->r_nid;




        $renter->save();
        }
       

        return redirect('/view-renter')->with('message','Renter information updated successfully');
    }




    public function publishedRenter($id)
    {
       $renter = Renter::find($id);
       $renter->status = 0;
       $renter->save();

       return redirect('/view-renter');
    }

    public function unpublishedRenter($id)
    {
        $renter = Renter::find($id);
        $renter->status = 1;
        $renter->save();

        return redirect('/view-renter');
    }




   //  public function editCountry($id)
   //  {
   //      $countries = Country::find($id);
   //      $countries->get();

   //      return view('Admin.country.edit-country',['countries'=>$countries]);
    



    public function deleteRenter($id)
    {
        $renter = Renter::find($id);
        $renter->delete();

        return redirect('/view-renter')->with('message','Renter information deleted successfully');
    }


   





}
