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
                                <button type="button" class="btn btn-light waves-effect mb-2" data-bs-toggle="modal" data-bs-target="#viewImport-modal"> <i class="mdi mdi-arrow-collapse-down"></i> Nhập</button>

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


            <!-- Standard Modal content -->
            <div wire:ignore.self id="viewImport-modal" class="modal fade" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-full-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="standard-modalLabel">Nhập danh mục từ file Excel</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form wire:submit="" class="px-3">

                            <div class="modal-body">
                                <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Hình danh mục:</label>
                                        <div class="input-group">
                                            <input type="file" wire:model="fileViewImport" id="upload_{{ $iteration }}" class="form-control @error('fileViewImport') is-invalid @enderror">
                                            <button wire:click.privent="uploadFileView" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Tải lên</button>
                                        </div>
                                        @error('fileViewImport')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>

                                {{-- @if (count($arrayContentImport) > 0)
                                <table id="tableExportView" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Slug</th>
                                            <th>Ảnh</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày cập nhật</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($arrayContentImport[0] as $item)
                                        <tr>
                                            <td>{{ $item[0] }}</td>
                                            <td>{{ $item[1] }}</td>
                                            <td>{{ $item[2] }}</td>
                                            <td><img src="{{ $item[3] }}" alt="Ảnh"></td>
                                            <td>{{ $item[4] }}</td>
                                            <td>{{ $item[5] }}</td>
                                            <td>{{ $item[6] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="mb-3">
                                        <table id="tableExportView" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011-04-25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011-07-25</td>
                                                    <td>$170,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009-01-12</td>
                                                    <td>$86,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Cedric Kelly</td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2012-03-29</td>
                                                    <td>$433,060</td>
                                                </tr>
                                                <tr>
                                                    <td>Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008-11-28</td>
                                                    <td>$162,700</td>
                                                </tr>
                                                <tr>
                                                    <td>Brielle Williamson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2012-12-02</td>
                                                    <td>$372,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Herrod Chandler</td>
                                                    <td>Sales Assistant</td>
                                                    <td>San Francisco</td>
                                                    <td>59</td>
                                                    <td>2012-08-06</td>
                                                    <td>$137,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Rhona Davidson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>Tokyo</td>
                                                    <td>55</td>
                                                    <td>2010-10-14</td>
                                                    <td>$327,900</td>
                                                </tr>
                                                <tr>
                                                    <td>Colleen Hurst</td>
                                                    <td>Javascript Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>39</td>
                                                    <td>2009-09-15</td>
                                                    <td>$205,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Sonya Frost</td>
                                                    <td>Software Engineer</td>
                                                    <td>Edinburgh</td>
                                                    <td>23</td>
                                                    <td>2008-12-13</td>
                                                    <td>$103,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Jena Gaines</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>30</td>
                                                    <td>2008-12-19</td>
                                                    <td>$90,560</td>
                                                </tr>
                                                <tr>
                                                    <td>Quinn Flynn</td>
                                                    <td>Support Lead</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2013-03-03</td>
                                                    <td>$342,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Charde Marshall</td>
                                                    <td>Regional Director</td>
                                                    <td>San Francisco</td>
                                                    <td>36</td>
                                                    <td>2008-10-16</td>
                                                    <td>$470,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Haley Kennedy</td>
                                                    <td>Senior Marketing Designer</td>
                                                    <td>London</td>
                                                    <td>43</td>
                                                    <td>2012-12-18</td>
                                                    <td>$313,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Tatyana Fitzpatrick</td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>19</td>
                                                    <td>2010-03-17</td>
                                                    <td>$385,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Silva</td>
                                                    <td>Marketing Designer</td>
                                                    <td>London</td>
                                                    <td>66</td>
                                                    <td>2012-11-27</td>
                                                    <td>$198,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Paul Byrd</td>
                                                    <td>Chief Financial Officer (CFO)</td>
                                                    <td>New York</td>
                                                    <td>64</td>
                                                    <td>2010-06-09</td>
                                                    <td>$725,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Gloria Little</td>
                                                    <td>Systems Administrator</td>
                                                    <td>New York</td>
                                                    <td>59</td>
                                                    <td>2009-04-10</td>
                                                    <td>$237,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Bradley Greer</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>41</td>
                                                    <td>2012-10-13</td>
                                                    <td>$132,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Dai Rios</td>
                                                    <td>Personnel Lead</td>
                                                    <td>Edinburgh</td>
                                                    <td>35</td>
                                                    <td>2012-09-26</td>
                                                    <td>$217,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenette Caldwell</td>
                                                    <td>Development Lead</td>
                                                    <td>New York</td>
                                                    <td>30</td>
                                                    <td>2011-09-03</td>
                                                    <td>$345,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Yuri Berry</td>
                                                    <td>Chief Marketing Officer (CMO)</td>
                                                    <td>New York</td>
                                                    <td>40</td>
                                                    <td>2009-06-25</td>
                                                    <td>$675,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Caesar Vance</td>
                                                    <td>Pre-Sales Support</td>
                                                    <td>New York</td>
                                                    <td>21</td>
                                                    <td>2011-12-12</td>
                                                    <td>$106,450</td>
                                                </tr>
                                                <tr>
                                                    <td>Doris Wilder</td>
                                                    <td>Sales Assistant</td>
                                                    <td>Sydney</td>
                                                    <td>23</td>
                                                    <td>2010-09-20</td>
                                                    <td>$85,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Angelica Ramos</td>
                                                    <td>Chief Executive Officer (CEO)</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2009-10-09</td>
                                                    <td>$1,200,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin Joyce</td>
                                                    <td>Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>42</td>
                                                    <td>2010-12-22</td>
                                                    <td>$92,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Chang</td>
                                                    <td>Regional Director</td>
                                                    <td>Singapore</td>
                                                    <td>28</td>
                                                    <td>2010-11-14</td>
                                                    <td>$357,650</td>
                                                </tr>
                                                <tr>
                                                    <td>Brenden Wagner</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>28</td>
                                                    <td>2011-06-07</td>
                                                    <td>$206,850</td>
                                                </tr>
                                                <tr>
                                                    <td>Fiona Green</td>
                                                    <td>Chief Operating Officer (COO)</td>
                                                    <td>San Francisco</td>
                                                    <td>48</td>
                                                    <td>2010-03-11</td>
                                                    <td>$850,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Shou Itou</td>
                                                    <td>Regional Marketing</td>
                                                    <td>Tokyo</td>
                                                    <td>20</td>
                                                    <td>2011-08-14</td>
                                                    <td>$163,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michelle House</td>
                                                    <td>Integration Specialist</td>
                                                    <td>Sydney</td>
                                                    <td>37</td>
                                                    <td>2011-06-02</td>
                                                    <td>$95,400</td>
                                                </tr>
                                                <tr>
                                                    <td>Suki Burks</td>
                                                    <td>Developer</td>
                                                    <td>London</td>
                                                    <td>53</td>
                                                    <td>2009-10-22</td>
                                                    <td>$114,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Prescott Bartlett</td>
                                                    <td>Technical Author</td>
                                                    <td>London</td>
                                                    <td>27</td>
                                                    <td>2011-05-07</td>
                                                    <td>$145,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin Cortez</td>
                                                    <td>Team Leader</td>
                                                    <td>San Francisco</td>
                                                    <td>22</td>
                                                    <td>2008-10-26</td>
                                                    <td>$235,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Martena Mccray</td>
                                                    <td>Post-Sales support</td>
                                                    <td>Edinburgh</td>
                                                    <td>46</td>
                                                    <td>2011-03-09</td>
                                                    <td>$324,050</td>
                                                </tr>
                                                <tr>
                                                    <td>Unity Butler</td>
                                                    <td>Marketing Designer</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>2009-12-09</td>
                                                    <td>$85,675</td>
                                                </tr>
                                                <tr>
                                                    <td>Howard Hatfield</td>
                                                    <td>Office Manager</td>
                                                    <td>San Francisco</td>
                                                    <td>51</td>
                                                    <td>2008-12-16</td>
                                                    <td>$164,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Hope Fuentes</td>
                                                    <td>Secretary</td>
                                                    <td>San Francisco</td>
                                                    <td>41</td>
                                                    <td>2010-02-12</td>
                                                    <td>$109,850</td>
                                                </tr>
                                                <tr>
                                                    <td>Vivian Harrell</td>
                                                    <td>Financial Controller</td>
                                                    <td>San Francisco</td>
                                                    <td>62</td>
                                                    <td>2009-02-14</td>
                                                    <td>$452,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Timothy Mooney</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>37</td>
                                                    <td>2008-12-11</td>
                                                    <td>$136,200</td>
                                                </tr>
                                                <tr>
                                                    <td>Jackson Bradshaw</td>
                                                    <td>Director</td>
                                                    <td>New York</td>
                                                    <td>65</td>
                                                    <td>2008-09-26</td>
                                                    <td>$645,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011-02-03</td>
                                                    <td>$234,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011-05-03</td>
                                                    <td>$163,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009-08-19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Thor Walton</td>
                                                    <td>Developer</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2013-08-11</td>
                                                    <td>$98,540</td>
                                                </tr>
                                                <tr>
                                                    <td>Finn Camacho</td>
                                                    <td>Support Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>2009-07-07</td>
                                                    <td>$87,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Serge Baldwin</td>
                                                    <td>Data Coordinator</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2012-04-09</td>
                                                    <td>$138,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Zenaida Frank</td>
                                                    <td>Software Engineer</td>
                                                    <td>New York</td>
                                                    <td>63</td>
                                                    <td>2010-01-04</td>
                                                    <td>$125,250</td>
                                                </tr>
                                                <tr>
                                                    <td>Zorita Serrano</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>56</td>
                                                    <td>2012-06-01</td>
                                                    <td>$115,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Acosta</td>
                                                    <td>Junior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>43</td>
                                                    <td>2013-02-01</td>
                                                    <td>$75,650</td>
                                                </tr>
                                                <tr>
                                                    <td>Cara Stevens</td>
                                                    <td>Sales Assistant</td>
                                                    <td>New York</td>
                                                    <td>46</td>
                                                    <td>2011-12-06</td>
                                                    <td>$145,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Hermione Butler</td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2011-03-21</td>
                                                    <td>$356,250</td>
                                                </tr>
                                                <tr>
                                                    <td>Lael Greer</td>
                                                    <td>Systems Administrator</td>
                                                    <td>London</td>
                                                    <td>21</td>
                                                    <td>2009-02-27</td>
                                                    <td>$103,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jonas Alexander</td>
                                                    <td>Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>2010-07-14</td>
                                                    <td>$86,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Shad Decker</td>
                                                    <td>Regional Director</td>
                                                    <td>Edinburgh</td>
                                                    <td>51</td>
                                                    <td>2008-11-13</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2011-06-27</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2011-01-25</td>
                                                    <td>$112,000</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                @endif --}}


                                @if (count($collectImport) > 0)
                                    <table>
                                        <thead>
                                            <tr>
                                                @foreach($collectImport[0][0] as $fieldName)
                                                    <th>{{ $fieldName }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($collectImport[0] as $index => $record)
                                                @if($index !== 0)
                                                    <tr>
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
                                <button  type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div>
            </div>
            <!-- /.modal -->

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
