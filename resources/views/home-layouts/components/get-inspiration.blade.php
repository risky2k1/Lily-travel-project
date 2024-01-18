<section class="layout-pt-lg layout-pb-md">
    <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Lấy cảm hứng cho chuyến đi tiếp theo của bạn</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">Tham khảo các địa điểm đang được đặt phòng nhiều</p>
                </div>
            </div>
        </div>

        <div class="row y-gap-30 pt-40">
            @foreach($locationsWithBookings as $key=>$location)
                <div data-anim-child="slide-left delay-1" class="col-lg-4 col-sm-6">

                    <a href="" class="blogCard -type-1 d-block ">
                        <div class="blogCard__image">
                            <div class="ratio ratio-4:3 rounded-4 rounded-8">
                                <img class="img-ratio js-lazy" src="#" data-src="{{'img/blog/' . $key + 1 . '.jpg'}}" alt="image">
                            </div>
                        </div>

                        <div class="mt-20">
                            <h4 class="text-dark-1 text-18 fw-500">{{$location->name}}</h4>
{{--                            <div class="text-light-1 text-15 lh-14 mt-5">{{$location->hotels->count()}}</div>--}}
                        </div>
                    </a>

                </div>
            @endforeach


        </div>
    </div>
</section>
