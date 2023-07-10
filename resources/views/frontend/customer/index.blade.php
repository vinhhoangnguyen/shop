@extends('frontend.customer.dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Shop</a>
                <span></span> Trang <span></span> Hồ sơ khách hàng
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Bảng điều khiển</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Đơn đặt hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Theo dõi đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>Địa chỉ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Chi tiết hồ sơ</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="password-account-tab" data-bs-toggle="tab" href="#password-account" role="tab" aria-controls="password-account" aria-selected="true"><i class="fi-rs-key mr-10"></i>Thay đổi mật khẩu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('customer.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Xin chào {{$userData -> name}} !</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                Từ bảng điều khiển. Khách hàng có thể kiểm tra &amp; xem <a href="#">đơn hàng gần nhất</a>,<br />
                                                Quản lý <a href="#">giao nhận hàng</a> và <a href="#">Thay đổi mật khẩu và thông tin hồ sơ.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2020</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Orders tracking</h3>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Billing Address</h3>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        3522 Interstate<br />
                                                        75 Business Spur,<br />
                                                        Sault Ste. <br />Marie, MI 49783
                                                    </address>
                                                    <p>New York</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        4299 Express Lane<br />
                                                        Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                                    </address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Thông tin khách hàng</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Bạn đã có tài khoản khác? <a href="{{ route('login') }}">Đăng nhập!</a></p>

                                            <form id="profile_form" method="post" action="{{ route('customer.profile.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Tên khách hàng <span class="required">*</span></label>
                                                        <input  class="form-control  @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{ $userData->name }}" />
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Số điện thoại <span class="required">*</span></label>
                                                        <input  class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" type="text" value="{{ $userData->phone }}" />
                                                        @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Email</label>
                                                        <input  class="form-control" name="email" id="email" type="text" value="{{ $userData->email }}" />
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Địa chỉ chính</label>
                                                        <input  class="form-control" name="address" id="address" type="text" value="{{ $userData->address }}" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Hình đại diện </label>
                                                        <input class="form-control" name="image" type="file"  id="image" />
                                                    </div>

                                                      <div class="form-group col-md-12">
                                                        <label>  <span class="required">*</span></label>
                                                        <img id="showImage" src="{{ (!empty($userData->photo)) ? url($userData->photo):url('frontend/upload/no_image.jpg') }}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                                                    </div>


                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold">Lưu thay đổi</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="password-account" role="tabpanel" aria-labelledby="password-account-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Thay đổi mật khẩu</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Bạn đã có tài khoản khác? <a href="{{ route('login') }}">Đăng nhập!</a></p>

                                            <form id="chagePass_form" method="post" action="{{ route('customer.password.update') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Mật khẩu cũ <span class="required">*</span></label>
                                                        <input  class="form-control  @error('old_password') is-invalid @enderror" name="old_password" id="old_password" type="password" value="{{ $userData->old_password }}" />
                                                        @error('old_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Mật khẩu mới <span class="required">*</span></label>
                                                        <input  class="form-control  @error('new_password') is-invalid @enderror" name="new_password" id="new_password" type="password" />
                                                        @error('new_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Xác nhận mật khẩu mới <span class="required">*</span></label>
                                                        <input  class="form-control  @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" id="new_password_confirmation" type="password" />
                                                        @error('new_password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold">Lưu thay đổi</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


{{-- Validate From JS --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#profile_form').validate({
            rules: {
                name: {
                    required : true,
                },
                phone: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Tên khách hàng không để trống',
                },
                phone: {
                    required : 'Số điện thoại không để trống',
                },

            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });

        jQuery.validator.addMethod("notEqualTo",
                             function(value, element, param) {
                                  return this.optional(element) || value != $(param).val();
                             }, "This has to be different...");

        $('#chagePass_form').validate({
            rules: {
                old_password: {
                    required : true,
                    minlength: 8
                },

                new_password: {
                    required : true,
                    notEqualTo:"#old_password",
                    minlength:8
                },
                new_password_confirmation: {
                    equalTo:"#new_password",

                },

            },
            messages :{
                old_password: {
                    required : 'Mật khẩu cũ không để trống',
                    minlength: 'Mật khẩu cũ ngắn'
                },

                new_password: {
                    required : 'Mật khẩu mới không để trống',
                    notEqualTo: 'Mật khẩu mới phải khác với mật khẩu cũ',
                    minlength: 'Độ dài mật khẩu mới ít nhất 8 ký tự'

                },
                new_password_confirmation: {
                    equalTo : 'Xác nhận mật khẩu không trùng với mật khẩu mới ở trên ',
                },

            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
@endsection
