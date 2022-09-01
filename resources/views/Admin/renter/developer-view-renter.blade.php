@extends('Admin.layouts.app')

@push('css')
    <!-- Datatables -->
    <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Renters')
@section('page_tagline', 'All Renter List')

@section('content')
    @include('dashboard::components.delete-modal')
    @include('dashboard::msg.message')
    @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 2rem">
            <i class="fas fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp;
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding-top: 2rem">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="kt-font-brand flaticon2-line-chart"></i></span>
                    <h3 class="kt-portlet__head-title">
                        All Renter List
                    </h3>
            </div>
            <div class="float-right mt-3">
                <a href="{{ route('add-renter') }}" class="btn btn-label-success btn-sm btn-upper">
                    <i class="fa fa-plus"></i> Add New Renter
                </a>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table
                class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                <thead>
                <tr>
                    <th>Renter Name</th>
                    <th>Renter Phone Number</th>
                    <th>Renter Email</th>
                    <th>Renter Permanent Address</th>
                    <th>Renter NID Number</th>
                    <th>Renter Image</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($renters as $renter)
                    <tr id="tr-{{ $renter->r_id }}">
                        <td scope="row">{{ $renter->r_name }}</td>
                        <td scope="row">{{ $renter->r_phone }}</td>
                        <td scope="row">{{ $renter->r_email }}</td>
                        <td scope="row">{{ $renter->per_address }}</td>
                        <td scope="row">{{ $renter->r_nid }}</td>
                        <td><img src="{{($renter->r_image)}}" alt="no image" class="img-fluid img-thumbnail" width="100px" ></td>
                       
                        <td class="text-center">

                            <a href="{{route('v-renter',['id'=>$renter->r_id])}}" class="btn btn-success btn-sm btn-icon-sm btn-circle" target="_blank">
                                <i class="fas fa-eye" title="view"></i>
                            </a>

                            <a href="" class="btn btn-primary btn-sm btn-icon-sm btn-circle" data-toggle="modal" data-target="#edit{{$renter->r_id}}">
                                <i class="flaticon2-edit" title="edit"></i>
                            </a>
                             
                            
                            


                            <a href="" class="btn btn-danger btn-sm btn-icon-sm btn-circle" data-toggle="modal" data-target="#delete{{$renter->r_id}}">
                                <i class="flaticon2-trash" title="delete"></i>
                            </a>

                             <!-- @if($renter->status==1)
                            <a href="{{route('published-renter',['id'=>$renter->r_id])}}" type="button" class="btn btn-success btn-sm btn-icon-sm btn-circle">
                                <i class="flaticon2-arrow-up" title="staying"></i>
                            </a>
                        @else
                            <a href="{{route('unpublished-renter',['id'=>$renter->r_id])}}" type="button" class="btn btn-warning btn-sm btn-icon-sm btn-circle">
                                <i class="flaticon2-arrow-down" title="leaved"></i>
                            </a>
                        @endif -->

                        </td>
                    </tr>






















    
    <!-- Modal for Update -->
<div class="modal fade" id="edit{{$renter->r_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Renter Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                <div class="modal-body">
                <form action="{{route('update-renter')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                     
                                  

                <div class="form-group row">
                    <!-- <label for="passport_no" class="col-2 col-form-label">
                        Renter Photo
                    </label> -->
                    
                    <div class="col-10">
                        <img src="{{($renter->r_image)}}" alt="no image"  width="200px" height="auto" >
                    </div>
                </div>

               
               <div class="form-group row">
                    <label for="passport_no" class="col-2 col-form-label">
                        Update Photo
                    </label>
                    
                    <div class="col-10">
                        <input type="file" class="form-control-file" name="r_image">
                    </div>
                </div>




<!--renter name-->
                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter Name
                    </label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="r_name" value="{{$renter->r_name}}">
                                        <input type="hidden" class="form-control" name="r_id" value="{{$renter->r_id}}">
                    </div>
                </div>



                


<!--father name-->

                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Father’s Name
                    </label>
                    <div class="col-10">
                        <!-- <input class="form-control" type="text" name="father" value="{{ old('father') }}" required> -->
                        <input type="text" class="form-control" name="father" value="{{$renter->father}}">
                    </div>
                </div>

