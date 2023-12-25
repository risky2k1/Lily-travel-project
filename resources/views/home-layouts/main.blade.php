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
    <div class="header-margin"></div>
    @include('home-layouts.header')

    @yield('content')

    @include('home-layouts.footer')
</main>

<!-- Button trigger modal -->
<!-- JavaScript -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

<script src="{{asset('js/vendors.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        let bookingSuccess = $('#booking_success_modal').data('success');
        if (bookingSuccess) {
            $('#booking_success_modal').show();
        }
    })
</script>

</body>

</html>
