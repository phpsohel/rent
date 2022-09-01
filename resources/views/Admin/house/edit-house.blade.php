@extends('Admin.layouts.app')
@section('page_title', 'House')
 @section('page_tagline', 'Edit House')

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
                    Edit House Information
                </h3>
            </div>
        </div>
<form id="passport-form" action="{{route('update-house')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf

@foreach($houses as $house)
                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        House Name
                    </label>
                    <div class="col-10">
                <input class="form-control" type="text" name="house_name" value="{{$house->house_name}}">
                <input type="hidden" class="form-control" name="h_id" value="{{$house->h_id}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Holding No.
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="holding_no" value="{{$house->holding_no}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Road No.
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="road_no" value="{{$house->road_no}}">
                    </div>
                </div>


   

           <div class="form-group row">
                    <label class="col-2 col-form-label">
                        City
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="city" value="{{$house->city}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Thana
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="thana" value="{{$house->thana}}">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        District
                    </label>
                    <div class="col-10">
            <input class="form-control" type="text" name="district" value="{{$house->district}}">
                    </div>
                </div>


               




                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                @endforeach
            </div>
                
        </form>
@endsection
