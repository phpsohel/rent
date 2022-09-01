@extends('Admin.layouts.app')
@section('page_title', 'Renter')
 @section('page_tagline', 'Add Renter')

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
                    Add New Renter
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('save-renter')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Renter Name <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="r_name" value="{{ old('r_name') }}" required>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Phone Number <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="r_phone" value="{{ old('r_phone') }}" required>
                    </div>
                </div>


               <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Email <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="email" name="r_email" value="{{ old('r_email') }}" required>
                    </div>
                </div>

              

                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Permanent Address <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="address" name="per_address" value="{{ old('per_address') }}" required>
                    </div>
                </div>


                
                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        NID Number <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="number" name="r_nid" value="{{ old('r_nid') }}" required>
                    </div>
                </div>


                




                <div class="form-group row">
                    <label for="passport_no" class="col-2 col-form-label">
                        Renter Photo
                    </label>
                    
                    <div class="col-10">
                        <input class="form-control-file" type="file" name="r_image">
                    </div>
                </div>


            <div class="form-group row">
                    <label for="status" class="col-2 ">
                       <b>Status</b>
                    </label>
                    <div class="col-10">
                        <div class="radio">
                    <input type="radio" name="status" value="1"> Active 
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="0"> Inactive
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                
            </div>
                
        </form>
@endsection
