<section class="layout-pt-md layout-pb-md">
    <div data-anim="slide-up delay-1" class="container">
        <div class="row y-gap-10 justify-between items-end">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Nổi bật</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">Các khách sạn chúng tôi đánh giá cao</p>
                </div>
            </div>
            <div class="col-auto md:d-none">

                <a href="{{route('home.hotel.index')}}" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
                    Xem tất cả
                    <div class="icon-arrow-top-right ml-15"></div>
                </a>

            </div>
        </div>

        <div class="relative overflow-hidden pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar data-slider-cols="xl-4 lg-3 md-2 sm-2 base-1" data-nav-prev="js-hotels-prev"
             data-pagination="js-hotels-pag" data-nav-next="js-hotels-next">
            <div class="swiper-wrapper">
                @foreach($hotels as $hotel)
                    <div class="swiper-slide add-hotel-cart" data-hotel="{{$hotel->id}}">

                        <a href="{{--{{route('home.hotel.show',$hotel)}}--}}#" class="hotelsCard -type-1 ">
                            <div class="hotelsCard__image">

                                <div class="cardImage ratio ratio-1:1">
                                    <div class="cardImage__content">
                                        @if($hotel->image)
                                            <img class="rounded-4 col-12" src="{{asset('storage/'.($hotel->image)[0])}}" alt="image">
                                        @else
                                            <img class="rounded-4 col-12" src="{{asset('img/hotels/1.png')}}" alt="image">
                                        @endif
                                    </div>

                                    <div class="cardImage__wishlist">
                                        <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>


                                    <div class="cardImage__leftBadge">
                                        <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                                            Miễn phí hoàn huỷ
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="hotelsCard__content mt-10">
                                <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                                    <span>{{$hotel->name}}</span>
                                </h4>
                                <div class="hotelsCard__title">
                                    <span>{{$hotel->description}}</span>
                                </div>

                                <p class="text-light-1 lh-14 text-14 mt-5">{{$hotel->address}}</p>


                                <div class="mt-5">
                                    <div class="fw-500">
                                        Chỉ từ <span class="text-blue-1">{{number_format($hotel->price)}} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
