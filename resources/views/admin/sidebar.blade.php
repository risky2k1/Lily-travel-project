<div class="dashboard__sidebar bg-white scroll-bar-1">

    <div class="sidebar -dashboard">

        <div class="sidebar__item ">


            <a href="{{route('admin.index')}}" class="sidebar__button d-flex items-center text-15 lh-1 fw-500">
                <img src="{{asset('img/dashboard/sidebar/compass.svg')}}" alt="image" class="mr-15">
                Dashboard
            </a>


        </div>

        <div class="sidebar__item ">
            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="{{asset('img/dashboard/sidebar/hotel.svg')}}" alt="image" class="mr-10">
                                Khách sạn
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="{{route('admin.hotel.index')}}" class="text-15">Tất cả</a>
                            </li>

                            <li>
                                <a href="{{route('admin.hotel.create')}}" class="text-15">Thêm khách sạn</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="{{asset('img/dashboard/sidebar/gear.svg')}}" alt="image" class="mr-10">
                                Quản lí dịch vụ
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">
                            <li>
                                <a href="{{route('admin.service.index')}}" class="text-15">Dịch vụ</a>
                            </li>
                            <li>
                                <a href="{{route('admin.service.create')}}" class="text-15">Thêm dịch vụ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="{{asset('img/dashboard/sidebar/gear.svg')}}" alt="image" class="mr-10">
                                Quản lí Cơ sở vật chất
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">
                            <li>
                                <a href="{{route('admin.facility.index')}}" class="text-15">Cơ sở vật chất</a>
                            </li>
                            <li>
                                <a href="{{route('admin.facility.create')}}" class="text-15">Thêm cơ sở vật chất</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="{{asset('img/dashboard/sidebar/booking.svg')}}" alt="image" class="mr-10">
                                Đơn đặt
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="{{route('admin.booking.index')}}" class="text-15">Tất cả</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="{{asset('img/dashboard/sidebar/sneakers.svg')}}" alt="image" class="mr-10">
                                Người dùng
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">
                            <li>
                                <a href="{{route('admin.user.index')}}" class="text-15">Tất cả</a>
                            </li>
                            <li>
                                <a href="{{route('admin.user.create')}}" class="text-15">Thêm</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>

        {{-- <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="img/dashboard/sidebar/map.svg" alt="image" class="mr-10">
                                Manage Tour
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="#" class="text-15">All Hotels</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Add Hotel</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Recovery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="img/dashboard/sidebar/sneakers.svg" alt="image" class="mr-10">
                                Manage Activity
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="#" class="text-15">All Hotels</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Add Hotel</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Recovery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="img/dashboard/sidebar/house.svg" alt="image" class="mr-10">
                                Manage Holiday Rental
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="#" class="text-15">All Hotels</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Add Hotel</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Recovery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="img/dashboard/sidebar/taxi.svg" alt="image" class="mr-10">
                                Manage Car
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="#" class="text-15">All Hotels</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Add Hotel</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Recovery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="img/dashboard/sidebar/canoe.svg" alt="image" class="mr-10">
                                Manage Cruise
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="#" class="text-15">All Hotels</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Add Hotel</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Recovery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="img/dashboard/sidebar/airplane.svg" alt="image" class="mr-10">
                                Manage Flights
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="#" class="text-15">All Hotels</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Add Hotel</a>
                            </li>

                            <li>
                                <a href="#" class="text-15">Recovery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="sidebar__item ">


            <a href="#" class="sidebar__button d-flex items-center text-15 lh-1 fw-500">
                <img src="img/dashboard/sidebar/log-out.svg" alt="image" class="mr-15">
                Logout
            </a>


        </div> --}}

    </div>

</div>
