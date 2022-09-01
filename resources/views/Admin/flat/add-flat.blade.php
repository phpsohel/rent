@extends('Admin.layouts.app')
@section('page_title', 'Flat')
 @section('page_tagline', 'Add Flat')

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
                    Add New Flat
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('save-flat')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        House Name <b style="color: red">*</b>
                    </label>
                    <div class="col-10">

            <select class="form-control col-12" name="house" required="">
                        <option value=""></option>
                        @foreach($houses as $house)
                         <option value= "{{$house->house_name}}" >{{$house->house_name}}</option>
                         @endforeach                 
                    </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Number/Name <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="f_number" value="{{ old('f_number') }}" required>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Floor Number <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="f_floor" value="{{ old('f_floor') }}" required>
                    </div>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Size (Square-feet) <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="number" name="f_sqft" value="{{ old('f_sqft') }}" required>
                    </div>
                </div>

          
           
          <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Availability
                    </label>
                   <select class="form-control col-10" name="avi">
                        <option value=""></option>
                         <option value="Yes">Yes</option>
                         <option value="No">No</option>
                       
                    </select>
                  </div> -->



         <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Availability <b style="color: red">*</b>
                    </label>
                    <div class="col-10">

            <select class="form-control col-12" name="avi" required="">
                        <option value=""></option>
                         <option value="Yes">Yes</option>
                         <option value="No">No</option>
                       
                    </select>
                    </div>
                </div>



           <!-- <div class="form-group row">
                    <label for="status" class="col-2 ">
                        Flat Availability
                    </label>
                    <div class="col-10">
                        <div class="radio">
                    <input type="radio" name="f_available" value="Yes"> Yes 
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="f_available" value="No"> No
                    </div>
                    </div>
            </div> -->





              <div class="form-group row">
                    <label for="status" class="col-2 ">
                        Status
                    </label>
                    <div class="col-10">
                        <div class="radio">
                    <input type="radio" name="f_status" value="1"> Active 
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="f_status" value="0"> Inactive
                    </div>
                    </div>
            </div>





                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                
            </div>
                
        </form>
@endsection
