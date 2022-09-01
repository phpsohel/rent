@extends('Admin.layouts.app')
@section('page_title', 'House')
 @section('page_tagline', 'Add House')

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
                    Add New House
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('save-house')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        House Name <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="house_name" value="{{ old('house_name') }}" required="">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Holding No. <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="holding_no" value="{{ old('holding_no') }}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Road No. <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="road_no" value="{{ old('road_no') }}" required>
                    </div>
                </div>


            

            <div class="form-group row">
                    <label class="col-2 col-form-label">
                        City/Village <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="city" value="{{ old('city') }}" required>
                    </div>
                </div>


          

           <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Thana <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="thana" value="{{ old('thana') }}" required>
                    </div>
                </div>


            <div class="form-group row">
                    <label class="col-2 col-form-label">
                        District <b style="color: red">*</b>
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="district" value="{{ old('district') }}" required>
                    </div>
                </div>




                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                
            </div>
                
        </form>
@endsection
