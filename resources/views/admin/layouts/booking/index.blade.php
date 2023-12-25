@extends('admin.layouts.main')

@section('content')
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="tabs -underline-2 js-tabs">
            <form action="{{route('admin.booking.index')}}" id="booking_state_form">
                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">
                    <div class="col-auto">
                        <button type="button"
                                class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 @if(request()->state == null || request()->state === 'all booking')
                                is-tab-el-active @endif
                                booking_state_button">
                            All Booking
                        </button>
                    </div>
                    <input type="text" hidden name="state" id="state">
                    @foreach($bookingStates as $state)
                        <div class="col-auto">
                            <button
                                class="booking_state_button tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 @if(request()->get('state') === $state) is-tab-el-active @endif capitalize">{{$state}}</button>
                        </div>
                    @endforeach

                </div>
            </form>

        </div>

        <div class="tabs__content pt-30 js-tabs-content">

            <div class="tabs__pane -tab-item-1 is-tab-el-active">
                <div class="overflow-scroll scroll-bar-1">
                    <table class="table-3 -border-bottom col-12">
                        <thead class="bg-light-2">
                        <tr>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Order Date</th>
                            <th>Execution Time</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)

                            <tr>
                                <td>{{$booking->type}}</td>
                                <td>{{$booking->modelType->name}}</td>
                                <td>{{\Carbon\Carbon::parse($booking->created_at)->format('d/m/Y')}}</td>
                                <td class="lh-16">Check in : {{$booking->start_date}}<br>Check out : {{$booking->end_date}}</td>
                                <td class="fw-500">${{number_format($booking->modelType->price)}}</td>
                                <td><span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-yellow-4 text-yellow-3 capitalize">{{$booking->state}}</span></td>

                                <td>
                                    <div class="dropdown js-dropdown js-actions-1-active">
                                        <div class="dropdown__button d-flex items-center rounded-4 text-blue-1 bg-blue-1-05 text-14 px-15 py-5" data-el-toggle=".js-actions-1-toggle"
                                             data-el-toggle-active=".js-actions-1-active">
                                            <span class="js-dropdown-title">Actions</span>
                                            <i class="icon icon-chevron-sm-down text-7 ml-10"></i>
                                        </div>

                                        <div class="toggle-element -dropdown-2 js-click-dropdown js-actions-1-toggle">
                                            <div class="text-14 fw-500 js-dropdown-list">

                                                <div><a href="#" class="d-block js-dropdown-link">Details</a></div>

                                                <div><a href="#" class="d-block js-dropdown-link">Confirm</a></div>

                                                <div><a href="#" class="d-block js-dropdown-link">Cancel</a></div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

@endsection
@push('js')
    <script>
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('.booking_state_button').on('click', function () {
            const stateValue = $(this).text().toLowerCase();
            $('#state').val(stateValue);
            $('#booking_state_form').submit();
        })
        {{--$('.approve-hotel').on('click', function () {--}}
        {{--    $.ajax({--}}
        {{--        type: 'POST',--}}
        {{--        url: '{{route('ajax-hotel.state-hotel-update')}}',--}}
        {{--        data: {--}}
        {{--            hotel_id: $(this).data('id'),--}}
        {{--            _token: csrfToken--}}
        {{--        },--}}
        {{--        success: function (response) {--}}
        {{--            $('.state-class').removeClass('bg-yellow-4 text-yellow-3');--}}
        {{--            $('.state-class').addClass('bg-success-1 text-success-2');--}}

        {{--            console.log(response);--}}
        {{--        },--}}
        {{--        error: function (xhr, status, error) {--}}

        {{--            console.error(error);--}}
        {{--        }--}}
        {{--    });--}}
        {{--})--}}
    </script>
@endpush
