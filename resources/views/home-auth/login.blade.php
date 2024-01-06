<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/vendors.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <title>GoTrip</title>
</head>

<body>
@include('home-layouts.components.page-loader')

<main>

    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                        <div class="row y-gap-20">
                            <div class="col-12">
                                <h1 class="text-22 fw-500">Chào mừng bạn</h1>
                                <p class="mt-10">Chưa có tài khoản? <a href="{{route('register')}}" class="text-blue-1">Đăng kí miễn phí</a></p>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="row y-gap-20" id="login_form">
                                @csrf
                                <div class="col-12">
                                    <div class="form-input ">
                                        <input type="email" name="email" id="email" value="{{old('email')}}" autofocus required>
                                        <label class="lh-1 text-14 text-light-1" for="email">Email</label>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-2"/>
                                </div>

                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="password" name="password" id="password" required>
                                        <label class="lh-1 text-14 text-light-1" for="password">Mật khẩu</label>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-2"/>

                                </div>

                                <div class="col-12">
                                    <a href="#" class="text-14 fw-500 text-blue-1 underline">Quên mật khẩu?</a>
                                </div>

                                <div class="col-12">

                                    <a href="#" class="button py-20 -dark-1 bg-blue-1 text-white" onclick="submitForm()">
                                        Đăng nhập
                                        <div class="icon-arrow-top-right ml-15"></div>
                                    </a>

                                </div>
                            </form>
                        </div>

                        <div class="row y-gap-20 pt-30">
                            <div class="col-12">
                                <div class="text-center">hoặc đăng kí với</div>

                                <button class="button col-12 -outline-blue-1 text-blue-1 py-15 rounded-8 mt-10">
                                    <i class="icon-apple text-15 mr-10"></i>
                                    Facebook
                                </button>

                                <button class="button col-12 -outline-red-1 text-red-1 py-15 rounded-8 mt-15">
                                    <i class="icon-apple text-15 mr-10"></i>
                                    Google
                                </button>

                                <button class="button col-12 -outline-dark-2 text-dark-2 py-15 rounded-8 mt-15">
                                    <i class="icon-apple text-15 mr-10"></i>
                                    Apple
                                </button>
                            </div>

                            <div class="col-12">
                                <div class="text-center px-30">Bằng cách đăng kí tài khoản, bạn đồng ý với các điều khoản của chúng tôi.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<!-- JavaScript -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

<script src="{{asset('js/vendors.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script>
    const submitForm = () => {
        document.getElementById("login_form").submit();
    }
</script>
</body>

</html>
