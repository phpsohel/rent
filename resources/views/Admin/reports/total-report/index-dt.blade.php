@extends('Admin.layouts.app')

@push('css')
    <!-- Datatables -->
    <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', $controllerInfo->title)
@section('page_tagline', $controllerInfo->title . ' List')

@section('content')
    @include('dashboard::components.delete-modal')
    @include('dashboard::msg.message')
    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--collapsed" data-ktportlet="true" id="customer_report_filter">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="kt-font-brand flaticon2-line-chart"></i></span>
                <h3 class="kt-portlet__head-title">
                    {{ $controllerInfo->title }} List
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-group">
                    <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-default btn-icon-md"><i class="la la-angle-down"></i></a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <form id="total-report-form" action="{{ route('total-report.store') }}" method="POST" class="kt-form kt-form--label-right">
                @csrf
                <div class="row">





<!-- for house name searching-->  
                    <div class="col-4">                
                        <div class="form-group row">
                            <label for="full_name" class="col-4 col-form-label">
                                {{ makeLabel('house_name') }}
                            </label>
                            <div class="col-8">

                                   
                    <select class="form-control col-10" name="m_house">
                        <option value=""></option>
                        @foreach($pps->unique('m_house') as $pp)
                            <option value="{{$pp->m_house}}">{{$pp->m_house}}</option>
                        @endforeach
                    </select>

                <!-- <input class="form-control" type="text" id="full_name" name="flat_number" value="{{ old('flat_number') }}"> -->
                            </div>
                        </div>
                    </div>




        <!-- for flat number searching-->  
                    <div class="col-4">                
                        <div class="form-group row">
                            <label for="full_name" class="col-4 col-form-label">
                                {{ makeLabel('flat_number') }}
                            </label>
                            <div class="col-8">

                                   
                    <select class="form-control col-10" name="flat_number">
                        <option value=""></option>
                        @foreach($pps->unique('flat_number') as $pp)
                            <option value="{{$pp->flat_number}}">{{$pp->flat_number}}</option>
                        @endforeach
                    </select>

                <!-- <input class="form-control" type="text" id="full_name" name="flat_number" value="{{ old('flat_number') }}"> -->
                            </div>
                        </div>
                    </div>




    <!-- for renter name searching--> 
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">
                                {{ makeLabel('renter_name') }}
                            </label>
                            <div class="col-8">

                    <select class="form-control col-10" name="renter_name">
                        <option value=""></option>
                        @foreach($pps->unique('renter_name') as $pp)
                            <option value="{{$pp->renter_name}}">{{$pp->renter_name}}</option>
                        @endforeach
                    </select>

                           <!--  <input class="form-control" type="text" id="email" name="renter_name" value="{{ old('renter_name') }}"> -->
                            </div>
                        </div>
                    </div>









   <!-- for month of rent searching--> 
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="passport_no" class="col-4 col-form-label">
                                {{ makeLabel('month_of_rent') }}
                            </label>
                            <div class="col-8">
                            
                    <select class="form-control col-10" name="mt_date">
                        <option value=""></option>
                        @foreach($pps->unique('mt_date') as $pp)
                            <option value="{{$pp->mt_date}}">{{$pp->mt_date}}</option>
                        @endforeach
                    </select>

                                <!-- <input class="form-control" type="date" id="passport_no" name="mt_date" value="{{ old('mt_date') }}"> -->
                            </div>
                        </div>
                    </div>







    <!-- for payment status searching--> 
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="mobile" class="col-4 col-form-label">
                                {{ makeLabel('payment_status') }}
                            </label>
                            <div class="col-8">

                    <select class="form-control col-10" name="payment_status">
                        <option value=""></option>
                        @foreach($pps->unique('payment_status') as $pp)
                         
                            <option value="{{$pp->payment_status}}">{{$pp->payment_status}}</option>
                           
                        @endforeach
                    </select>
                                <!-- <input class="form-control" type="text" id="mobile" name="payment_status" value="{{ old('payment_status') }}"> -->
                            </div>
                        </div>
                    </div>




                </div>
                <hr/>
                <div class="form-group row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" onClick="window.location.reload();" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
        {!! $dataTable->table(['class' => 'table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline'], true) !!}
        <!--end: Datatable -->
        </div>
    </div>
@endsection

@push('scripts')
    @include('dashboard::scripts.delete')
    <!-- Datatables -->
    <script src="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/datatables/common-callback-functions.js') }}" type="text/javascript"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function () {
            $('#reports-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            $('#customer-report-sm').addClass('kt-menu__item--active');
        });
    </script>
@endpush
