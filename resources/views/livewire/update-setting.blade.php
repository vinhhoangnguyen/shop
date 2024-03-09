<div>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                                    <li class="breadcrumb-item active">Thông tin Shop</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Thông tin Shop</h4>
                        </div>
                    </div>
        </div>
        <!-- end page title -->

{{-- Test Alpine --}}
{{-- <div class="row">
            <div>
                <h1>{{ $setting->name }}</h1>

                <div x-data="{ expanded: false }">
                    <button type="button" x-on:click="expanded = ! expanded">
                        <span x-show="! expanded">Show post content...</span>
                        <span x-show="expanded">Hide post content...</span>
                    </button>

                    <div x-show="expanded">
                        {{ $setting->phone }}
                    </div>
                </div>
            </div>
</div> --}}

        <form wire:submit.prevent="update" class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Thông tin chung</h5>

                                <div class="mb-3">
                                    <label for="shop-name" class="form-label">Tên <span class="text-danger opacity-75 opacity-75">*</span></label>
                                    <input type="text" wire:model.blur="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tên shop" >
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="shop-address" class="form-label">Địa chỉ <span class="text-danger opacity-75">*</span></label>
                                    <textarea wire:model.blur="address" class="form-control @error('address') is-invalid @enderror" id="shop-address" rows="3" placeholder="Địa chỉ shop"></textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="shop-phone">Số điện thoại <span class="text-danger opacity-75">*</span></label>
                                    <input type="text" wire:model.blur="phone" class="form-control @error('phone') is-invalid @enderror" id="shop-phone" placeholder="Số điện thoại">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="shop-hot_line">Đường dây nóng <span class="text-danger opacity-75">*</span></label>
                                    <input type="text" wire:model.blur="hot_line" class="form-control @error('hot_line') is-invalid @enderror" id="shop-hot_line" placeholder="Đường dây nóng">
                                    @error('hot_line')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="shop-email">Thư điện tử </label>
                                    <input type="text" wire:model.blur="email" class="form-control @error('email') is-invalid @enderror" id="shop-email" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="shop-time">Thời gian hoạt động <span class="text-danger">*</span></label>
                                    <input type="text" wire:model.blur="time" class="form-control @error('time') is-invalid @enderror" id="shop-time" placeholder="Thời gian làm việc">
                                    @error('time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tài Khoản <span class="text-danger opacity-75">*</span></label>
                                    <textarea wire:model.blur="account" class="form-control @error('account') is-invalid @enderror" rows="5" placeholder="Tài khoản ngân hàng"></textarea>
                                    @error('account')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="shop-meta-keywords" class="form-label">Từ khoá HashTag</label>
                                    <input type="text" class="form-control" id="shop-meta-keywords" placeholder="Từ khoá <computer><food>...">
                                </div>


                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Hình đại diện_Logo</h5>

                                    <div class="fallback">
                                        <input wire:model="logo" name="file" type="file" class="form-control @error('logo') is-invalid @enderror" />
                                        @error('logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Preview Image Logo-->
                                    <div class="mt-2">
                                        @if ($logo && !$errors->has('logo'))
                                            <img src="{{ $logo->temporaryUrl() }}" style="width: 100px">
                                        @else
                                            <img src="{{ ($this->setting->logo) ? asset($this->setting->logo) : asset('backend/upload/no_image.jpg') }}" style="width: 100px">
                                        @endif
                                    </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Tài khoản xã hội</h5>

                                <div class="mb-3">
                                    <label for="shop-zalo" class="form-label">Zalo</label>
                                    <input type="text" class="form-control" id="shop-zalo" placeholder="Tk Zalo">
                                </div>
                                <div class="mb-3">
                                    <label for="shop-facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" id="shop-facebook" placeholder="TK Facebook">
                                </div>
                                <div class="mb-3">
                                    <label for="shop-tiktok" class="form-label">Tiktok</label>
                                    <input type="text" class="form-control" id="shop-tiktok" placeholder="TK Tiktok shop">
                                </div>
                                <div class="mb-3">
                                    <label for="shop-telegram" class="form-label">Telegram</label>
                                    <input type="text" class="form-control" id="shop-telegram" placeholder="TK Telegram">
                                </div>
                                <div class="mb-3">
                                    <label for="shop-youtube" class="form-label">Youtube</label>
                                    <input type="text" class="form-control" id="shop-youtube" placeholder="TK Youtube">
                                </div>
                                <div class="mb-3">
                                    <label for="shop-twitter" class="form-label">Twitter</label>
                                    <input type="text" class="form-control" id="shop-twitter" placeholder="TK Twitter">
                                </div>


                            </div>
                        </div> <!-- end card -->

                    </div> <!-- end col-->

                    <div class="col-12">
                        <div class="mb-3">
                            <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Cập nhật
                                <div wire:loading wire:target="update" class="spinner-border text-secondary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </div> <!-- end col -->
        </form>
        <!-- end row -->

    </div> <!-- container -->
</div>
