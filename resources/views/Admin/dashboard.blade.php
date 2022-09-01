@extends('Admin.layouts.app')

@section('page_title', 'Dashboard')
@section('page_tagline', 'Admin Dashboard')

@push('css')
    <style>
        .kt-widget17 .kt-widget17__stats {
            margin: 0 auto 0;
            width: 90%;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
            <!--begin:: Widgets/Activity-->
            <div
                class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                </div>
                <div class="kt-portlet__body" style="padding-bottom: 20px; background-color: #f1f2f7;">
                    <div class="kt-widget17">
                        <div
                            class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides"
                            style="background-color: #f1f2f7;">
                            <div class="kt-widget17__chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand"></div>
                                    <div class="chartjs-size-monitor-shrink">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="kt-widget17__stats">



                          


                          <div class="kt-widget17__items">



                            <div class="kt-widget17__item">
                                    <i class="fas fa-building" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
                                        <a href="{{route('view-house')}}">Number of Total Houses</a>
                            </span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
                                {{$houses}}
                            </span>
                                </div> 


                                
                                <div class="kt-widget17__item">
                                    <i class="fas fa-home" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
                                <a href="{{route('view-flat')}}">Number of Total Flats</a>
                            </span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
                                {{$flats}}
                            </span>
                                </div>

                                <div class="kt-widget17__item">
                                    <i class="fas fa-person-booth" style='font-size: 40px; color: #e73930;'></i>
                                    
                                    <span class="kt-widget17__subtitle">
                                <a href="{{route('view-rflat')}}">Number of Booked Flats</a>
                            </span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
                                {{$bookflats}}
                            </span>
                                </div>
                     

                            </div>
















                            <div class="kt-widget17__items">

                                <div class="kt-widget17__item">
                                    <i class="fa fa-user" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
    							<a href="{{route('view-renter')}}">Number of Total Renters</a>
    						</span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
    							{{$renters}}
    						</span>
                                </div>


                              
                              <div class="kt-widget17__item">
                                    <i class="fas fa-user-check" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
                                <a href="{{route('paid-renters')}}">Number of Paid Payment Renters</a>
                            </span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
                                {{ $paidrenters }}
                            </span>
                                </div>



                                <div class="kt-widget17__item">
                                    <i class="fas fa-user-times" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
    							<a href="{{route('due-renters')}}">Number of Due Payment Renters</a>
    						</span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
    							{{ $duerenters }}
    						</span>
                                </div>

                               
                            </div>


                            <div class="kt-widget17__items">
                                  <div class="kt-widget17__item">
                                    <i class="fas fa-money-bill-wave" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
                                Total Amount of Rents
                            </span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
                                {{$totalmoney}} tk
                            </span>
                                </div>


                                <div class="kt-widget17__item">
                                    <i class="fas fa-money-bill-alt" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
                                Total Amount of Collected Rents
                            </span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
                                {{$collectmoney}} tk
                            </span>
                                </div>


                                <div class="kt-widget17__item">
                                    <i class="far fa-money-bill-alt" style='font-size: 40px; color: #e73930;'></i>
                                    <span class="kt-widget17__subtitle">
                               Total Amounts of Due Rents
                            </span>
                                    <span class="kt-widget17__desc" style='font-size: 2rem; font-weight: 700;'>
                                {{$duemoney}} tk
                            </span>
                                </div>
                              </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Activity-->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#dashboard-mm').addClass('kt-menu__item--active');
    </script>
@endpush
