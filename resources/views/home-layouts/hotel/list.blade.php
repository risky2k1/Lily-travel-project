@extends('home-layouts.main')

@section('content')
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30">
                @include('home-layouts.hotel.components.sidebar')
                <div class="col-xl-9 col-lg-8">
                    <div class="row y-gap-10 items-center justify-between">
                        <div class="col-auto">
                            @if(request()->input('location'))
                            <div class="text-18"><span class="fw-500">{{$hotels->count()}} kết quả</span> ở {{\App\Models\Location::where('id',request()->input('location'))->first()->name}}</div>
                            @endif
                        </div>

                    </div>

                    <div class="mt-30"></div>

                    <div class="row y-gap-30">

                        @foreach($hotels as $hotel)
                            <div class="col-12 " >
                                <div class="border-top-light pt-30">
                                    <div class="row x-gap-20 y-gap-20">
                                        <div class="col-md-auto">

                                            <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                                                <div class="cardImage__content">
                                                    <div
                                                        class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                                                        <div class="swiper-wrapper" id="swiper-wrapper-8b10bab1c1a450d5a" aria-live="polite"
                                                             style="transition-duration: 0ms; transform: translate3d(-500px, 0px, 0px);">
                                                            @if($hotel->image)
                                                                @foreach($hotel->image as $key=>$image)
                                                                    <div class="swiper-slide">
                                                                        <img src="{{ asset('storage/'.$image) }}" alt="{{ $hotel->name }}">
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                        <div class="cardImage-slider__nav -prev">
                                                            <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev" tabindex="0" aria-label="Previous slide"
                                                                    aria-controls="swiper-wrapper-8b10bab1c1a450d5a">
                                                                <i class="icon-chevron-left text-10"></i>
                                                            </button>
                                                        </div>

                                                        <div class="cardImage-slider__nav -next">
                                                            <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next" tabindex="0" aria-label="Next slide"
                                                                    aria-controls="swiper-wrapper-8b10bab1c1a450d5a">
                                                                <i class="icon-chevron-right text-10"></i>
                                                            </button>
                                                        </div>
                                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

                                                </div>

                                                <div class="cardImage__wishlist">
                                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                                        <i class="icon-heart text-12"></i>
                                                    </button>
                                                </div>


                                            </div>

                                        </div>

                                        <div class="col-md">
                                            <h3 class="text-18 lh-16 fw-500">
                                                {{$hotel->name}}<br class="lg:d-none"> {{$hotel->location->name}}
                                            </h3>
                                            @if($hotel->rooms->count() >0)

                                            <div class="text-14 lh-15 mt-20">
                                                <div class="fw-500">{{$hotel->rooms->first()->name}}</div>
                                                <div class="text-light-1">{!! $hotel->roomOptions->first()->name !!}</div>
                                            </div>
                                            @endif
                                            <div class="text-14 text-green-2 lh-15 mt-10">
                                                <div class="fw-500">Miễn phí huỷ đặt phòng</div>
                                                <div class="">Bạn có thể huỷ sau, hãy đặt ngay phòng bây giờ.</div>
                                            </div>

                                            <div class="row x-gap-10 y-gap-10 pt-20">
                                                @foreach($hotel->services as $service)
                                                    <div class="col-auto">
                                                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">{{$service->name}}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-md-auto text-right md:text-left">

                                            <div class="">
                                                <div class="text-14 text-light-1 mt-50 md:mt-20">{{$hotel->nights}} đêm, {{$hotel->max_guests}} người</div>
                                                <div class="text-22 lh-12 fw-600 mt-5">{{number_format($hotel->price)}} VNĐ</div>


                                                <a href="{{route('home.hotel.show',$hotel)}}" class="button -md -dark-1 bg-blue-1 text-white mt-24 add-hotel-cart" data-hotel="{{$hotel->id}}">
                                                    Xem chi tiết
                                                    <div class="icon-arrow-top-right ml-15"></div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                    {{$hotels->links('vendor.pagination.simple-default')}}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            var priceRange = $('#priceRange');
            var minValue = $('.min-value');
            var maxValue = $('.max-value');

            priceRange.on('input', function () {
                updateValues();
            });

            updateValues();

            function updateValues() {
                minValue.text(formatCurrency(priceRange.prop('min')));
                maxValue.text(formatCurrency(priceRange.val()));
            }

            function formatCurrency(value) {
                return new Intl.NumberFormat('vi-VN', {style: 'currency', currency: 'VND'}).format(value);
            }
        });
    </script>
@endpush

