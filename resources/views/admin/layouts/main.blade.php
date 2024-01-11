<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/vendors.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @stack('css')
    <title>Lily Travel</title>
</head>

<body data-barba="wrapper">

@include('home-layouts.components.page-loader')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                @php
                    toastr()->error($error);
                @endphp
            @endforeach
        </ul>
    </div>
@endif

<div class="header-margin"></div>
<header data-add-bg="" class="header -dashboard bg-white js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="-left-side">
            <a href="{{route('admin.index')}}" class="header-logo" data-x="header-logo" data-x-toggle="is-logo-dark">
                <img src="{{asset('img/general/logo-dark.svg')}}" alt="logo icon">
                <img src="{{asset('img/general/logo-dark.svg')}}" alt="logo icon">
            </a>
        </div>

        <div class="row justify-between items-center pl-60 lg:pl-20">
            <div class="col-auto">
                <div class="d-flex items-center">
                    <button data-x-click="dashboard">
                        <i class="icon-menu-2 text-20"></i>
                    </button>

                </div>
            </div>

            <div class="col-auto">
                <div class="d-flex items-center">


                    <div class="row items-center x-gap-5 y-gap-20 pl-20 lg:d-none">
                        <div class="col-auto">
                            <a href="{{route('home.page')}}" class="button -blue-1-05 size-50 rounded-22 flex-center">
                                <i class="icon-home text-20"></i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('chatify')}}" class="button -blue-1-05 size-50 rounded-22 flex-center">
                                <i class="icon-email-2 text-20"></i>
                            </a>
                        </div>

                        <div class="col-auto">
                            <button class="button -blue-1-05 size-50 rounded-22 flex-center">
                                <i class="icon-notification text-20"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pl-15">
                        <img src="{{asset('img/avatars/avatar.png')}}" alt="image" class="size-50 rounded-22 object-cover">
                    </div>

                    <div class="d-none xl:d-flex x-gap-20 items-center pl-20" data-x="header-mobile-icons" data-x-toggle="text-white">
                        <div>
                            <button class="d-flex items-center icon-menu text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
    @include('admin.sidebar')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            {{-- BreadcRumb --}}
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">{{$title}}</h1>
                </div>

                <div class="col-auto">

                </div>
            </div>

            @yield('content')
            {{-- End breadcrumb --}}
            <footer class="footer -dashboard mt-60">
                <div class="footer__row row y-gap-10 items-center justify-between">
                    <div class="col-auto">
                        <div class="row y-gap-20 items-center">
                            <div class="col-auto">
                                <div class="text-14 lh-14 mr-30">© 2024 Lily Travel LLC All rights reserved.</div>
                            </div>

                            <div class="col-auto">
                                <div class="row x-gap-20 y-gap-10 items-center text-14">
                                    <div class="col-auto">
                                        <a href="#" class="text-13 lh-1">Privacy</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-13 lh-1">Terms</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-13 lh-1">Site Map</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="d-flex x-gap-5 y-gap-5 items-center">
                            <button class="text-14 fw-500 underline">English (US)</button>
                            <button class="text-14 fw-500 underline">USD</button>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

<script src="{{asset('js/vendors.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@stack('js')
</body>

</html>
