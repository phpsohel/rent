@extends('Admin.layouts.app')
@section('page_title', 'Renter')
 @section('page_tagline', 'Edit Renter')

@section('content')
    @include('dashboard::msg.message')
     @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <!--begin::Portlet-->
    <div class="kt-portlet" id="passport_page">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Edit Renter Information
                </h3>
            </div>
        </div>
<form id="passport-form" action="" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf
                @foreach($renters as $renter)
                <img src="{{$renter->r_image}}" alt="dg"  width="100px" >
                <div class="form-group row">
                

                    <label class="col-2 col-form-label">
                        Renter Name
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="r_name" value="{{$renter->r_name}}" required>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter Phone Number
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="r_phone" value="{{$renter->r_phone}}" required>
                    </div>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter Email
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="email" name="r_email" value="{{$renter->r_email}}" required>
                    </div>
                </div>

              

                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter Permanent Address
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="address" name="per_address" value="{{$renter->per_address}}" required>
                    </div>
                </div>


                
                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter NID Number
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="r_nid" value="{{$renter->r_nid}}" required>
                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter Image
                    </label>
                   
                    <!-- <div class="col-10">
                        <input class="form-control-file" type="file" name="r_image"
                         required>
                    </div> -->
                </div>


                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                @endforeach
            </div>
                
        </form>
@endsection
