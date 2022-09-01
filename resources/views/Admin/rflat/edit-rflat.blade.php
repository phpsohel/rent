@extends('Admin.layouts.app')
@section('page_title', 'Renter Flat')
 @section('page_tagline', 'Edit Renter Flat')

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
                    Edit Renter Flat Information
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('update-rflat')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf

@foreach($rflats as $rflat)

                 
                 <div class="form-group row">
                    <label class="col-2 col-form-label">
                        House Name
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$rflat->house}}" readonly="">
                    </div>
                </div>


                 <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Number
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$rflat->f_number}}" readonly="">
                    </div>
                </div>


                 <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="{{$rflat->r_name}}" readonly="">
                    </div>
                </div>



               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Advance Amount
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="advance" value="{{$rflat->advance}}" >
                        <input type="hidden" class="form-control" name="rf_id" value="{{$rflat->rf_id}}">
                    </div>
                </div>

          
           
              <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Start Date
                    </label>
                    <div class="col-10">
                <input class="form-control" type="date" name="start_date" value="{{$rflat->start_date}}" >
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        End Date
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="date" name="end_date" value="{{$rflat->end_date}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Rent Amount
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="rent" value="{{$rflat->rent}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Water Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="water" value="{{$rflat->water}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Gas Bill
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="gas" value="{{$rflat->gas}}">
                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Sewerage Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="sewer" value="{{$rflat->sewer}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Electricity Bill
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="current" value="{{$rflat->current}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Maintainance Cost
                    </label>
                    <div class="col-10">
        <input class="form-control" type="number" name="maintain_cost" value="{{$rflat->maintain_cost}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Others
                    </label>
                    <div class="col-10">
                    <input class="form-control" type="number" name="others" value="{{$rflat->others}}">
                    </div>
                </div>




                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                @endforeach
            </div>
                
        </form>
@endsection
