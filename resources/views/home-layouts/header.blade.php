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
                                        <a data-barba href="">
                                            <span class="mr-10">Home</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>

                                        <ul class="subnav">
                                            <li class="subnav__backBtn js-nav-list-back">
                                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Home</a>
                                            </li>

                                        </ul>

                                    </li>

                                    <li>
                                        <a href="destinations.html">
                                            Destinations
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('chatify',1)}}">Contact</a>
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

                    @if(!auth()->check())
                        <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                            <a href="{{route('login')}}" class="button px-30 fw-400 text-14 -white bg-white h-50 text-dark-1">Đăng nhập</a>
                        </div>
                    @else
                        <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                            <button class="button px-30 fw-400 text-14 border-white -outline-white h-50 text-white ml-20" disabled>Xin chào: {{auth()->user()->name}}</button>
                        </div>
                        <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                            <form action="{{route('logout')}}" method="post" id="logout_form">
                                @csrf
                                <a href="#" class="button px-30 fw-400 text-14 -white bg-white h-50 text-dark-1" onclick="document.getElementById('logout_form').submit();">Đăng xuất</a>
                            </form>
                        </div>
                    @endif
                    <div class="d-none xl:d-flex x-gap-20 items-center pl-30 text-white" data-x="header-mobile-icons" data-x-toggle="text-white">
                        <div><a href="login.html" class="d-flex items-center icon-user text-inherit text-22"></a></div>
                        <div>
                            <button class="d-flex items-center icon-menu text-inherit text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
