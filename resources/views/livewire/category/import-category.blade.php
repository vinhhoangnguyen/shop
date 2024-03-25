{{-- <style>
    .fixed_header {
      width: 100%;
      table-layout: fixed;
      border-collapse: collapse;
    }
    .fixed_header tbody {
      display: block;
      width: 100%;
      overflow: auto;
      height: 100px;
    }
    .fixed_header thead tr {
      display: block;
    }
    .fixed_header thead {
      background: black;
      color: #fff;
    }
    .fixed_header th,
    .fixed_header td {
      padding: 5px;
      text-align: left;
      width: 200px;
    }
  </style> --}}
<div wire:ignore.self id="viewImport-modal" class="modal fade" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Nhập danh mục từ file Excel</h4>
                <button wire:click="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit="" class="px-3">

                <div class="modal-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="example-fileinput" class="form-label">Hình danh mục:</label>
                        <div class="input-group w-50">
                            <input type="file" wire:model="fileViewImport" id="upload_{{ $iteration }}" class="form-control @error('fileViewImport') is-invalid @enderror ">
                            <div class="input-group-append">
                                <button wire:click.prevent="uploadFile" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04"  style="margin-right: 10px;">Tải lên</button>

                                @if ($isViewContent)
                                    <button wire:click.prevent="updateFile" class="btn btn-outline-primary" type="button" id="inputGroupFileAddon05">Cập nhật</button>
                                @endif
                            </div>
                        </div>
                        @error('fileViewImport')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



                    @if (count($arrayImport) > 0)
                    <div>Số lượng mục: {{ count($arrayImport[0]) - 1 }}</div>
                        <table id="tableExportView" class="table" style="width:100%" >
                            <thead class="table-light">
                                <tr>
                                    <th>Dòng</th>
                                    @foreach($arrayImport[0][0] as $fieldName)
                                        <th>{{ $fieldName }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arrayImport[0] as $index => $record)

                                    @if($index !== 0)
                                        <tr>
                                            <td>{{ $index }}</td>
                                            @foreach($record as $field)
                                                <td>{{ $field }}</td>
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    @else
                        <span class="text-danger">Không có dữ liệu</span>
                    @endif

                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
