@extends('Admin.layouts.app')
@section('page_title', 'Monthly Total Receipt')
@section('page_tagline', 'Create Monthly Total Receipt')

@section('content')
@include('dashboard::components.delete-modal')
    @include('dashboard::msg.message')
    @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 2rem">
<!--             <i class="fas fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp;
 -->                <h5>{{Session::get('message')}}</h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding-top: 2rem">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <!--begin::Portlet-->
    <br>
    <br>
    <br>
    <br>
    <div class="kt-portlet" id="passport_page">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Create Monthly Total Receipt
                </h3>
            </div>
        </div>
<form  action="{{route('save-receipt')}}" method="POST" target="_blank"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf

                    
<div class="form-group " style="margin-left: 13.5rem !important">
                   <div class="form-group row">
                    <label class=" col-form-label">
                        <b>Select Month</b>
                    </label>
                    <div class="offset-1 col-6">
                        <input class="form-control" type="date" name="mt_date" >
                    </div>
                </div>

</div>

            

                <div class="col-12">
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                
            </div>
                
        </form>
@endsection
