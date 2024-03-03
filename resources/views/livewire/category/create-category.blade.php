<!-- Standard Modal content -->
<div wire:ignore.self id="create-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Thêm danh mục</h4>
                <button wire:click="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit="save" class="px-3">

                <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Tên danh mục:
                                <span class="text-danger opacity-75">*</span>
                            </label>

                            <input wire:model.blur="name" type="text" class="form-control @error('name') is-invalid @enderror" >
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="example-fileinput" class="form-label">Hình danh mục:</label>
                            <input type="file" wire:model="image" id="upload_{{ $iteration }}" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Preview Image Logo-->
                        <div class="mt-2">
                            @if ($image && !$errors->has('image'))
                                <img src="{{ $image->temporaryUrl() }}" style="width: 100px">
                            @else
                                <img src="{{ asset('backend/upload/no_image.jpg') }}" style="width: 100px">
                            @endif
                        </div>


                </div>
                <div class="modal-footer">
                    <button wire:click="close" type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->
