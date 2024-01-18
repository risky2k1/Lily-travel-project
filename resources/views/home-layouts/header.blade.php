<header class="header bg-dark-1 is-sticky" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="row justify-between items-center">

            <div class="col-auto">
                <div class="d-flex items-center">
                    <a href="{{route('home.page')}}" class="header-logo mr-20" data-x="header-logo" data-x-toggle="is-logo-dark">
                        <img src="{{asset('img/general/logo-light.svg')}}" alt="logo icon">
                        <img src="{{asset('img/general/logo-dark.svg')}}" alt="logo icon">
                    </a>


                    <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>

                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>

                            <div class="menu js-navList">
                                <ul class="menu__nav text-white -is-active">

                                    <li class="menu-item-has-children">
                                        <a data-barba href="{{route('home.page')}}">
                                            <span class="mr-10">Trang chủ</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('home.hotel.index')}}">
                                            Danh sách khách sạn
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('user',1)}}">Trò chuyện</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-auto">
                <div class="d-flex items-center">

                    <div class="d-flex x-gap-20 items-center pl-30 text-white" data-x="header-mobile-icons" data-x-toggle="text-white">
                        @if(auth()->check() && auth()->user()->hasRole("Super Admin"))
                            <div>
                                <a href="{{route('admin.index')}}">
                                    <img class="d-flex items-center text-inherit text-20" style="width: 20px; height: 20px;" src="{{asset('img/icons/admin-svg.svg')}}" alt="">
                                </a>
                            </div>
                        @endif
                        <div>
                            <a href="{{route('dashboard')}}" class="d-flex items-center icon-user text-inherit text-22"></a>
                        </div>
                        <div>
                            <button class="d-flex items-center icon-menu text-inherit text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                        </div>
                        @if(auth()->check())
                            <div>
                                <form action="{{route('logout')}}" method="post" id="logout_form">
                                    @csrf
                                    <a href="#" class="" onclick="document.getElementById('logout_form').submit();">
                                        <img class="d-flex items-center text-inherit text-20" style="width: 20px; height: 20px;" src="{{asset('img/icons/logout-svgrepo-com.svg')}}" alt="">
                                    </a>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
