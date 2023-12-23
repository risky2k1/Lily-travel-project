@extends('home-layouts.main')

@section('content')
    @include('home-layouts.components.search')
    {{--    Popular Destinations--}}
    @include('home-layouts.components.popular-destination')
    {{--    Things to do on--}}
    @include('home-layouts.components.advertisement')
    {{--recommend list--}}
    @include('home-layouts.components.recommend-list')
    {{--Best buy gurantee--}}
    @include('home-layouts.components.best-buy')
    {{--    What our customers are saying about us--}}
    @include('home-layouts.components.what-customers-say')
    {{--    Get inspiration for your next trip--}}
    @include('home-layouts.components.get-inspiration')
    {{--    Destination we love--}}
    @include('home-layouts.components.destination-we-love')
    {{--    Subcribe--}}
    @include('home-layouts.components.subscribe')
@endsection
