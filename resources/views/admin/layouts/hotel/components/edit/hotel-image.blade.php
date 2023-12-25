<div class="tabs__pane -tab-item-5">
    <div class="mt-30">
        <div class="fw-500">Banner Image</div>

        <div class="row x-gap-20 y-gap-20 pt-15">
            <div class="col-auto">
                <div class="w-200">
                    <div class="d-flex ratio ratio-1:1">
                        <label for="image-upload" class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1">
                            <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                            <div class="text-blue-1 fw-500">Upload Images</div>
                        </label>
                        <input type="file" id="image-upload" name="images[]" style="display: none;" multiple onchange="previewImages(this)">
                    </div>
                    <div class="text-center mt-10 text-14 text-light-1">PNG or JPG no bigger than 800px wide and tall.</div>
                </div>
            </div>
            {{--            <div id="image-preview-container" class="d-flex ratio ratio-1:1 w-200"></div>--}}
            @foreach($hotel->getMedia('hotel-images') as $image)
                <img src="{{ $image->getFullUrl() }}" alt="{{ $hotel->name }}">
            @endforeach
        </div>
    </div>
</div>
