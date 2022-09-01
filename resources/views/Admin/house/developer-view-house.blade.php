@extends('Admin.layouts.app')

@push('css')
    <!-- Datatables -->
    <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Houses')
@section('page_tagline', 'All House List')

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
                        All House List
                    </h3>
            </div>
            <div class="float-right mt-3">
                <a href="{{ route('add-house') }}" class="btn btn-label-success btn-sm btn-upper">
                    <i class="fa fa-plus"></i> Add New House
                </a>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table
                class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                <thead>
                <tr>
                    <th>House Name</th>
                    <th>LandLord Name</th>
                    <th>Holding No.</th>
                    <th>Road No.</th>
                    <th>City/Village</th>
                    <th>Thana</th>
                    <th>District</th>
                   <!--  <th class="text-center">Actions</th> -->
                </tr>
                </thead>
                <tbody>
                @foreach($houses as $house)
                    <tr id="tr-{{ $house->h_id }}">
                        <td scope="row">{{ $house->house_name }}</td>
                        <td scope="row">{{ $house->name }}</td>
                        <td scope="row">{{ $house->holding_no }}</td>
                        <td scope="row">{{ $house->road_no }}</td>
                        <td scope="row">{{ $house->city }}</td>
                        <td scope="row">{{ $house->thana }}</td>
                        <td scope="row">{{ $house->district }}</td>                       
                    </tr>


                </div>

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
