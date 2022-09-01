@extends('Admin.layouts.app')
@section('page_title', 'Monthly Total')
 @section('page_tagline', 'Edit Monthly Total')

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
    <div class="kt-portlet" id="passport_page">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Edit Monthly Total
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('update-total')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf

@foreach($totals as $total)



                  <div class="form-group row">
                    <label class="col-2 col-form-label">
                        House Name
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$total->m_house}}" readonly="">
                    </div>
                </div>


                  <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Number
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$total->flat_number}}" readonly="">
                    </div>
                </div>
                  


                 <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$total->renter_name}}" readonly="">
                    </div>
                </div>




               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Month of Rent
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="date" name="mt_date" value="{{$total->mt_date}}" >
                        <input type="hidden" class="form-control" name="mt_id" value="{{$total->mt_id}}">
                    </div>
                </div>

          
           
              <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Rent Amount
                    </label>
                    <div class="col-10">
                <input class="form-control" type="number" name="mt_rent" value="{{$total->mt_rent}}" >
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Water Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_water" value="{{$total->mt_water}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Gas Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_gas" value="{{$total->mt_gas}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Sewerage Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_sewer" value="{{$total->mt_sewer}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Electricity Bill
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="mt_current" value="{{$total->mt_current}}">
                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Other Costs
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_others_cost" value="{{$total->mt_others_cost}}">
                    </div>
                </div>

                 <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Maintainance Costs
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_maintain" value="{{$total->mt_maintain}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Payment Date
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="date" name="payment_date" value="{{$total->payment_date}}">
                    </div>
                </div>

  
                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Payment Status
                    </label>
                   <select class="form-control col-10" name="pasta">
                        <option value="{{$total->payment_status}}">{{$total->payment_status}}</option>
                       
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                      
                    </select>
                  </div>





                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                @endforeach
            </div>
                
        </form>
@endsection
