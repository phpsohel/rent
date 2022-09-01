@extends('Admin.layouts.app')
@section('page_title', 'Flat')
 @section('page_tagline', 'Edit Flat')

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
                    Edit Flat Information
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('update-flat')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf

@foreach($flats as $flat)


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        House Name
                    </label>
                   <select class="form-control col-10" name="house">
                        <option value="{{$flat->house}}">{{$flat->house}}</option>
                         @foreach($houses as $house)
                         <option value= "{{$house->house_name}}" >{{$house->house_name}}</option>
                         @endforeach
                       
                    </select>
                  </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Number
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" name="f_number" value="{{$flat->f_number}}">
                <input type="hidden" class="form-control" name="f_id" value="{{$flat->f_id}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Floor Number
                    </label>
                    <div class="col-10">
            <input class="form-control" type="number" name="f_floor" value="{{$flat->f_floor}}">
            <input type="hidden" class="form-control" name="f_id" value="{{$flat->f_id}}">
                    </div>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Size (Square-feet)
                    </label>
                    <div class="col-10">
            <input class="form-control" type="number" name="f_sqft" value="{{$flat->f_sqft}}">
            <input type="hidden" class="form-control" name="f_id" value="{{$flat->f_id}}">
                    </div>
                </div>

              

         
         <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat Availability
                    </label>
                   <select class="form-control col-10" name="avi">
                        <option value="{{$flat->f_available}}">{{$flat->f_available}}</option>
                         <option value="Yes">Yes</option>
                         <option value="No">No</option>
                       
                    </select>
                  </div>







              <!-- <div class="form-group row">
                    <label for="status" class="col-2 ">
                        Flat Availability
                    </label>
                    <div class="col-10">
                        <div class="radio">
                        
                    <input type="radio" name="f_available" value="Yes"> Available 
                    
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="f_available" value="No"> Non Available
                   
                    </div>
                    </div>
                </div> -->


                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                @endforeach
            </div>
                
        </form>
@endsection
