<div class="tabs__pane -tab-item-4">
    <div class="col-xl-9 col-lg-11">
        <div class="row x-gap-100 y-gap-15">
            <div class="col-12">
                <div class="text-18 fw-500">Loại khách sạn</div>
            </div>

            @foreach($types as $type)
                <div class="col-lg-3 col-sm-6">
                    <div class="row y-gap-15">
                        <div class="col-12">
                            <div class="d-flex items-center">
                                <div class="form-checkbox ">
                                    <input type="checkbox" name="type[]" value="{{$type->id}}" @checked(in_array($type->id,$selectedTypes))>
                                    <div class="form-checkbox__mark">
                                        <div class="form-checkbox__icon icon-check"></div>
                                    </div>
                                </div>
                                <div class="text-15 lh-11 ml-10">{{$type->name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row x-gap-100 y-gap-15 pt-30">
            <div class="col-12">
                <div class="text-18 fw-500">Facilities</div>
            </div>

            @foreach($facilities as $facility)
                <div class="col-lg-3 col-sm-6">
                    <div class="row y-gap-15">
                        <div class="col-12">

                            <div class="d-flex items-center">
                                <div class="form-checkbox ">
                                    <input type="checkbox" name="facility[]" value="{{$facility->id}}" @checked(in_array($facility->id,$selectedFacilities))>
                                    <div class="form-checkbox__mark">
                                        <div class="form-checkbox__icon icon-check"></div>
                                    </div>
                                </div>

                                <div class="text-15 lh-11 ml-10">{{$facility->name}}</div>

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="row x-gap-100 y-gap-15 pt-30">
            <div class="col-12">
                <div class="text-18 fw-500">Hotel Services</div>
            </div>

            @foreach($services as $service)

                <div class="col-lg-3 col-sm-6">
                    <div class="row y-gap-15">
                        <div class="col-12">

                            <div class="d-flex items-center">
                                <div class="form-checkbox ">
                                    <input type="checkbox" name="service[]" value="{{$service->id}}" @checked(in_array($service->id,$selectedServices))>
                                    <div class="form-checkbox__mark">
                                        <div class="form-checkbox__icon icon-check"></div>
                                    </div>
                                </div>

                                <div class="text-15 lh-11 ml-10">{{$service->name}}</div>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>
</div>
