@php
    if (isset($type)){
        $item = $type->hotel;
    }
    elseif (isset($booking)){
        $item = $booking->modelType;
    }
@endphp
<div class="col-xl-5 col-lg-4">
    <div class="ml-80 lg:ml-40 md:ml-0">
        <div class="px-30 py-30 border-light rounded-4">
            <div class="text-20 fw-500 mb-30">Chi tiết đơn đặt</div>

            <div class="row x-gap-15 y-gap-20">
                <div class="col-auto">
                    <img src="{{asset('storage/'.($item->image)[0])??asset('img/hotels/1.png')}}" alt="image" class="size-140 rounded-4 object-cover">
                </div>

                <div class="col">

                    <div class="lh-17 fw-500">{{$item->name}}</div>
                    <div class="text-14 lh-15 mt-5">{{$item->address??'abc'}}</div>
                    <div class="text-14 lh-15 mt-5">{{$item->rooms->first()->name??'abc'}}</div>

                </div>
            </div>

            <div class="border-top-light mt-30 mb-20"></div>

            <div class="row y-gap-20 justify-between">
                <div class="col-auto">
                    <div class="text-15">Check-in</div>
                    <div class="fw-500">{{$item->checkin_time}}</div>
                </div>

                <div class="col-auto md:d-none">
                    <div class="h-full w-1 bg-border"></div>
                </div>

                <div class="col-auto text-right md:text-left">
                    <div class="text-15">Check-out</div>
                    <div class="fw-500">{{$item->checkout_time}}</div>
                </div>
            </div>

            <div class="border-top-light mt-30 mb-20"></div>

            <div class="">
                <div class="text-15">Số đêm:</div>
                <div class="fw-500">{{$item->nights}} đêm</div>
            </div>
        </div>

        <div class="px-30 py-30 border-light rounded-4 mt-30">
            <div class="text-20 fw-500 mb-20">Tổng tiền</div>

            <div class="px-20 py-20 bg-blue-2 rounded-4 mt-20">
                <div class="row y-gap-5 justify-between">
                    <div class="col-auto">
                        <div class="text-18 lh-13 fw-500">Giá</div>
                    </div>
                    <div class="col-auto">
                        @if(isset($type))
                            <div class="text-18 lh-13 fw-500">{{number_format($type->price)}} VNĐ</div>
                        @else
                            <div class="text-18 lh-13 fw-500">{{number_format($booking->total)}} VNĐ</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
