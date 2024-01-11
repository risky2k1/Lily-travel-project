@extends('admin.layouts.main')

@section('content')
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="tabs -underline-2 js-tabs">
            <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">
                <div class="col-auto">
                    <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">Thông tin dịch vụ</button>
                </div>
            </div>
            <div class="tabs__content pt-30 js-tabs-content">
                <form action="{{route('admin.service.update',$service)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="tabs__pane -tab-item-1 is-tab-el-active">
                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10">Thông tin</div>
                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">

                                    <div class="form-input ">
                                        <input type="text" name="name" required="" value="{{$service->name}}">
                                        <label class="lh-1 text-16 text-light-1">Tên dịch vụ</label>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="d-inline-block pt-30">

                            <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                                Lưu
                                <div class="icon-arrow-top-right ml-15"></div>
                            </button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
