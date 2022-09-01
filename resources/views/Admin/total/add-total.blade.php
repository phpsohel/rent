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



        @if(Session::get('message2'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 2rem">
            <i class="fas fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp;
                <strong>{{Session::get('message2')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding-top: 2rem">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif



     @if(Session::get('message3'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 2rem">
            <i class="fas fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp;
                <strong>{{Session::get('message3')}}</strong>
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
<form  action="{{route('get-all-total')}}" method="POST"
              class="kt-form kt-form--label-right" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                @csrf

                    
                <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Flat
                    </label>
                   <select class="form-control col-6" name="Flat">
                        <option value=""></option>
                        @foreach($renflats as $renflat)
                            <option value="{{$renflat->flat_id}}">{{$renflat->f_number}} ({{$renflat->house}})</option>
                        @endforeach
                    </select>
                  </div>
            

            <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">
                        Select Month
                    </label>
                    <input type="date" name="select_month" class="form-control col-6">
                  </div> -->

                  
                  


            

                <div class="col-8">
                    
                    <input type="submit" name="btn" class="btn btn-success pull-right">
                </div>
                
            </div>
                
        </form>
@endsection
