@extends('admin.layouts.main')

@section('content')
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="tabs -underline-2 js-tabs">
            <form action="{{route('admin.hotel.index')}}" id="hotel_state_form">
                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">
                    <div class="col-auto">
                        <button type="button"
                                class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 @if(request()->state == null || request()->state === 'all hotel')is-tab-el-active @endif hotel_state_button">
                            All Hotel
                        </button>
                    </div>
                    <input type="text" hidden name="state" id="state">
                    @foreach($hotelStates as $key=>$state)
                        <div class="col-auto">
                            <button type="button"
                                    class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 hotel_state_button @if(request()->get('state') === $state) is-tab-el-active @endif"
                                    style="text-transform: capitalize;">{{$state}}</button>
                        </div>
                    @endforeach
                </div>
            </form>


            <div class="tabs__content pt-30 js-tabs-content">

                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="overflow-scroll scroll-bar-1">
                        <table class="table-4 -border-bottom col-12">
                            <thead class="bg-light-2">
                            <tr>
                                <th>

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                    </div>

                                </th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Reviews</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels as $hotel)

                                <tr>
                                    <td>
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox ">
                                                <input type="checkbox" name="name">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="text-blue-1 fw-500">{{$hotel->name}}</td>
                                    <td>{{$hotel->address}}</td>
                                    <td>{{$hotel->author->name}}</td>
                                    <td><span class="rounded-100 py-4 px-10 text-center text-14 fw-500 {{$hotel->state->class()}} capitalize state-class">{{$hotel->state}}</span></td>
                                    <td>
                                        <div class="rounded-4 size-35 bg-blue-1 text-white flex-center text-12 fw-600">4.8</div>
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($hotel->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <div class="row x-gap-10 y-gap-10 items-center">
                                            @if($hotel->state == \App\Models\States\HotelState\Pending::$name)
                                                <div class="col-auto">
                                                    <button class="flex-center bg-light-2 rounded-4 size-35 approve-hotel" data-id="{{$hotel->id}}">
                                                        <i class="icon-check text-16 text-light-1"></i>
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="col-auto">
                                                <a href="{{ route('admin.hotel.edit',$hotel) }}" class="flex-center bg-light-2 rounded-4 size-35">
                                                    <i class="icon-edit text-16 text-light-1"></i>
                                                </a>
                                            </div>

                                            <div class="col-auto">
                                                <button class="flex-center bg-light-2 rounded-4 size-35">
                                                    <i class="icon-trash-2 text-16 text-light-1"></i>
                                                </button>
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

        <div class="pt-30">
            <div class="row justify-between">
                {{$hotels->links()}}
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('.hotel_state_button').on('click', function () {
            const stateValue = $(this).text().toLowerCase();
            $('#state').val(stateValue);
            $('#hotel_state_form').submit();
        })
        $('.approve-hotel').on('click', function () {
            $.ajax({
                type: 'POST',
                url: '{{route('ajax-hotel.state-hotel-update')}}',
                data: {
                    hotel_id: $(this).data('id'),
                    _token: csrfToken
                },
                success: function (response) {
                    $('.state-class').removeClass('bg-yellow-4 text-yellow-3');
                    $('.state-class').addClass('bg-success-1 text-success-2');

                    console.log(response);
                },
                error: function (xhr, status, error) {

                    console.error(error);
                }
            });
        })
    </script>
@endpush
