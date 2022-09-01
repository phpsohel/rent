@extends('Admin.layouts.app')
@section('page_title', 'Monthly Total')
 @section('page_tagline', 'Add Monthly Total')

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
                    Add Monthly Total
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('save-total')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf

@foreach($rftotals as $rftotal)


                   
                   <div class="form-group row">
                    <div class="col-10">
                <input class="form-control" type="text" value="{{$rftotal->rf_id}}" name="mt_rf_id" hidden="">
                    </div>
                </div>


                 <div class="form-group row">
                    <label class="col-2 col-form-label">
                        House Name
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" value="{{$rftotal->house}}" name="m_house" readonly="">
                    </div>
                </div>



                  <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" value="{{$rftotal->f_number}}" name="flat_number" readonly="">
                    </div>
                </div>
                  


                 <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$rftotal->r_name}}" name="renter_name" readonly="">
                    </div>
                </div>




               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Month of Rent <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="date" name="mt_date" required="" >
                    </div>
                </div>

          
           
              <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Rent Amount <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                <input class="form-control" type="number" name="mt_rent" value="{{$rftotal->rent}}" required="" >
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Water Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_water" value="{{$rftotal->water}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Gas Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_gas" value="{{$rftotal->gas}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Sewerage Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_sewer" value="{{$rftotal->sewer}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Electricity Bill
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="mt_current" value="{{$rftotal->current}}">
                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Other Costs
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_others_cost" value="{{$rftotal->others}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Total Maintainance Costs
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="mt_maintain" value="{{$rftotal->maintain_cost}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Payment Date <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="date" name="payment_date" required="">
                    </div>
                </div>

    
              <div class="form-group row">
                    <label for="status" class="col-2 ">
                        Payment Status <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <div class="radio">
                    <input type="radio" name="payment_status" value="Yes" required=""> Paid 
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="payment_status" value="No" required=""> Due
                    </div>
                    </div>
            </div>



                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                @endforeach
            </div>
                
        </form>
@endsection
