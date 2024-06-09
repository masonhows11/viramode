<div>

    <form wire:submit.prevent="upload">

        <div class="row   row-cols-md-2 row-cols-sm-1 row-cols-1  product-stock-list mt-5 py-5 bg-white">

            <div class="col">

                <div class="row">
                    <div class="col-12">
                        <div class="mt-3">
                            <label for="link" class="form-label">{{ __('messages.link')}}</label>
                            <select class="category-select" id="category-selected" wire:model.defer="link"  id="link" name="link">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->title_persian }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('link')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="mt-3">
                            <label for="title" class="form-label">{{ __('messages.title') }}</label>
                            <input type="text" wire:model.defer="title"  class="form-control" id="title"  name="title">
                        </div>
                        @error('title')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="mt-3">
                            <label for="status" class="form-label">{{ __('messages.status') }}</label>
                            <select  wire:model.defer="status" class="form-control " id="status" name="status">
                                <option value="">{{ __('messages.choose') }}</option>
                                <option value="1">{{ __('messages.active') }}</option>
                                <option value="0">{{ __('messages.deactivate') }}</option>
                            </select>
                        </div>
                        @error('status')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row mt-4 d-flex flex-column justify-content-center align-content-center">

                        <div class="col-sm-6 d-flex justify-content-center">
                            @if ($path)
                                <img src="{{ $path->temporaryUrl() }}" width="250" height="250" alt="logo_image_path"
                                    class="rounded border border-2 image-product-gallery-preview">
                            @else
                                <img src="{{ asset('admin_assets/images/no-image-icon-23494.png') }}" width="250" height="250"
                                    alt="logo_image_path" class="rounded border border-2 image-product-gallery-preview">
                            @endif
                        </div>
                        <div class="col-sm-6  d-flex flex-column justify-content-center my-4">

                            <label for="photo" class="form-label">انتخاب تصویر</label>

                            <input type="file" accept="image/*" class="form-control" wire:model.defer="path" id="path">
                            <div wire:loading wire:target="path">در حال بارگزاری...</div>

                            @error('path')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
            </div>

            <div class="col-12 discount-common-save">
                <div class="mt-3">
                    <input type="submit" class="btn btn-success" value="{{ __('messages.save') }}">
                </div>
            </div>

        </div>

    </form>

</div>
@push('dash_custom_script')

<script type="javascript" src="{{ asset('dash/plugins/select2/js/select2.min.js') }}"></script>

    <script type="text/javascript">

       $(document).ready(function () {

             $('.category-select').select2({
                dir: 'rtl',
                tags: 'true',
                theme: "classic"
            });

            $('.category-select').on('change',function(){

                var value = $('#category-selected').select2("val");
                @this.set('selectedCategory',value);

            });


        });
    </script>

<script>
    // document.addEventListener("livewire:load", () => {
    //     Livewire.hook('message.processed', (message, component) => {
    //         $(document).ready(function () {
    //         $('.category-select').select2({
    //             dir: 'rtl',
    //             tags: 'true',
    //             theme: "classic"
    //         });
    //     });
    //     })
    // });
</script>

    {{-- <script>
        $(document).ready(function() {
            const input = document.getElementById("image_select");
            const previewImage = document.getElementById("image_view");
            input.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener("load", function() {
                        previewImage.setAttribute("src", this.result);
                    });
                    reader.readAsDataURL(file);
                }
            });
        })
    </script> --}}
@endpush







