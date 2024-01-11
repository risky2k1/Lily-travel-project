@extends('home-layouts.main')

@section('content')
    <section class="pt-40 layout-pb-md">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <form action="{{route('home.booking.store',['type'=>'hotel',$type->id])}}" method="post">
                        @csrf
                        <h2 class="text-22 fw-500 mt-40 md:mt-24">Để lại thông tin của bạn</h2>

                        <div class="row x-gap-20 y-gap-20 pt-20">
                            <div class="col-12">

                                <div class="form-input ">
                                    <input type="text" required name="name" id="name" @if(auth()->check()) value="{{auth()->user()->name}}" @endif>
                                    <label class="lh-1 text-16 text-light-1 required" for="name" >Họ tên</label>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-input ">
                                    <input type="email" required="" name="email" @if(auth()->check()) value="{{auth()->user()->email}}" @endif>
                                    <label class="lh-1 text-16 text-light-1">Email</label>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-input ">
                                    <input type="text" required="" name="phone" @if(auth()->check()) value="{{auth()->user()->phone}}" @endif>
                                    <label class="lh-1 text-16 text-light-1">Số điện thoại</label>
                                </div>

                            </div>
                            <div class="col-12">

                                <div class="form-input ">
                                    <input type="text" required="" name="address" @if(auth()->check()) value="{{auth()->user()->address}}" @endif>
                                    <label class="lh-1 text-16 text-light-1">Địa chỉ</label>
                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-input ">
                                    <textarea rows="6" name="request"></textarea>
                                    <label class="lh-1 text-16 text-light-1">Yêu cầu đặc biệt</label>
                                </div>

                            </div>

                        </div>

                        <div class="row y-gap-20 items-center justify-between">
                            <div class="col-auto">
                                <div class="text-14 text-light-1">
                                    Bằng cách tiến hành đặt phòng, bạn đồng ý với các điều khoản của chúng tôi
                                </div>
                            </div>

                            <div class="col-auto">

                                <button type="submit" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">
                                    Đặt ngay
                                    <div class="icon-arrow-top-right ml-15"></div>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>

                @include('home-layouts.booking.components.right-bar')
            </div>
        </div>
    </section>
@endsection
