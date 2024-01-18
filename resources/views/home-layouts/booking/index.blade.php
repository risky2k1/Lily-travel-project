@extends('home-layouts.main')

@section('content')
    <section class="pt-40 layout-pb-md">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <h2 class="text-22 fw-500 mt-40 md:mt-24">Thông tin đặt phòng</h2>

                    <div class="row x-gap-20 y-gap-20 pt-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" disabled name="name" value="{{$booking->user_name}}">
                                <label class="lh-1 text-16 text-light-1 top-15">Họ tên</label>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="email" disabled name="email" value="{{$booking->user_email}}">
                                <label class="lh-1 text-16 text-light-1 top-15">Email</label>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" disabled name="phone" value="{{$booking->user_phone}}">
                                <label class="lh-1 text-16 text-light-1 top-15">Số điện thoại</label>
                            </div>

                        </div>
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" disabled name="address" value="{{$booking->user_address}}">
                                <label class="lh-1 text-16 text-light-1 top-15">Địa chỉ</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <textarea disabled rows="6" name="request">{{$booking->user_request}}</textarea>
                                <label class="lh-1 text-16 text-light-1 top-15">Yêu cầu</label>
                            </div>

                        </div>

                    </div>

                    <div class="row y-gap-20 items-center justify-between">
                        <div class="col-auto">
                        </div>

                        <div class="col-auto">


                        </div>
                    </div>
                </div>

                @include('home-layouts.booking.components.right-bar')
            </div>
        </div>
    </section>
@endsection
