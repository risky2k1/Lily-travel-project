@php use Illuminate\Database\Eloquent\Builder; @endphp
<div class="col-xl-3 col-lg-4 lg:d-none">
    <form action="{{route('home.hotel.index')}}">
        <aside class="sidebar y-gap-40">

            <div class="sidebar__item -no-border">
                <h5 class="text-18 fw-500 mb-10">Tìm khách sạn</h5>
                <div class="single-field relative d-flex items-center py-10">
                    <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="text" name="name" placeholder="e.g. Best Western">
                    <button class="absolute d-flex items-center h-full">
                        <i class="icon-search text-20 px-15 text-dark-1"></i>
                    </button>
                </div>
            </div>

            <div class="sidebar__item pb-30">
                <h5 class="text-18 fw-500 mb-10">Giá phòng</h5>
                <div class="row x-gap-10 y-gap-30">
                    <div class="col-12">
                        <input type="range" name="range" id="priceRange" class="form-control" min="0" max="10000000" step="100000" style="width: 100% !important;">
                        <div class="range-values">
                            <span class="min-value">0đ</span>
                            <span class="max-value">10 triệu</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Amenities</h5>
                <div class="sidebar-checkbox">
                    @foreach($types as $type)
                        <div class="row y-gap-10 items-center justify-between">
                            <div class="col-auto">

                                <div class="d-flex items-center">
                                    <div class="form-checkbox ">
                                        <input type="checkbox" name="type[]" value="{{$type->id}}">
                                        <div class="form-checkbox__mark">
                                            <div class="form-checkbox__icon icon-check"></div>
                                        </div>
                                    </div>
                                    @php
                                        $hotelTypeAmount = \App\Models\Hotel::whereHas('types', function (Builder $query) use ($type) {
                                            $query->where('name', $type->name);
                                    })->count();
                                    @endphp
                                    <div class="text-15 ml-10">{{$type->name}}</div>

                                </div>

                            </div>

                            <div class="col-auto">
                                <div class="text-15 text-light-1">{{$hotelTypeAmount}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Amenities</h5>
                <div class="sidebar-checkbox">
                    @foreach($services as $service)

                        <div class="row y-gap-10 items-center justify-between">
                            <div class="col-auto">

                                <div class="d-flex items-center">
                                    <div class="form-checkbox ">
                                        <input type="checkbox" name="service[]" value="{{$service->id}}">
                                        <div class="form-checkbox__mark">
                                            <div class="form-checkbox__icon icon-check"></div>
                                        </div>
                                    </div>
                                    @php
                                        $hotelServiceAmount = \App\Models\Hotel::whereHas('services', function (Builder $query) use ($service) {
                                            $query->where('name', $service->name);
                                    })->count();
                                    @endphp
                                    <div class="text-15 ml-10">{{$service->name}}</div>

                                </div>

                            </div>

                            <div class="col-auto">
                                <div class="text-15 text-light-1">{{$hotelServiceAmount}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Style</h5>
                <div class="sidebar-checkbox">
                    @foreach($facilities as $facility)
                        <div class="row y-gap-10 items-center justify-between">
                            <div class="col-auto">

                                <div class="d-flex items-center">
                                    <div class="form-checkbox ">
                                        <input type="checkbox" name="facilities[]" value="{{$facility->id}}">
                                        <div class="form-checkbox__mark">
                                            <div class="form-checkbox__icon icon-check"></div>
                                        </div>
                                    </div>

                                    <div class="text-15 ml-10">{{$facility->name}}</div>

                                </div>

                            </div>
                            @php
                                $hotelFacilityAmount = \App\Models\Hotel::whereHas('facilities', function (Builder $query) use ($facility) {
                                    $query->where('name', $facility->name);
                            })->count();
                            @endphp
                            <div class="col-auto">
                                <div class="text-15 text-light-1">{{$hotelFacilityAmount}}</div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </aside>
        <button type="submit" class="button -md -dark-1 bg-blue-1 text-white mt-24">Lọc</button>
    </form>
</div>
