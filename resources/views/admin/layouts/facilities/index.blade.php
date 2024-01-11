@extends('admin.layouts.main')

@section('content')
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="tabs -underline-2 js-tabs">
                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">
                    <div class="col-auto">
                        <button type="button"
                                class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 @if(request()->state == null || request()->state === 'all hotel')is-tab-el-active @endif hotel_state_button">
                            All facilities
                        </button>
                    </div>
                </div>


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
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($facilities as $facility)

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
                                    <td class="text-blue-1 fw-500">{{$facility->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($facility->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <div class="row x-gap-10 y-gap-10 items-center">
                                            <div class="col-auto">
                                                <a href="{{ route('admin.facility.edit',$facility) }}" class="flex-center bg-light-2 rounded-4 size-35">
                                                    <i class="icon-edit text-16 text-light-1"></i>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <form action="{{route('admin.facility.destroy',$facility)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex-center bg-light-2 rounded-4 size-35">
                                                        <i class="icon-trash-2 text-16 text-light-1"></i>
                                                    </button>
                                                </form>
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
                {{$facilities->links()}}
            </div>
        </div>
    </div>
@endsection