<!--birthday-->

                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Date Of Birth
                    </label>
                    <div class="col-10">
                        <!-- <input class="form-control" type="date" name="birthday" value="{{ old('birthday') }}" required> -->
                        <input type="date" class="form-control" name="birthday" value="{{$renter->birthday}}">
                    </div>
                </div>



<!--Marital Status-->
                <div class="form-group row">
                    <label for="status" class="col-2 ">
                       Marital Status
                    </label>

                    <select class="form-control col-10" name="marital_status">
                        <option value="{{$renter->marital_status}}">{{$renter->marital_status}}</option>
                         <option value="Married">Married</option>
                         <option value="Unmarried">Unmarried</option>
                    </select>
                </div>



               
<!--Permanent Address-->

                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Permanent Address
                    </label>
                    <div class="col-10">
                        <!-- <input class="form-control" type="address" name="per_address" value="{{ old('per_address') }}" required> -->
                        <input type="text" class="form-control" name="per_address" value="{{$renter->per_address}}">
                    </div>
                </div>







<!--Occupation-->
                   
                      
                <div class="form-group row">
                    <label for="status" class="col-2 ">
                       Occupation
                    </label>

                    <select class="form-control col-10" name="occupation">
                        <option value="{{$renter->occupation}}">{{$renter->occupation}}</option>
                        <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                    </select>
                </div>





                  <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Occupation
                    </label>
                   <select class="form-control col-10" name="occupation" required="">
                        <option value=""></option>
                         <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                       
                    </select>
                  </div> -->



<!--company name-->

                <div class="form-group row">
                    <label class="col-2 col-form-label">
                    Company/Inst. Name
                    </label>
                    
                    <div class="col-10">
                        <input type="text" class="form-control" name="company" value="{{$renter->company}}">
                    </div>
                </div>

                    
<!--religion-->

               
              
              <div class="form-group row">
                    <label  class="col-2 ">
                       Religion
                    </label>

                    <select class="form-control col-10" name="religion">
                        <option value="{{$renter->religion}}">{{$renter->religion}}</option>
                        <option value="Islam">Islam</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                    </select>
                </div>




               <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Religion
                    </label>
                   <select class="form-control col-10" name="religion" required="">
                        <option value=""></option>
                         <option value="Islam">Islam</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                       
                    </select>
                  </div> -->



<!--Qualification-->

                

              <div class="form-group row">
                    <label  class="col-2 ">
                       Qualification
                    </label>

                    <select class="form-control col-10" name="qualification">
                        <option value="{{$renter->qualification}}">{{$renter->qualification}}</option>
                        <option value="N/A">N/A</option>
                            <option value="SSC">SSC</option>
                            <option value="HSC">HSC</option>
                            <option value="Bachelors">Bachelor's</option>
                            <option value="Honours">Honours</option>
                            <option value="BBA">BBA</option>
                            <option value="LLB">LLB</option>
                            <option value="MBBS">MBBS</option>
                            <option value="Masters">Master's</option>
                            <option value="MBA">MBA</option>
                            <option value="Ph.D">Ph.D</option>
                    </select>
                </div>






                <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Qualification
                    </label>
                   <select class="form-control col-10" name="qualification">
                        <option value=""></option>
                         <option value="N/A">N/A</option>
                            <option value="SSC">SSC</option>
                            <option value="HSC">HSC</option>
                            <option value="Bachelors">Bachelor's</option>
                            <option value="Honours">Honours</option>
                            <option value="BBA">BBA</option>
                            <option value="LLB">LLB</option>
                            <option value="MBBS">MBBS</option>
                            <option value="Masters">Master's</option>
                            <option value="MBA">MBA</option>
                            <option value="Ph.D">Ph.D</option>
                       
                    </select>
                  </div> -->





<!--phone number-->

               

                <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                        <input type="text" class="form-control" name="r_phone" value="{{$renter->r_phone}}">
                    </div>
                </div>




                <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="r_phone" value="{{ old('r_phone') }}" required>
                    </div>
                </div> -->



<!--Email Address-->
    


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Email
                    </label>
                    
                    <div class="col-10">
                        <input type="email" class="form-control" name="r_email" value="{{$renter->r_email}}">
                    </div>
                </div>




               <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Email
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="email" name="r_email" value="{{ old('r_email') }}" >
                    </div>
                </div> -->

              

                

