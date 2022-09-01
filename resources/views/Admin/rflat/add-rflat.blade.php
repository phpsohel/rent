@extends('Admin.layouts.app')
@section('page_title', 'Renter-Flat')
 @section('page_tagline', 'Add Renter-Flat')

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
                    Add Renter-Flat
                </h3>
            </div>
        </div>
<form  action="{{route('save-rflat')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <select class="form-control col-12" name="flat">
                        <option value=""></option>
                        @foreach($flats as $flat)
                            <option value="{{$flat->f_id}}">{{$flat->f_number}} ({{$flat->house}})</option>
                        @endforeach
                    </select>
                    </div>
                   
                  </div>


                  
                  <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter <b style="color: red">*</b>
                    </label>

                    <div class="col-10">
                       <select class="form-control col-12" name="renter">
                        <option value=""></option>
                        @foreach($renters as $renter)
                            <option value="{{$renter->r_id}}">{{$renter->r_name}}</option>
                        @endforeach
                    </select> 
                    </div>
                   
                  </div>


                


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Advance Amount <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
    <input class="form-control" type="number" name="advance" min="1000" value="{{ old('advance') }}" required>
                    </div>
                </div>

          
           
              <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Start Date <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}" required>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        End Date
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="date" value="{{ old('end_date') }}" name="end_date" >
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Rent Amount <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="rent" value="{{ old('rent') }}" required>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Water Bill
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="water" value="{{ old('water') }}" >
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Gas Bill
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="gas" value="{{ old('gas') }}" >
                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Sewerage Bill
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="sewer" value="{{ old('sewer') }}" >
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Electricity Bill
                    </label>
                    <div class="col-10">
                <input class="form-control" type="number" name="current" value="{{ old('current') }}" >
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Maintainance Cost
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="maintain_cost" value="{{ old('maintain_cost') }}" >
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Others
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="others" value="{{ old('others') }}" >
                    </div>
                </div>


            

                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                
            </div>
                
        </form>
@endsection
