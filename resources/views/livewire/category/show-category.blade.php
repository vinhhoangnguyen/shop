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
                                <div class="d-flex gap-2 align-items-center">

                                    <label for="status-select" class="">Mục chọn: </label>
                                    <div class="me-sm-2">
                                        {{count($selectedIDs)}} mục.
                                    </div>

                                    <div class="vr"></div>
                                    <button wire:click.prevent="deleteMultiID" type="button" class="btn btn-danger waves-effect waves-light" title="Xoá">
                                        <span class="btn-label"><i class="mdi mdi-delete"></i></span>{{count($selectedIDs)}}
                                    </button>
                                </div>
                                    
                                @endif


                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-lg-end">
                                <!-- Modal -->
                                <button type="button" class="btn btn-info waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-plus-circle me-1"></i> Thêm danh mục</button>
                                <button type="button" class="btn btn-light waves-effect mb-2">Nhập</button>
                                <button type="button" class="btn btn-light waves-effect mb-2">Xuất</button>
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
                                    <th style="width: 100px;">
                                        <div class="form-check">
                                            <input type="checkbox" wire:model.live="selectPageRows" class="form-check-input" id="customCheckAll">
                                            <label  class="form-check-label" for="customCheckAll">
                                                <span>STT
                                                </span>
                                            
                                            </label>
                                        </div>
                                    </th>

                                    <th class="p-1">
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
                                            <div class="form-check">
                                                <input type="checkbox" wire:model.live="selectedIDs" value="{{$item->id}}" class="form-check-input" id="customCheckID">
                                                <label class="form-check-label" for="customCheckID">{{ $key+ $data->firstItem()}} </label>
                                            </div>
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td class="table-user">
                                            <img src="{{ $item->image }}" alt="table-user" class="me-2 rounded-circle">
                                            <a href="javascript:void(0);" class="text-body fw-semibold">{{ $item->name }}</a>
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-soft-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-soft-success">Ngưng</span>
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

    <!-- Standard Modal content -->
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Thêm danh mục</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="#" class="px-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Tên danh mục:
                                <span class="text-danger opacity-75">*</span>
                            </label>
                            <input class="form-control" type="email" id="name" required="" placeholder="john@deo.com">
                        </div>

                        <div class="mb-3">
                            <label for="example-fileinput" class="form-label">Hình danh mục:</label>
                            <input type="file" id="example-fileinput" class="form-control">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div> <!-- container -->
