<form action="{{route('admin.hotel.store')}}" method="POST">
    @csrf

    <div class="tabs__pane -tab-item-1 is-tab-el-active">
        <div class="col-xl-10">
            <div class="text-18 fw-500 mb-10">Thông tin</div>
            <div class="row x-gap-20 y-gap-20">
                <div class="col-12">

                    <div class="form-input ">
                        <input type="text" name="name" required="">
                        <label class="lh-1 text-16 text-light-1">Tên khách sạn</label>
                    </div>

                </div>
                <div class="col-12">

                    <div class="form-input ">
                        <textarea required="" name="description" rows="2"></textarea>
                        <label class="lh-1 text-16 text-light-1">Mô tả</label>
                    </div>

                </div>
                <div class="col-12">

                    <div class="form-input ">
                        <textarea required="" name="content" rows="5"></textarea>
                        <label class="lh-1 text-16 text-light-1">Nội dung</label>
                    </div>

                </div>
                <div class="d-flex mt-20">
                    <div class="form-checkbox ">
                        <input type="checkbox" name="is_feature" id="is_feature" value="1">
                        <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                        </div>
                    </div>

                    <label for="is_feature" class="text-15 lh-11 ml-10">Nổi bật?</label>

                </div>

            </div>

        </div>

        <div class="d-inline-block pt-30">

            <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                Save Changes
                <div class="icon-arrow-top-right ml-15"></div>
            </button>

        </div>
    </div>
</form>
