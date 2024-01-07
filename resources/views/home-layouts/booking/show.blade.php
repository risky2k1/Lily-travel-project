@extends('home-layouts.main')

@section('content')
    <section class="pt-40 layout-pb-md">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <h2 class="text-22 fw-500 mt-40 md:mt-24">Let us know who you are</h2>

                    <div class="row x-gap-20 y-gap-20 pt-20">
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required="" name="name" value="{{$booking->username}}">
                                <label class="lh-1 text-16 text-light-1">Full Name</label>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="email" required="" name="email" value="{{$booking->user_email}}">
                                <label class="lh-1 text-16 text-light-1">Email</label>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-input ">
                                <input type="text" required="" name="phone" value="{{$booking->user_phone}}">
                                <label class="lh-1 text-16 text-light-1">Phone Number</label>
                            </div>

                        </div>
                        <div class="col-12">

                            <div class="form-input ">
                                <input type="text" required="" name="address" value="{{$booking->user_address}}">
                                <label class="lh-1 text-16 text-light-1">Address line</label>
                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-input ">
                                <textarea required="" rows="6" name="request">{{$booking->user_request}}</textarea>
                                <label class="lh-1 text-16 text-light-1">Special Requests</label>
                            </div>

                        </div>

                    </div>

                    <div class="row y-gap-20 items-center justify-between">
                        <div class="col-auto">
                            <div class="text-14 text-light-1">
                                By proceeding with this booking, I agree to GoTrip Terms of Use and Privacy Policy.
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-5 col-lg-4">
                    <div class="ml-80 lg:ml-40 md:ml-0">
                        <div class="px-30 py-30 border-light rounded-4">
                            <div class="text-20 fw-500 mb-30">Your booking details</div>

                            <div class="row x-gap-15 y-gap-20">
                                <div class="col-auto">
                                    <img src="{{asset('img/backgrounds/1.png')}}" alt="image" class="size-140 rounded-4 object-cover">
                                </div>

                                <div class="col">
                                    <div class="d-flex x-gap-5 pb-10">

                                        <i class="icon-star text-yellow-1 text-10"></i>

                                        <i class="icon-star text-yellow-1 text-10"></i>

                                        <i class="icon-star text-yellow-1 text-10"></i>

                                        <i class="icon-star text-yellow-1 text-10"></i>

                                        <i class="icon-star text-yellow-1 text-10"></i>

                                    </div>

                                    <div class="lh-17 fw-500">{{$type->hotel->name}}</div>
                                    <div class="text-14 lh-15 mt-5">{{$type->hotel->address}}</div>

                                    <div class="row x-gap-10 y-gap-10 items-center pt-10">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="size-30 flex-center bg-blue-1 rounded-4">
                                                    <div class="text-12 fw-600 text-white">4.8</div>
                                                </div>

                                                <div class="text-14 fw-500 ml-10">Exceptional</div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <div class="text-14">3,014 reviews</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top-light mt-30 mb-20"></div>

                            <div class="row y-gap-20 justify-between">
                                <div class="col-auto">
                                    <div class="text-15">Check-in</div>
                                    <div class="fw-500">{{$type->hotel->checkin_time}}</div>
                                    <div class="text-15 text-light-1">15:00 – 23:00</div>
                                </div>

                                <div class="col-auto md:d-none">
                                    <div class="h-full w-1 bg-border"></div>
                                </div>

                                <div class="col-auto text-right md:text-left">
                                    <div class="text-15">Check-out</div>
                                    <div class="fw-500">{{$type->hotel->checkout_time}}</div>
                                    <div class="text-15 text-light-1">01:00 – 11:00</div>
                                </div>
                            </div>

                            <div class="border-top-light mt-30 mb-20"></div>

                            <div class="">
                                <div class="text-15"> Số đêm:</div>
                                <div class="fw-500">{{$type->hotel->nights}}</div>
                                {{--                                <a href="#" class="text-15 text-blue-1 underline">Travelling on different dates?</a>--}}
                            </div>
                        </div>

                        <div class="px-30 py-30 border-light rounded-4 mt-30">
                            <div class="text-20 fw-500 mb-20">Your price summary</div>

                            <div class="row y-gap-5 justify-between">
                                <div class="col-auto">
                                    <div class="text-15">Superior Twin</div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-15">US$3,372.34</div>
                                </div>
                            </div>

                            <div class="row y-gap-5 justify-between pt-5">
                                <div class="col-auto">
                                    <div class="text-15">Taxes and fees</div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-15">US$674.47</div>
                                </div>
                            </div>

                            <div class="row y-gap-5 justify-between pt-5">
                                <div class="col-auto">
                                    <div class="text-15">Booking fees</div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-15">FREE</div>
                                </div>
                            </div>

                            <div class="px-20 py-20 bg-blue-2 rounded-4 mt-20">
                                <div class="row y-gap-5 justify-between">
                                    <div class="col-auto">
                                        <div class="text-18 lh-13 fw-500">Price</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-18 lh-13 fw-500">US$4,046.81</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
