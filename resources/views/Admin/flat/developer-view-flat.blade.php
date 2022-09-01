@extends('Admin.layouts.app')

@push('css')
    <!-- Datatables -->
    <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Flats')
@section('page_tagline', 'All Flat List')

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
                        All Flat List
                    </h3>
            </div>
            <div class="float-right mt-3">
                <a href="{{ route('add-flat') }}" class="btn btn-label-success btn-sm btn-upper">
                    <i class="fa fa-plus"></i> Add New Flat
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
                    <th>Floor Number</th>
                    <th>Flat Size (Square-feet)</th>
                    <th>Flat Availability</th>
                    <!-- <th>Flat Status</th> -->
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($flats as $flat)
                    <tr id="tr-{{ $flat->f_id }}">
                        <td scope="row">{{ $flat->name }}</td>
                        <td scope="row">{{ $flat->house }}</td>
                        <td scope="row">{{ $flat->f_number }}</td>
                        <td scope="row">{{ $flat->f_floor }}</td>
                        <td scope="row">{{ $flat->f_sqft }}</td>
                        <td scope="row">{{ $flat->f_available }}</td>
                       
                        <td class="text-center">

                            
                             
                            <a href="{{route('edit-flat',['id'=>$flat->f_id])}}" type="button" class="btn btn-success btn-sm btn-icon-sm btn-circle">
                            <i class="flaticon2-edit" title="edit"></i>
                            </a>

                            <a href="" class="btn btn-danger btn-sm btn-icon-sm btn-circle" data-toggle="modal" data-target="#delete{{$flat->f_id}}">
                                <i class="flaticon2-trash" title="delete"></i>
                            </a>

                             <!-- @if($flat->f_status==1)
                            <a href="{{route('published-flat',['id'=>$flat->f_id])}}" type="button" class="btn btn-success btn-sm btn-icon-sm btn-circle">
                                <i class="flaticon2-arrow-up" title="active"></i>
                            </a>
                        @else
                            <a href="{{route('unpublished-flat',['id'=>$flat->f_id])}}" type="button" class="btn btn-warning btn-sm btn-icon-sm btn-circle">
                                <i class="flaticon2-arrow-down" title="inactive"></i>
                            </a>
                        @endif -->

                        </td>
                    </tr>

    
    <!-- Modal for Update -->



                <!-- Modal for delete -->
<div class="modal fade" id="delete{{$flat->f_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <br>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('delete-flat',['id'=>$flat->f_id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h6>Are you sure you want to delete?</h6>
                                    <hr>
                                     <div class="pull-right">
                                        <input type="submit" name="btn" class="btn btn-danger" value="Yes">

                                    <a href="{{route('view-flat')}}" type="button" class="btn btn-danger">No</a>
                                    </div>

                                    <!-- <input type="submit" name="btn" class="btn btn-danger pull-right" value="delete"> -->
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
