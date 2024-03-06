<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Shop</a></li> --}}
                        <li class="breadcrumb-item"><a href="javascript: void(0);">POS</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
                    </ol>
                </div>
                <h4 class="page-title">Danh mục sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <form class="d-flex flex-wrap align-items-center">
                                <label for="inputPassword2" class="visually-hidden">Tìm kiếm</label>
                                <div class="me-3">
                                    <input wire:model.live.debounce.500ms="search" type="search" class="form-control my-1 my-lg-0" placeholder="Tìm...">
                                </div>

                                <label for="status-select" class="me-2">Trình bày </label>
                                <div class="me-sm-3">
                                    <select wire:model.live="perPage" class="form-select form-select my-1 my-lg-0" id="status-select">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>

                                @if (count($selectedIDs) > 0)
                                {{-- <div class="d-flex gap-2 align-items-center">

                                    <label for="status-select" class="">Mục chọn: </label>
                                    <div class="me-sm-2">
                                        {{count($selectedIDs)}} mục.
                                    </div>

                                    <div class="vr"></div>
                                    <button wire:click.prevent="deleteMultiID" type="button" class="btn btn-danger waves-effect waves-light" title="Xoá">
                                        <span class="btn-label"><i class="mdi mdi-delete"></i></span>{{count($selectedIDs)}}
                                    </button>
                                </div> --}}

                             <!-- Example split danger button -->
                             <div class="btn-group mb-2 dropend">
                                <button type="button" class="btn btn-success waves-effect waves-light">
                                    Thao tác {{count($selectedIDs)}} mục chọn
                                </button>
                                <button type="button" class="btn btn-success waves-effect waves-light dropdown-toggle-split dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-chevron-right"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a wire:click.prevent="switchMultiID" class="dropdown-item" ><i class="mdi mdi-autorenew"></i> Chuyển trạng thái </a>
                                    <a wire:click.prevent="exportMultiID" class="dropdown-item" ><i class="mdi mdi-file-upload-outline"></i> Xuất Excel</a>
                                    <li><hr class="dropdown-divider"></li>
                                    <a wire:click.prevent="deleteMultiID"  class="dropdown-item"><i class="mdi mdi-delete-forever"></i> Xoá</a>

                                </div>
                            </div>

                                @endif


                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-lg-end">
                                <!-- Modal -->
                                <button type="button" class="btn btn-info waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#create-modal"><i class="mdi mdi-plus-circle me-1"></i> Thêm danh mục</button>
                                <button type="button" class="btn btn-light waves-effect mb-2"> <i class="mdi mdi-arrow-collapse-down"></i> Nhập</button>
                                <button wire:click.prevent="exportAll" type="button" class="btn btn-light waves-effect mb-2"><i class="mdi mdi-arrow-collapse-up"></i> Xuất</button>
                            </div>
                        </div><!-- end col-->
                    </div>


                    <div class="table-responsive position-relative">

                        {{-- @dump($data) --}}

                        {{-- Lớp phủ khi Slow Data --}}
                        <div wire:loading class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-50">
                        </div>
                        <div wire:loading class="position-absolute top-50 start-50 translate-middle">
                            <div class="spinner-border text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        @if (count($data) > 0)
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">
                                        <div class="form-check">
                                            <input type="checkbox" wire:model.live="selectPageRows" class="form-check-input" id="customCheckAll" style="width:25px;height:25px">
                                            <label  class="form-check-label" for="customCheckAll">
                                                <span>
                                                </span>

                                            </label>
                                        </div>
                                    </th>

                                    <th class="p-1" style="width: 100px;">
                                        <x-datatable-items columnName="id" :sortColumn="$sortColumn" :sortDirect="$sortDirect">
                                            <div>Mã</div>
                                        </x-datatable-items>
                                    </th>
                                    <th class="p-1">
                                        <x-datatable-items columnName="name" :sortColumn="$sortColumn" :sortDirect="$sortDirect">
                                            <div>Danh mục</div>
                                        </x-datatable-items>
                                    </th>

                                    <th class="p-1">
                                        <x-datatable-items columnName="slug" :sortColumn="$sortColumn" :sortDirect="$sortDirect">
                                            <div>Slug</div>
                                        </x-datatable-items>
                                    </th>

                                    <th class="p-1">
                                        <x-datatable-items columnName="status" :sortColumn="$sortColumn" :sortDirect="$sortDirect">
                                            <div>Trạng thái</div>
                                        </x-datatable-items>
                                    </th>

                                    <th class="p-1">
                                        <x-datatable-items columnName="created_at" :sortColumn="$sortColumn" :sortDirect="$sortDirect">
                                            <div>Ngày tạo</div>
                                        </x-datatable-items>
                                    </th>


                                    <th style="width: 150px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr wire:key="{{ $item->id }}">
                                        <td>
                                            <div class="form-check form-check-md">
                                                <input type="checkbox" wire:model.live="selectedIDs" value="{{$item->id}}" class="form-check-input" id="customCheck{{$item->id}}" style="width:20px;height:20px">
                                                {{-- <label class="form-check-label" for="customCheck{{$item->id}}">{{ $key+ $data->firstItem()}} </label> --}}
                                            </div>
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td class="table-user">
                                            <img src="{{ ($item->image)? asset($item->image): asset('backend/upload/no_image.jpg') }}" alt="No Image" class="me-2 rounded-circle">
                                            <a href="javascript:void(0);" class="text-body fw-semibold">{{ $item->name }}</a>
                                        </td>

                                        <td >
                                            <a href="javascript:void(0);" class="text-body fw-semibold">{{ $item->slug }}</a>
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-soft-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-soft-danger">Ngưng</span>
                                            @endif
                                        </td>

                                        <td>{{ date('d-m-Y g:i', strtoTime($item->created_at))  }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" title="Xem"> <i class="mdi mdi-eye"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" title="Sửa"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" title="Xoá"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       Kết quả: {{number_format($data->total(), 0,',','.')}} mục.
                        {{ $data->links() }}
                        @else
                            <span class="text-danger">Không có dữ liệu</span>
                        @endif


                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

   {{-- <livewire:category.create-category @item-created="$refresh"> --}}
   {{-- <livewire:category.create-category /> --}}

</div> <!-- container -->



<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('items-multiDelete', (event) => {
            const number_items = event[0]['items'].length;
            const array_items = event[0]['items'];
            Swal.fire({
                title: "Bạn có chắc chắn muốn xoá " + number_items + " mục?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.dispatch('confirmed-multiDelete', {'array_items' : array_items});

                        Livewire.on('items-deleted', (event) => {});
                            Swal.fire({
                            title: "Xoá thành công!",
                            text: "Dữ liệu bạn chọn đã được xoá.",
                            icon: "success"
                        });
                    }
            });
       });

       Livewire.on('items-multiSwitch', (event) => {
            const number_items = event[0]['items'].length;
            const array_items = event[0]['items'];
            Swal.fire({
                title: "Bạn có chắc chắn muốn chuyển trạng thái " + number_items + " mục?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.dispatch('confirmed-multiSwitch', {'array_items' : array_items});

                        Livewire.on('items-switched', (event) => {});
                            Swal.fire({
                            title: "Chuyển trạng thái thành công!",
                            text: "Dữ liệu bạn chọn đã được chuyển trạng thái.",
                            icon: "success"
                        });
                    }
            });
       });

    });
</script>
