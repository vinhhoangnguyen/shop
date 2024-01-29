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
                                    <input wire:model.live="search" type="search" class="form-control my-1 my-lg-0" id="inputPassword2" placeholder="Tìm...">
                                </div>

                                <label for="status-select" class="me-2">Trình bày</label>
                                <div class="me-sm-3">
                                    <select class="form-select form-select my-1 my-lg-0" id="status-select">
                                        <option value="5" selected>5</option>
                                        <option value="10">10</option>
                                        <option value="10">20</option>
                                    </select>
                                </div>

                                <label for="status-select" class="me-2">Sắp xếp</label>
                                <div class="me-sm-3">
                                    <select class="form-select form-select my-1 my-lg-0" id="status-select">
                                        <option selected>Tất cả</option>
                                        <option value="name">Tên</option>
                                        <option value="status">Trạng thái</option>

                                    </select>
                                </div>

                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-lg-end">
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus-circle me-1"></i> Thêm danh mục</button>
                                <button type="button" class="btn btn-light waves-effect mb-2">Nhập</button>
                                <button type="button" class="btn btn-light waves-effect mb-2">Xuất</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">

                        {{-- @dump($data) --}}

                        @if (count($data) > 0)
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>STT</th>
                                    <th>Danh mục</th>
                                    <th>Slug</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 150px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">ABC</label>
                                            </div>
                                        </td>
                                        <td>{{ $key+ $data->firstItem()}}</td>
                                        <td class="table-user">
                                            <img src="assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">
                                            <a href="javascript:void(0);" class="text-body fw-semibold">{{ $item->name }}</a>
                                        </td>
                                        <td>{{ $item->slug }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-soft-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-soft-success">Ngưng</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" class="action-icon" title="Xem"> <i class="mdi mdi-eye"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" title="Sửa"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" title="Xoá"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

</div> <!-- container -->
