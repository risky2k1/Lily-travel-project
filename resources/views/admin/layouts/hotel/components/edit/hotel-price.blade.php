<div class="tabs__pane -tab-item-3">
    <div class="col-xl-9 col-lg-11">
        <div class="row x-gap-20 y-gap-20">
            <div class="col-12">
                <div class="text-18 fw-500 mb-10">Giá</div>


                <div class="form-input ">
                    <input type="text" name="price" id="price" value="{{$hotel->price}}">
                    <label for="price" class="lh-1 text-16 text-light-1">Giá</label>
                </div>

            </div>
        </div>

        <div class="text-18 fw-500 mb-10 pt-30">Check in / Check out time</div>
        <div class="row x-gap-20 y-gap-20">

            <div class="col-md-6">

                <div class="form-input ">
                    <input type="date" name="checkin" value="{{$hotel->checkin_time}}">
                    <label class="lh-1 text-16 text-light-1">Thời gian check in</label>
                </div>

            </div>

            <div class="col-md-6">

                <div class="form-input ">
                    <input type="date" name="checkout" value="{{$hotel->checkout_time}}">
                    <label class="lh-1 text-16 text-light-1">Thời gian check out</label>
                </div>


            </div>

        </div>

    </div>
</div>

@push('js')
@endpush
