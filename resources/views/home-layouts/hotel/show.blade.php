@extends('home-layouts.main')

@section('content')
    <section class="pt-40">
        <div class="container">
            <div class="row y-gap-20 justify-between items-end">
                <div class="col-auto">
                    <div class="row x-gap-20  items-center">
                        <div class="col-auto">
                            <h1 class="text-30 sm:text-25 fw-600">{{$hotel->name}}</h1>
                        </div>

                    </div>

                    <div class="row x-gap-20 y-gap-20 items-center">
                        <div class="col-auto">
                            <div class="d-flex items-center text-15 text-light-1">
                                <i class="icon-location-2 text-16 mr-5"></i>
                                {{$hotel->address}}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-auto">
                    <div class="row x-gap-15 y-gap-15 items-center">
                        <div class="col-auto">
                            <div class="text-14">
                                Chỉ từ
                                <span class="text-22 text-dark-1 fw-500">{{number_format($hotel->price)}} VNĐ</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="galleryGrid -type-1 pt-30">
                <div class="galleryGrid__item relative d-flex">
                    <img src="{{asset('storage/'.($hotel->image)[0])??asset('img/hotels/1.png')}}" alt="image" class="rounded-4">

                    <div class="absolute px-20 py-20 col-12 d-flex justify-end">
                        <button class="button -blue-1 size-40 rounded-full flex-center bg-white text-dark-1">
                            <i class="icon-heart text-16"></i>
                        </button>
                    </div>
                </div>
                @if($hotel->image)
                    @foreach($hotel->image as $key=>$image)
                        <div class="galleryGrid__item @if($key %2!= 0)relative d-flex @endif">
                            <img src="{{ asset('storage/'.$image) }}" alt="{{ $hotel->name }}">
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <section class="pt-30">
        <div class="container">
            <div class="row y-gap-30">
                <div class="col-xl-8">
                    <div class="row y-gap-40">
                        <div class="col-12">
                            <h3 class="text-22 fw-500">Property highlights</h3>
                            <div class="row y-gap-20 pt-30">

                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <i class="icon-city text-24 text-blue-1"></i>
                                        <div class="text-15 lh-1 mt-10">Gần các trung tâm lớn</div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <i class="icon-airplane text-24 text-blue-1"></i>
                                        <div class="text-15 lh-1 mt-10">Gần sân bay</div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <i class="icon-bell-ring text-24 text-blue-1"></i>
                                        <div class="text-15 lh-1 mt-10">Trực lễ tân 24/7</div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <i class="icon-tv text-24 text-blue-1"></i>
                                        <div class="text-15 lh-1 mt-10">Dịch vụ TV cao cấp</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="overview" class="col-12">
                            <h3 class="text-22 fw-500 pt-40 border-top-light">Nội dung</h3>
                            <p class="text-dark-1 text-15 mt-20">
                                {{$hotel->content}}
                            </p>
                            <a href="#" class="d-block text-14 text-blue-1 fw-500 underline mt-10">Hiển thị thêm</a>
                        </div>

                        <div class="col-12">
                            <h3 class="text-22 fw-500 pt-40 border-top-light">Các cơ sở vật chất của chúng tôi</h3>
                            <div class="row y-gap-10 pt-20">
                                @foreach($hotel->facilities as $facility)
                                    <div class="col-md-5">
                                        <div class="d-flex x-gap-15 y-gap-15 items-center">
                                            <i class="icon-no-smoke"></i>
                                            <div class="text-15">{{$facility->name}}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="ml-50 lg:ml-0">

                        <div class="px-30 py-30 border-light rounded-4 mt-30">
                            <div class="flex-center ratio ratio-15:9 mb-15 js-lazy loaded" data-ll-status="loaded">
                                {!! $hotel->map !!}
                            </div>

                            <div class="row y-gap-10">
                                <div class="col-12">
                                    <div class="d-flex items-center">
                                        <i class="icon-award text-20 text-blue-1"></i>
                                        <div class="text-14 fw-500 ml-10">Vị trí địa lí tuyệt vời</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex items-center">
                                        <i class="icon-pedestrian text-20 text-blue-1"></i>
                                        <div class="text-14 fw-500 ml-10">Dễ dàng đi bộ</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="rooms" class="pt-30">
        <div class="container">
            <div class="row pb-20">
                <div class="col-auto">
                    <h3 class="text-22 fw-500">Các phòng hiện còn trống</h3>
                </div>
            </div>
            @if($hotel->rooms->count() >0)
                <div class="border-light rounded-4 px-30 py-30 sm:px-20 sm:py-20">
                    <div class="row y-gap-20">
                        <div class="col-12">
                            <h3 class="text-18 fw-500 mb-15">{{$hotel->rooms->first()?->name}}</h3>
                            <div class="roomGrid">
                                <div class="roomGrid__header">
                                    <div>Loại phòng</div>
                                    <div>Dịch vụ</div>
                                    <div>Giá</div>
                                    <div style="margin-left: 80px">Số người</div>
                                    <div></div>
                                </div>

                                <div class="roomGrid__grid">
                                    <div>
                                        <div class="">
                                            <div class="d-flex items-center">
                                                <i class="icon-no-smoke text-20 mr-10"></i>
                                                <div class="text-15">Không hút thuốc</div>
                                            </div>

                                            <div class="d-flex items-center">
                                                <i class="icon-wifi text-20 mr-10"></i>
                                                <div class="text-15">Miễn phí wifi</div>
                                            </div>

                                            <div class="d-flex items-center">
                                                <i class="icon-kitchen text-20 mr-10"></i>
                                                <div class="text-15">Phòng bếp</div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="y-gap-30">

                                        <div class="roomGrid__content">
                                            <div>
                                                <div class="text-15 fw-500 mb-10">Đã bao gồm:</div>

                                                <div class="y-gap-8">
                                                    @foreach(explode("\n", $hotel->roomOptions->first()?->name) as $item)
                                                        <div class="d-flex items-center text-green-2">
                                                            <i class="icon-check text-12 mr-10"></i>
                                                            <div class="text-15">{{$item}}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>


                                            <div>
                                                <div class="text-18 lh-15 fw-500">{{number_format($hotel->rooms->first()->price)}} VNĐ</div>
                                            </div>
                                            <div>
                                                <div class="text-18 lh-15 fw-500">{{$hotel->rooms->first()->max_guests}}</div>
                                            </div>
                                        </div>


                                    </div>

                                    <div>
                                        <div class="text-22 fw-500 lh-17 mt-5">{{number_format($hotel->rooms->first()->price)}} VNĐ</div>


                                        <a href="{{route('home.booking.create',$hotel->rooms->first()->id)}}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white mt-10">
                                            Đặt ngay
                                            <div class="icon-arrow-top-right ml-15"></div>
                                        </a>


                                        <div class="text-15 fw-500 mt-30">Bạn sẽ được đưa tới bước tiếp theo</div>

                                        <ul class="list-disc y-gap-4 pt-5">

                                            <li class="text-14">Xác thực ngay lập tức</li>

                                            <li class="text-14">Không cần đăng kí</li>

                                            <li class="text-14">Không thêm phụ phí!</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h1>Khách sạn hiện tại đang hết phòng</h1>
            @endif
        </div>
    </section>
@endsection