<!--NID number-->
                


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                     NID Number
                    </label>
                    
                    <div class="col-10">
                        <input type="number" class="form-control" name="r_nid" value="{{$renter->r_nid}}">
                    </div>
                </div>




                <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        NID Number
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="r_nid" value="{{ old('r_nid') }}" required>
                    </div>
                </div> -->


<!--passport number-->
               
            
             <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Passport Number
                    </label>
                    
                    <div class="col-10">
                        <input type="number" class="form-control" name="p" value="{{$renter->p}}">
                    </div>
                </div>
                 



               <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Passport Number
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="p" value="{{ old('p') }}">
                    </div>
                </div> -->




<!--Emergency -->
<br>
<h5 align="center">Emergency Contact</h5>
<br>
<br>

      


      <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="e_full_name" value="{{$renter->e_full_name}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Relation
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="e_rel" value="{{$renter->e_rel}}">
                    </div>
                </div>


              <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Address
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="e_add" value="{{$renter->e_add}}">
                    </div>
                </div>
              

              <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Mobile Number
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="e_phone" value="{{$renter->e_phone}}">
                    </div>
                </div>

        <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" name="e_full_name" value="{{ old('e_full_name') }}" required="" >
                    </div>
                </div> -->

                <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Relation
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e_rel" value="{{ old('e_rel') }}" required="" >
                    </div>
                </div> -->



                <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Address
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e_add" value="{{ old('e_add') }}" required="">
                    </div>
                </div> -->






                <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Mobile Number
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e_phone" value="{{ old('e_phone') }}" required>
                    </div>
                </div>
 -->





<!--family-->


<br>
<h5 align="center">Family Member/Room Partner’s Information</h5>
<br>
<br>

<!--member 1 -->
<h5 align="center">(1)</h5>

               
               <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="member_name_one" value="{{$renter->member_name_one}}">
                    </div>
                </div>
  

              <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Age
                    </label>
                    
                    <div class="col-10">
                    <input type="number" class="form-control" name="member_age_one" value="{{$renter->member_age_one}}">
                    </div>
                </div>
                


                 <div class="form-group row">
                    <label for="status" class="col-2 ">
                       Occupation
                    </label>

                    <select class="form-control col-10" name="member_occupation_one">
                <option value="{{$renter->member_occupation_one}}">{{$renter->member_occupation_one}}</option>
                        <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                    </select>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="member_phone_one" value="{{$renter->member_phone_one}}">
                    </div>
                </div>



               <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
    <input class="form-control" type="text" name="member_name_one" value="{{ old('member_name_one') }}" required="" >
                    </div>
                </div> -->


               <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Age
                    </label>
                    <div class="col-10">
         <input class="form-control" type="number" name="member_age_one" value="{{ old('member_age_one') }}" required="" >
                    </div>
                </div> -->


             <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Occupation
                    </label>
                   <select class="form-control col-10" name="member_occupation_one" required="">
                        <option value=""></option>
                         <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                       
                    </select>
                  </div>  -->


            
            <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="member_phone_one" value="{{ old('member_phone_one') }}" required>
                    </div>
                </div> -->





<!--member 2 -->
<h5 align="center">(2)</h5>



           <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="member_name_two" value="{{$renter->member_name_two}}">
                    </div>
                </div>
  

              <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Age
                    </label>
                    
                    <div class="col-10">
                    <input type="number" class="form-control" name="member_age_two" value="{{$renter->member_age_two}}">
                    </div>
                </div>
                


                 <div class="form-group row">
                    <label for="status" class="col-2 ">
                       Occupation
                    </label>

                    <select class="form-control col-10" name="member_occupation_two">
                <option value="{{$renter->member_occupation_two}}">{{$renter->member_occupation_two}}</option>
                        <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                    </select>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="member_phone_two" value="{{$renter->member_phone_two}}">
                    </div>
                </div>



               <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" name="member_name_two" value="{{ old('member_name_two') }}" >
                    </div>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Age
                    </label>
                    <div class="col-10">
                <input class="form-control" type="number" name="member_age_two" value="{{ old('member_age_two') }}" >
                    </div>
                </div>


             <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Occupation
                    </label>
                   <select class="form-control col-10" name="member_occupation_two">
                        <option value=""></option>
                         <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                       
                    </select>
                  </div> 


            
            <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
        <input class="form-control" type="text" name="member_phone_two" value="{{ old('member_phone_two') }}" >
                    </div>
                </div> -->





