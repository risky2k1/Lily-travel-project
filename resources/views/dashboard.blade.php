<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Các khách sạn bạn quan tâm gần đây') }}
        </h2>
    </x-slot>
    @php
        $selectedHotelIds = \Illuminate\Support\Facades\Session::get('selected_hotels', []);
        $selectedHotels = \App\Models\Hotel::whereIn('id', $selectedHotelIds)->get();
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($selectedHotels as $hotel)
                    <div class="p-6">
                        <!-- Thông tin của khách sạn -->
                        <div class="grid grid-cols-12 gap-4" style="justify-content: start; display: flex">
                            <!-- Ảnh của khách sạn -->
                            <div class="col-span-2">
                                @if($hotel->image)
                                    <img src="{{asset('storage/'.($hotel->image)[0])}}" alt="{{ $hotel->name }}" class="w-full h-32 object-cover" style="height: 185px;width: 300px">
                                @else
                                    <img class="w-32 h-32 object-cover" style="height: 185px;width: 300px" src="{{asset('img/hotels/1.png')}}" alt="image">
                                @endif
                            </div>
                            <div class="col-span-8" style="min-width: 700px">
                                <h3 class="text-xl font-semibold">
                                    {{$hotel->name}}
                                </h3>
                                <br>
                                <p class="text-gray-600">{{$hotel->address}}</p>
                                <p class="text-gray-600">{{$hotel->description}}</p>
                            </div>

                            <div class="col-span-2" style="align-self: center">
                                <x-primary-a-tag href="{{route('home.hotel.show',$hotel)}}" style="background-color: #3554D1">{{ __('Xem chi tiết') }}</x-primary-a-tag>
                            </div>
                            <!-- Thông tin chi tiết của khách sạn -->
                            <!-- Nút xem chi tiết khách sạn -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
