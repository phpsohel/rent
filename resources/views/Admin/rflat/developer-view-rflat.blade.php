@extends('Admin.layouts.app')

@push('css')
    <!-- Datatables -->
    <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush


@php
if (isset($group_type)){
    $group_type = $group_type . ' ';
    if ($group_type == 'Hajj ') {
        $routeNamePrefix = 'hajj-groups';
    } elseif ($group_type == 'Omra Hajj ') {
        $routeNamePrefix = 'omra-hajj-groups';
    }
} else {
    $group_type  = '';
    $routeNamePrefix = 'groups';
}
@endphp


@section('page_title', 'Renter Flats')
@section('page_tagline', 'All Renter Flat List')

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
                        All Renter Flats List
                    </h3>
            </div>

            <div class="float-right mt-3" style="margin-left: 60rem">
            <a href="{{ route('add-renter') }}" class="btn btn-primary btn-sm btn-upper">
                    <i class="fa fa-plus"></i> Add Renter
                </a>
            </div>
            <div class="float-right mt-3">
            <a href="{{ route('add-rflat') }}" class="btn btn-label-success btn-sm btn-upper">
                    <i class="fa fa-plus"></i> Add Renter Flat
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
                    <th>Advance Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Rent Amount</th>
                    <th>Water Bill</th>
                    <th>Gas Bill</th>
                    <th>Sewerage Bill</th>
                    <th>Electricity Bill</th>
                    <th>Maintainance Cost</th>
                    <th>Others</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rflats as $rflat)
                    <tr id="tr-{{ $rflat->rf_id }}">
                        <td scope="row">{{ $rflat->name }}</td>
                        <td scope="row">{{ $rflat->house }}</td>
                        <td scope="row">{{ $rflat->f_number }}</td>
                        <td scope="row">{{ $rflat->r_name }}</td>
                        <td scope="row">{{ $rflat->advance }}</td>
                        <td scope="row">{{ date('d-M-y', strtotime($rflat->start_date)) }}</td>
                        <td scope="row">{{ $rflat->end_date }}</td>
                        <td scope="row">{{ $rflat->rent }}</td>
                        <td scope="row">{{ $rflat->water }}</td>
                        <td scope="row">{{ $rflat->gas }}</td>
                        <td scope="row">{{ $rflat->sewer }}</td>
                        <td scope="row">{{ $rflat->current }}</td>
                        <td scope="row">{{ $rflat->maintain_cost }}</td>
                        <td scope="row">{{ $rflat->others }}</td>
                       
                        <td class="text-center">

                            <a href="" class="btn btn-primary btn-sm btn-icon-sm btn-circle" data-toggle="modal" data-target="#v{{$rflat->rf_id}}">
                                <i class="fas fa-eye" title="view"></i>
                            </a>
                             
                            <a href="{{route('edit-rflat',['id'=>$rflat->rf_id])}}" type="button" class="btn btn-success btn-sm btn-icon-sm btn-circle">
                            <i class="flaticon2-edit" title="edit"></i>
                            </a>

                            <a href="" class="btn btn-danger btn-sm btn-icon-sm btn-circle" data-toggle="modal" data-target="#delete{{$rflat->rf_id}}">
                                <i class="flaticon2-trash" title="delete"></i>
                            </a>
                            

                        </td>
                    </tr>

    
    <!-- Modal for view -->
<div class="modal fade" id="v{{$rflat->rf_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Renter Flat Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">



                                   <div class="form-group">
                                        <!-- <label>Renter Image</label><br> -->
                                        <img src="{{($rflat->r_image)}}" alt="no image"  width="200px" height="auto" >
                                        
                                    </div>

<br>
<br>
                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                        <label>Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;&nbsp;{{$rflat->r_name}}
                                        
                                        <input type="hidden" class="form-control" name="r_id" value="{{$rflat->r_id}}">
                                    </div>

                                        </div>
                                          
                                        <div class="col-6">
                                            <div class="form-group">
                                        <label>Flat Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;&nbsp;{{$rflat->f_number}}
                                        
                                        <input type="hidden" class="form-control" name="r_id" value="{{$rflat->r_id}}">
                                    </div>
                                            
                                        </div>

                                    </div> 


                                   <div class="row">
                                        
                                        <div class="col-6">
                                            
                                         <div class="form-group">
                                        <label>Phone Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;
                                       {{$rflat->r_phone}}
                                       
                                    </div>
                                        </div>
                                          
                                        <div class="col-6">

                                    <div class="form-group">
                                        <label>Floor Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;
                                       {{$rflat->f_floor}} th
                                       
                                    </div>

                                            
                                        </div>

                                    </div> 


                                    <div class="row">
                                        
                                        <div class="col-6">
                                            
                                         <div class="form-group">
                                        <label>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;
                                       {{$rflat->r_email}}
                                       
                                    </div>
                                        </div>
                                          
                                        <div class="col-6">

                                           <div class="form-group">
                                        <label>Advance Amount &nbsp;:</label>&nbsp;&nbsp;&nbsp;
                                       {{$rflat->advance}} tk
                                       
                                    </div>

                                            
                                        </div>

                                    </div> 

                                    

                                    
                                    <div class="row">
                                        
                                        <div class="col-6">
                                            
                                         <div class="form-group">
                                        <label>Permanent Address&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;
                                       {{$rflat->per_address}}
                                       
                                    </div>
                                        </div>
                                         <div class="col-6">
                                             <div class="form-group">
                                        <label>Rent Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;
                                       {{$rflat->rent}} tk
                                       
                                    </div> 
                                         </div> 
                                       

                                    </div> 

                                      



                                      <div class="row">
                                        
                                        <div class="col-6">
                                            
                                         <div class="form-group">
                                        <label>NID Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;
                                       {{$rflat->r_nid}}
                                       
                                    </div>
                                        </div>
                                        
                                       

                                    </div> 
                                            
                                
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal for delete -->
<div class="modal fade" id="delete{{$rflat->rf_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <br>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('delete-rflat',['id'=>$rflat->rf_id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h6>Are you sure you want to delete?</h6>
                                    <hr>

                                    <div class="pull-right">
                                        <input type="submit" name="btn" class="btn btn-danger" value="Yes">

                                    <a href="{{route('view-rflat')}}" type="button" class="btn btn-danger">No</a>
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
            @if($group_type == 'Hajj ')
            $('#hajj-management-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            $('#hajj-groups-sm').addClass('kt-menu__item--active');
            @elseif($group_type == 'Omra Hajj ')
            $('#omra-hajj-management-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            $('#omra-hajj-groups-sm').addClass('kt-menu__item--active');
            @else
            $('#groups-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            $('#groups-sm').addClass('kt-menu__item--active');
            @endif
            $('.table').DataTable({
                responsive: {
                    details: false
                }
            });
        });
    </script>
   <!--  <script>
        $(document).ready(function () {
            $('#passport-management-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
            $('#all-passport-list-sm').addClass('kt-menu__item--active');
            $('.table').DataTable({
                responsive: {
                    details: false
                }
            });
        });
    </script> -->
@endpush
