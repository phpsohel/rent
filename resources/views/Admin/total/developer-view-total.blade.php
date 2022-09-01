@extends('Admin.layouts.app')

@push('css')
    <!-- Datatables -->
    <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Monthly Total Amount')
@section('page_tagline', 'Monthly Total Amount List')

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
                        Monthly Total Amount List
                    </h3>
            </div>
            <div class="float-right mt-3">
                <a href="{{ route('add-total') }}" class="btn btn-label-success btn-sm btn-upper">
                    <i class="fa fa-plus"></i> Add Monthly Total
                </a>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table
                class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                <thead>
                <tr>
                    <th>Landlord</th>
                    <th>House Name</th>
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
                    <th>Payment Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($totals as $total)
                    <tr id="tr-{{ $total->mt_id }}">
                        <td scope="row">{{ $total->name }}</td>
                        <td scope="row">{{ $total->m_house }}</td>
                        <td scope="row">{{ $total->flat_number }}</td>
                        <td scope="row">{{ $total->renter_name }}</td>
                        <td scope="row">{{ date('M-y', strtotime($total->mt_date)) }}</td>
                        <td scope="row">{{ $total->mt_rent }}</td>
                        <td scope="row">{{ $total->mt_water }}</td>
                        <td scope="row">{{ $total->mt_gas }}</td>
                        <td scope="row">{{ $total->mt_sewer }}</td>
                        <td scope="row">{{ $total->mt_current }}</td>
                        <td scope="row">{{ $total->mt_others_cost }}</td>
                        <td scope="row">{{ $total->mt_maintain }}</td>
                        <td scope="row">{{ $total->total_money }}</td>
                        <td scope="row">{{ $total->payment_date}}</td>
                        <td scope="row">{{ $total->payment_status }}</td>
                       
                        <td class="text-center">

                            
                             
                            <a href="{{route('edit-total',['id'=>$total->mt_id])}}" type="button" class="btn btn-success btn-sm btn-icon-sm btn-circle">
                            <i class="flaticon2-edit" title="edit"></i>
                            </a>

                            <a href="" class="btn btn-danger btn-sm btn-icon-sm btn-circle" data-toggle="modal" data-target="#delete{{$total->mt_id}}">
                                <i class="flaticon2-trash" title="delete"></i>
                            </a>

                            @if($total->payment_status=='Yes')
                            <a href="{{route('published-total',['id'=>$total->mt_id])}}" type="button" class="btn btn-success btn-sm btn-icon-sm btn-circle">
                                <i class="flaticon2-arrow-up" title="paid"></i>
                            </a>
                        @else
                            <a href="{{route('unpublished-total',['id'=>$total->mt_id])}}" type="button" class="btn btn-warning btn-sm btn-icon-sm btn-circle">
                                <i class="flaticon2-arrow-down" title="due"></i>
                            </a>
                        @endif
                            

                        </td>
                    </tr>

    
    <!-- Modal for Update -->



                <!-- Modal for delete -->
<div class="modal fade" id="delete{{$total->mt_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <br>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('delete-total',['id'=>$total->mt_id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h6>Are you sure you want to delete?</h6>
                                    <hr>        
                                    <div class="pull-right">
                                        <input type="submit" name="btn" class="btn btn-danger" value="Yes">

                                    <a href="{{route('view-total')}}" type="button" class="btn btn-danger">No</a>
                                    </div>
                                    
                                
                            
                                </form>
                            </div>
                        </div>
                    </div>
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
            // $('#passport-management-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            // $('#all-passport-list-sm').addClass('kt-menu__item--active');
            $('.table').DataTable({
                responsive: {
                    details: false
                }
            });
        });
    </script>
@endpush
