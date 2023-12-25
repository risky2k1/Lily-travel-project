@extends('admin.layouts.main')

@push('css')
    <style>
        #image-preview-container {
            display: flex;
            flex-wrap: wrap;
        }

        .image-preview {
            width: 250px; /* Điều chỉnh kích thước hiển thị của từng ảnh */
            height: 250px;
            object-fit: contain;
            margin: 5px;
            border: 1px solid black;
            border-radius: 4px;
        }
    </style>
@endpush
@section('content')
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="tabs -underline-2 js-tabs">
            <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">

                <div class="col-auto">
                    <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">1. Thông tin chung</button>
                </div>

                <div class="col-auto">
                    <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button" data-tab-target=".-tab-item-2">2. Địa điểm</button>
                </div>

                <div class="col-auto">
                    <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button" data-tab-target=".-tab-item-3">3. Giá</button>
                </div>

                <div class="col-auto">
                    <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button" data-tab-target=".-tab-item-4">4. Các dịch vụ</button>
                </div>

                <div class="col-auto">
                    <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button" data-tab-target=".-tab-item-5">5. Ảnh</button>
                </div>

            </div>

            <div class="tabs__content pt-30 js-tabs-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.hotel.update',$hotel)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    @include('admin.layouts.hotel.components.edit.hotel-info')

                    @include('admin.layouts.hotel.components.edit.hotel-address')

                    @include('admin.layouts.hotel.components.edit.hotel-price')

                    @include('admin.layouts.hotel.components.edit.hotel-service')

                    @include('admin.layouts.hotel.components.edit.hotel-image')

                    <div class="d-inline-block pt-30">
                        <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                            Save Changes
                            <div class="icon-arrow-top-right ml-15"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function previewImages(input) {
            var container = document.getElementById('image-preview-container');
            container.innerHTML = ''; // Clear previous previews

            var files = input.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = document.createElement('img');
                        preview.src = e.target.result;
                        preview.classList.add('image-preview');
                        container.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
@endpush
