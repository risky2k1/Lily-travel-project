<div class="tabs__pane -tab-item-1 is-tab-el-active">
    <div class="col-xl-10">
        <div class="text-18 fw-500 mb-10">Thông tin</div>
        <div class="row x-gap-20 y-gap-20">
            <div class="col-12">

                <div class="form-input ">
                    <input type="text" name="name" required="" value="{{$hotel->name}}" autocomplete="off" aria-autocomplete="none">
                    <label class="lh-1 text-16 text-light-1">Tên khách sạn</label>
                </div>

            </div>
            <div class="col-12">

                <div class="form-input ">
                    <textarea required="" name="description" rows="2">{{$hotel->description}}</textarea>
                    <label class="lh-1 text-16 text-light-1">Mô tả</label>
                </div>

            </div>
            <div class="col-12">

                <div class="form-input ">
                    <textarea required="" name="content" rows="5">{{$hotel->content}}</textarea>
                    <label class="lh-1 text-16 text-light-1">Nội dung</label>
                </div>

            </div>
            <div class="d-flex mt-20">
                <div class="form-checkbox ">
                    <input type="checkbox" name="is_feature" id="is_feature" @checked($hotel->is_feature) value="1">
                    <div class="form-checkbox__mark">
                        <div class="form-checkbox__icon icon-check"></div>
                    </div>
                </div>

                <label for="is_feature" class="text-15 lh-11 ml-10">Nổi bật?</label>

            </div>

            <div class="mt-20">
                <div class="fw-500 mb-20">Loại phòng</div>

                <div class="overflow-scroll scroll-bar-1">
                    <table class="table-5 -border-bottom col-12">
                        <thead class="bg-light-2">
                        <tr>
                            <th>Tên phòng</th>
                            <th>Dịch vụ</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td class="col-5">

                                <div class="form-input ">
                                    <input name="hotel_room_name" id="hotel_room_name" type="text" value="{{$hotel->rooms->first()->name??''}}">
                                    <label class="lh-1 text-16 text-light-1" for="hotel_room_name">Tên phòng</label>
                                </div>

                            </td>
                            <td class="col-5">

                                <div class="form-input ">
                                    <textarea name="hotel_room_options_name" id="hotel_room_options_name" cols="30" rows="10">{{$hotel->roomOptions->first()->name??''}}</textarea>
                                    <label class="lh-1 text-16 text-light-1" for="hotel_room_options_name">Dịch vụ</label>
                                </div>

                            </td>
                            <td class="col-2">

                                <div class="form-input ">
                                    <input name="hotel_room_price" id="hotel_room_price" type="text" value="{{$hotel->rooms->first()->price??''}}">
                                    <label class="lh-1 text-16 text-light-1" for="hotel_room_price">Giá</label>
                                </div>

                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>


</div>
