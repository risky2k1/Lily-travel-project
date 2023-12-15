@extends('admin.layouts.main')

@section('content')
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="tabs -underline-2 js-tabs">
            <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">

                <div class="col-auto">
                    <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">1. Thông tin chung</button>
                </div>

            </div>

            <div class="tabs__content pt-30 js-tabs-content">
                @include('admin.layouts.hotel.components.create.hotel-info')
            </div>
        </div>
    </div>
@endsection