<!--member 3 -->
<h5 align="center">(3)</h5>


          <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="member_name_three" value="{{$renter->member_name_three}}">
                    </div>
                </div>
  

              <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Age
                    </label>
                    
                    <div class="col-10">
                    <input type="number" class="form-control" name="member_age_three" value="{{$renter->member_age_three}}">
                    </div>
                </div>
                


                 <div class="form-group row">
                    <label for="status" class="col-2 ">
                       Occupation
                    </label>

                    <select class="form-control col-10" name="member_occupation_three">
            <option value="{{$renter->member_occupation_three}}">{{$renter->member_occupation_three}}</option>
                        <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                    </select>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="member_phone_three" value="{{$renter->member_phone_three}}">
                    </div>
                </div>





               <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" name="member_name_three" value="{{ old('member_name_three') }}" >
                    </div>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Age
                    </label>
                    <div class="col-10">
                <input class="form-control" type="number" name="member_age_three" value="{{ old('member_age_three') }}" >
                    </div>
                </div>


             <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Occupation
                    </label>
                   <select class="form-control col-10" name="member_occupation_three">
                        <option value=""></option>
                         <option value="Businessman" id="busy" >Businessman</option>
                        <option value="Job Holder" id="job">Job Holder</option>
                        <option value="Self Employed" id="self" >Self Employed</option>
                        <option value="Service Holder" id="service">Service Holder</option>
                        <option value="Housewife" id="house">Housewife</option>
                        <option value="Student" id="stu">Student</option>
                        <option value="Unemployed" id="un">Unemployed</option>
                       
                    </select>
                  </div> 


            
            <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="member_phone_three" value="{{ old('member_phone_three') }}" >
                    </div>
                </div> -->




<!-- House Maid-->

<br>
<h5 align="center">Housemaid Information </h5>
<br>
<br>

        

      <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="maid_name" value="{{$renter->maid_name}}">
                    </div>
                </div>




      <div class="form-group row">
                    <label class="col-2 col-form-label">
                     NID
                    </label>
                    
                    <div class="col-10">
                    <input type="number" class="form-control" name="maid_nid" value="{{$renter->maid_nid}}">
                    </div>
                </div>


     <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="maid_phone" value="{{$renter->maid_phone}}">
                    </div>
                </div>




     <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Permanent Address
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="maid_address" value="{{$renter->maid_address}}">
                    </div>
                </div>
        <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" name="maid_name" value="{{ old('maid_name') }}" >
                    </div>
                </div>  -->


            <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        NID
                    </label>
                    <div class="col-10">
                <input class="form-control" type="number" name="maid_nid" value="{{ old('maid_nid') }}" >
                    </div>
                </div> --> 



            <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="maid_phone" value="{{ old('maid_phone') }}">
                    </div>
                </div> -->



         <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                       Permanent Address
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="maid_address" value="{{ old('maid_address') }}">
                    </div>
                </div> -->








<!-- Driver-->

<br>
<h5 align="center">Driver Information </h5>
<br>
<br>






    <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="driver_name" value="{{$renter->driver_name}}">
                    </div>
                </div>




      <div class="form-group row">
                    <label class="col-2 col-form-label">
                     NID
                    </label>
                    
                    <div class="col-10">
                    <input type="number" class="form-control" name="driver_nid" value="{{$renter->driver_nid}}">
                    </div>
                </div>


     <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                <input type="text" class="form-control" name="driver_phone" value="{{$renter->driver_phone}}">
                    </div>
                </div>




     <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Permanent Address
                    </label>
                    
                    <div class="col-10">
            <input type="text" class="form-control" name="driver_address" value="{{$renter->driver_address}}">
                    </div>
                </div>










        <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" name="driver_name" value="{{ old('driver_name') }}" >
                    </div>
                </div> 


            <div class="form-group row">
                    <label class="col-2 col-form-label">
                        NID
                    </label>
                    <div class="col-10">
                <input class="form-control" type="number" name="driver_nid" value="{{ old('driver_nid') }}" >
                    </div>
                </div> 



            <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="driver_phone" value="{{ old('driver_phone') }}">
                    </div>
                </div>



         <div class="form-group row">
                    <label class="col-2 col-form-label">
                      Permanent Address
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="driver_address" value="{{ old('driver_address') }}">
                    </div>
                </div> -->






