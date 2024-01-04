@extends('admin.layouts.main')

@section('content')
    <div class="row y-gap-30">

        <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-auto">
                        <div class="fw-500 lh-14">Bạn có</div>
                        <div class="text-26 lh-16 fw-600 mt-5">{{$pendingHotels .' khách sạn'}}</div>
                        <br>
                        <div class="text-26 lh-16 fw-600 mt-5">{{$pendingBookings.' đơn đặt'}}</div>
                        <div class="text-15 lh-14 text-light-1 mt-5">Đang chờ duyệt</div>
                    </div>

                    <div class="col-auto">
                        <img src="img/dashboard/icons/1.svg" alt="icon">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-auto">
                        <div class="fw-500 lh-14">Lợi nhuận</div>
                        <div class="text-26 lh-16 fw-600 mt-5">{{number_format($totalAmounts)}} VNĐ</div>
                        <div class="text-15 lh-14 text-light-1 mt-5">Tổng thu</div>
                    </div>

                    <div class="col-auto">
                        <img src="img/dashboard/icons/2.svg" alt="icon">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-auto">
                        <div class="fw-500 lh-14">Bookings</div>
                        <div class="text-26 lh-16 fw-600 mt-5">{{$bookingAmounts}}</div>
                        <div class="text-15 lh-14 text-light-1 mt-5">Tổng số đơn đặt</div>
                    </div>

                    <div class="col-auto">
                        <img src="img/dashboard/icons/3.svg" alt="icon">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-auto">
                        <div class="fw-500 lh-14">Người dùng</div>
                        <div class="text-26 lh-16 fw-600 mt-5">{{$userAmounts}}</div>
                        <div class="text-15 lh-14 text-light-1 mt-5">Người dùng hệ thống</div>
                    </div>

                    <div class="col-auto">
                        <img src="img/dashboard/icons/4.svg" alt="icon">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row y-gap-30 pt-20">
        <div class="col-xl-7 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="d-flex justify-between items-center">
                    <h2 class="text-18 lh-1 fw-500">
                        Earning Statistics
                    </h2>


                    <div class="dropdown js-dropdown js-category-active">
                        <div class="dropdown__button d-flex items-center bg-white border-light rounded-100 px-15 py-10 text-14 lh-12" data-el-toggle=".js-category-toggle"
                             data-el-toggle-active=".js-category-active">
                            <span class="js-dropdown-title">Khách sạn</span>
                            <i class="icon icon-chevron-sm-down text-7 ml-10"></i>
                        </div>

                        <div class="toggle-element -dropdown  js-click-dropdown js-category-toggle">
                            <div class="text-14 y-gap-15 js-dropdown-list">
                                <div><a href="#" class="d-block js-dropdown-link">Bookings</a></div>

                                <div><a href="#" class="d-block js-dropdown-link">Tổng thu</a></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="pt-30">
                    <canvas id="lineChart" width="747" height="373" style="display: block; box-sizing: border-box; height: 373px; width: 747px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="d-flex justify-between items-center">
                    <h2 class="text-18 lh-1 fw-500">
                        Recent Bookings
                    </h2>

                    <div class="">
                        <a href="{{route('admin.booking.index')}}" class="text-14 text-blue-1 fw-500 underline">View All</a>
                    </div>
                </div>

                <div class="overflow-scroll scroll-bar-1 pt-30">
                    <table class="table-2 col-12">
                        <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recentBookings as $booking)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$booking->modelType->name}}</td>
                                <td class="fw-500">{{number_format($booking->total)}} VNĐ</td>
                                <td>$0</td>
                                <td>
                                    <div class="rounded-100 py-4 text-center col-12 text-14 fw-500 {{$booking->state->class()}}">{{$booking->state}}</div>
                                </td>
                                <td>{{\Carbon\Carbon::parse($booking->created_at)->format('d/m/Y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
