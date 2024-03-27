
    <!--  Modal content for ViewExport -->
    <div wire:ignore.self class="modal fade" id="viewImportModal" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="viewExportLabel">Nhập danh mục</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="uploadFileImport">
                            <div class="input-group">
                                <input wire:model="fileExcel" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button wire:click.prevent="uploadFile" class="btn btn-outline-secondary" id="inputGroupFileAddon04">Tải lên</button>
                            </div>
                            @error('fileExcel')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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
                                   Mã
                                </th>
                                <th class="p-1">
                                    Danh mục
                                </th>

                                <th class="p-1">
                                    Slug
                                </th>

                                <th class="p-1">
                                    Trạng thái
                                </th>

                                <th class="p-1">
                                    
                                       Ngày tạo
                                 
                                </th>


                                <th style="width: 150px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr >
                                    <td>
                                        <div class="form-check form-check-md">
                                            {{-- <input type="checkbox" wire:model.live="selectedIDs" value="" class="form-check-input" id="customCheck{{$item->id}}" style="width:20px;height:20px"> --}}
                                            {{-- <label class="form-check-label" for="customCheck{{$item->id}}">{{ $key+ $data->firstItem()}} </label> --}}
                                        </div>
                                    </td>
                                    <td>{{ $item->ID }}</td>
                                    <td class="table-user">
                                        
                                        <a href="javascript:void(0);" class="text-body fw-semibold">{{ $item->Name }}</a>
                                    </td>

                                    <td >
                                        <a href="javascript:void(0);" class="text-body fw-semibold">{{ $item->Slug }}</a>
                                    </td>
                                    <td>
                                        @if ($item->Status == 1)
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
                 {{ $data->links()}}
                    
                        
                    @else
                        <p>Không có dữ liệu</p>
                    @endif
                    
                 

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button wire:click.prevent="updateFile" type="button" class="btn btn-primary">Cập nhật</button>
                    </div>

                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