<!-- Previous House-Owner Information-->

<br>
<h5 align="center">Previous House-Owner Information </h5>
<br>
<br>

             


           

          <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="pre_owner_name" value="{{$renter->pre_owner_name}}">
                    </div>
                </div>






     <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                <input type="text" class="form-control" name="pre_owner_phone" value="{{$renter->pre_owner_phone}}">
                    </div>
                </div>




     <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Permanent Address
                    </label>
                    
                    <div class="col-10">
            <input type="text" class="form-control" name="pre_owner_address" value="{{$renter->pre_owner_address}}">
                    </div>
                </div>






             <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="pre_owner_name" value="{{ old('pre_owner_name') }}" required="" >
                    </div>
            </div> 


         <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
    <input class="form-control" type="text" name="pre_owner_phone" value="{{ old('pre_owner_phone') }}" required="">
                    </div>
                </div>



           <div class="form-group row">
                    <label class="col-2 col-form-label">
                      Address
                    </label>
                    <div class="col-10">
        <input class="form-control" type="text" name="pre_owner_address" value="{{ old('pre_owner_address') }}" required="">
                    </div>
                </div> -->





<!-- Why did you leave old house?-->

<br>
<h5 align="center">Reason for leaving previous House </h5>
<br>
<br>

           

         <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Description
                    </label>
                    
                    <div class="col-10">
            <textarea type="text" class="form-control" name="reason" value="">{{$renter->reason}}</textarea> 
                    </div>
                </div>






           <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                      Description
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="reason" value="{{ old('reason') }}">
                    </div>
                </div> -->




<!-- Present House-Owner Information-->

<br>
<h5 align="center">Present House-Owner Information </h5>
<br>
<br>






       <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Full Name
                    </label>
                    
                    <div class="col-10">
                    <input type="text" class="form-control" name="new_owner_name" value="{{$renter->new_owner_name}}">
                    </div>
                </div>






     <div class="form-group row">
                    <label class="col-2 col-form-label">
                     Phone Number
                    </label>
                    
                    <div class="col-10">
                <input type="text" class="form-control" name="new_owner_phone" value="{{$renter->new_owner_phone}}">
                    </div>
                </div>





             <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Full Name
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="new_owner_name" value="{{ old('new_owner_name') }}" >
                    </div>
            </div> 


           <<div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="new_owner_phone" value="{{ old('new_owner_phone') }}">
                    </div>
                </div> -->



<!-- Start date in new house-->

<br>
<h5 align="center">Start Date of living in the house </h5>
<br>
<br>

           
         <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Date
                    </label>
                    <div class="col-10">
                        
                        <input type="date" class="form-control" name="new_house_start_date" value="{{$renter->new_house_start_date}}">
                    </div>
                </div>






           <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Date
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="date" name="new_house_start_date" value="{{ old('new_house_start_date') }}" required>
                    </div>
                </div> -->





            <!-- <div class="form-group row">
                    <label for="status" class="col-2 ">
                       <b>Status</b>
                    </label>
                    <div class="col-10">
                        <div class="radio">
                    <input type="radio" name="status" value="1"> Active 
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="0"> Inactive
                    </div>
                    </div>
                </div> -->

                <!-- <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div> -->
                
            </div>


                      <div class="form-group row">
                          <div class="col-11">
                        
                        <input type="submit" name="btn" class="btn pull-right btn-primary" value="update">
                    </div>
                      </div>                      

                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal for delete -->
<div class="modal fade" id="delete{{$renter->r_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <br>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('delete-renter',['id'=>$renter->r_id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h6>Are you sure you want to delete?</h6>
                                    <hr>
                                    <div class="pull-right">
                                        <input type="submit" name="btn" class="btn btn-danger" value="Yes">

                                    <a href="{{route('view-renter')}}" type="button" class="btn btn-danger">No</a>
                                    </div>        
                                    <!-- <input type="submit" name="btn" class="btn btn-danger pull-right" value="delete"> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>

<!--modal-->
 








    <!--end::Portlet-->
@endsection

@push('scripts')
    @include('dashboard::scripts.delete')
    <!-- Datatables -->
    <script src="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#passport-management-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            $('#all-passport-list-sm').addClass('kt-menu__item--active');
            $('.table').DataTable({
                responsive: {
                    details: false
                }
            });
        });
    </script>
@endpush
