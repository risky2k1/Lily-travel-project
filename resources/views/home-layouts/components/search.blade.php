<section data-anim-wrap class="masthead -type-1 z-5">
    <div data-anim-child="fade" class="masthead__bg">
        <img src="#" alt="image" data-src="img/masthead/1/bg2.webp" class="js-lazy">
    </div>

    <div class="container">
        <div class="row justify-center">
            <div class="col-auto">
                <div class="text-center">
                    <h1 data-anim-child="slide-up delay-4" class="text-60 lg:text-40 md:text-30 text-white">Tìm nơi nghỉ chân lí tưởng</h1>
                    <p data-anim-child="slide-up delay-5" class="text-white mt-6 md:mt-10">Khám phá thêm những địa điểm thú vị, cùng ưu đãi tuyệt vời</p>
                </div>

                <div data-anim-child="slide-up delay-6" class="tabs -underline mt-60 js-tabs">
                    <div class="tabs__controls d-flex x-gap-30 y-gap-20 justify-center sm:justify-start js-tabs-controls">

                        <div class="">
                            <button class="tabs__button text-15 fw-500 text-white pb-4 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">Hotel</button>
                        </div>

                    </div>

                    <div class="tabs__content mt-30 md:mt-20 js-tabs-content">
                        <form action="{{route('home.hotel.index')}}">

                            <div class="tabs__pane -tab-item-1 is-tab-el-active">

                                <div class="mainSearch -w-900 bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-100">
                                    <div class="button-grid items-center">
                                        @php
                                            $locations = \App\Models\Location::all();
                                        @endphp
                                        <div class="searchMenu-loc px-30 lg:py-20 lg:px-0">
                                            <select class="select2" name="location">
                                                @foreach($locations as $location)
                                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="">

                                            <div data-x-dd-click="searchMenu-date">
                                                <h4 class="text-15 fw-500 ls-2 lh-16">Check in - Check out</h4>

                                                <div class="text-15 text-light-1 ls-2 lh-16 d-flex">
                                                    <div>
                                                        <input type="text" name="check_in" class="form-control-sm date-picker" placeholder="Check in">
                                                    </div>
                                                    -
                                                    <div>
                                                        <input type="text" name="check_out" class="form-control-sm date-picker" placeholder="Check out">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="ms-5">

                                            <div data-x-dd-click="searchMenu-guests">
                                                <h4 class="text-15 fw-500 ls-2 lh-16">Khách</h4>

                                                <div class="text-15 text-light-1 ls-2 lh-16 d-flex">
                                                    <i class="fa-solid fa-user"></i>
                                                    <input type="number" class="form-control-sm" name="guests">
                                                </div>
                                            </div>


                                        </div>


                                        <div class="button-item">
                                            <button type="submit" class="mainSearch__submit button -dark-1 h-60 px-35 col-12 rounded-100 bg-blue-1 text-white">
                                                <i class="icon-search text-20 mr-10"></i>
                                                Tìm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('js')
    <script>
        $( function() {
            $( ".date-picker" ).datepicker({
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
            });
        } );
    </script>
@endpush
