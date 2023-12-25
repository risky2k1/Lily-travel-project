<div class="dashboard__sidebar bg-white scroll-bar-1">

    <div class="sidebar -dashboard">

        <div class="sidebar__item ">


            <a href="{{route('admin.index')}}" class="sidebar__button d-flex items-center text-15 lh-1 fw-500">
                <img src="{{asset('img/dashboard/sidebar/compass.svg')}}" alt="image" class="mr-15">
                Dashboard
            </a>


        </div>

        {{-- <div class="sidebar__item ">


            <a href="#" class="sidebar__button d-flex items-center text-15 lh-1 fw-500">
                <img src="img/dashboard/sidebar/booking.svg" alt="image" class="mr-15">
                Booking Manager
            </a>


        </div> --}}

        <div class="sidebar__item ">


            <div class="accordion -db-sidebar js-accordion">
                <div class="accordion__item">
                    <div class="accordion__button">
                        <div class="sidebar__button col-12 d-flex items-center justify-between">
                            <div class="d-flex items-center text-15 lh-1 fw-500">
                                <img src="{{asset('img/dashboard/sidebar/hotel.svg')}}" alt="image" class="mr-10">
                                Manage Hotel
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="{{route('admin.hotel.index')}}" class="text-15">All Hotels</a>
                            </li>

                            <li>
                                <a href="{{route('admin.hotel.create')}}" class="text-15">Add Hotel</a>
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
                                <img src="{{asset('img/dashboard/sidebar/hotel.svg')}}" alt="image" class="mr-10">
                                Manage Booking
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="{{route('admin.booking.index')}}" class="text-15">All Bookings</a>
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
                                <img src="{{asset('img/dashboard/sidebar/hotel.svg')}}" alt="image" class="mr-10">
                                Manage User
                            </div>
                            <div class="icon-chevron-sm-down text-7"></div>
                        </div>
                    </div>

                    <div class="accordion__content">
                        <ul class="list-disc pt-15 pb-5 pl-40">

                            <li>
                                <a href="{{route('admin.booking.index')}}" class="text-15">All User</a>
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
