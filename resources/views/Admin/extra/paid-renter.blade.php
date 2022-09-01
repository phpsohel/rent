@extends('Admin.layouts.app')

@push('css')
    <!-- Datatables -->
    <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Renters')
@section('page_tagline', 'Paid Renter List')

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
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="kt-font-brand flaticon2-line-chart"></i></span>
                    <h3 class="kt-portlet__head-title">
                        Paid Renter List
                    </h3>
            </div>
           
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table
                class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                <thead>
                <tr>
                    <th>Flat Number</th>
                    <th>Renter Name</th>
                    <th>Month of Rent</th>
                    <th>Rent Amount</th>
                    <th>Total Water Bill</th>
                    <th>Total Gas Bill</th>
                    <th>Total Sewerage Bill</th>
                    <th>Total Electricity Bill</th>
                    <th>Total Other Costs</th>
                    <th>Total Maintainance Costs</th>
                    <th>Total Amount</th>
                    <th>Payment Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prs as $pr)
                    <tr >
                         <td scope="row">{{ $pr->flat_number }}</td>
                        <td scope="row">{{ $pr->renter_name }}</td>
                        <td scope="row">{{ date('d-M-y', strtotime($pr->mt_date)) }}</td>
                        <td scope="row">{{ $pr->mt_rent }}</td>
                        <td scope="row">{{ $pr->mt_water }}</td>
                        <td scope="row">{{ $pr->mt_gas }}</td>
                        <td scope="row">{{ $pr->mt_sewer }}</td>
                        <td scope="row">{{ $pr->mt_current }}</td>
                        <td scope="row">{{ $pr->mt_others_cost }}</td>
                        <td scope="row">{{ $pr->mt_maintain }}</td>
                        <td scope="row">{{ $pr->total_money }}</td>
                        <td scope="row">{{ date('d-M-y', strtotime($pr->payment_date)) }}</td>
                       
                    </tr>

                @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>

<!--modal-->
 








    <!--end::Portlet-->
@endsection

@push('scripts')
    @include('dashboard::scripts.delete')
    <!-- Datatables -->
    <script src="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#passport-management-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            $('#all-passport-list-sm').addClass('kt-menu__item--active');
            $('.table').DataTable({
                responsive: {
                    details: false
                }
            });
        });
    </script>
@endpush
